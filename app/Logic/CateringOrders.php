<?php

namespace App\Logic;

use App\Models\CateringOrdersDetailsModel;
use App\Models\CateringOrdersModel;
use Carbon\Carbon;

class CateringOrders
{
    public function makeOrder(array $args = [])
    {
        $default = [
            'accept_terms' => 0,
            'customer' => [
                'name' => '',
                'email' => '',
                'address' => '',
                'city' => '',
                'phone' => '',
                'postal_code' => '',
            ],
            'delivery' => 0,
            'date' => '',
            'time' => '',
            'shop' => '',
            'comments' => '',
        ];
        $args = set_args($args, $default);

        $args['accept_terms'] = (bool)$args['accept_terms'];
        if (!$args['accept_terms']) return __('checkout.term_accept_missing');

        $Catering = new Catering();
        $session = $Catering->getSession();

        if (empty($session['type']) || !in_array($session['type'], ['buffet', 'portion'])) return 'Invalid data found in cart.';
        $data['type'] = $session['type'];
        $data['menu'] = $session['type'] === 'buffet' && isset($session['menu']) ? $session['menu'] : 0;

        if (blank($args['customer']['name'])) return __('checkout.customer_name_missing');
        if (blank($args['customer']['email']) || !is_email($args['customer']['email'])) return __('checkout.invalid_email');
        if (blank($args['customer']['phone']) || !is_phone($args['customer']['phone'])) return __('checkout.invalid_phone');
        $data['customer_name'] = $args['customer']['name'];
        $data['customer_email'] = $args['customer']['email'];
        $data['customer_phone'] = formatize_phone_number($args['customer']['phone']);
        $data['delivery'] = $args['delivery'];

        if ($session['type'] === 'buffet') {
            $data['per_person_price'] = config('catering.menu' . $session['menu'] . '.price');
        } else {
            $data['per_person_price'] = config('catering.portion.price');

            if (empty($session['portion']['items'])) return 'Please select at least 8 dishes for this order.';
            if (array_sum($session['portion']['items']) < config('catering.min_people')) return __('catering.select_dishes');
        }

        if (blank($args['shop'])) return __('checkout.invalid_shop');

        if (blank($args['date']) || blank($args['time'])) return 'Please select date and time';
        $pickupTime = Carbon::create($args['date'] . ' ' . $args['time']);
        if ($pickupTime->lessThanOrEqualTo(\Illuminate\Support\Carbon::tomorrow())) return __('Please select future time for order');
        if ($pickupTime->diffInHours(Carbon::now()) < 24) return __('Catering order required at least 24 hours.');

        $data['pickup_time'] = $pickupTime;
        $data['shop'] = $args['shop'];
        $data['order_ip'] = getIP();
        if ($args['delivery']) {
            $data['customer_address'] = $args['customer']['address'];
            $data['customer_postal_code'] = $args['customer']['postal_code'];
            $data['customer_city'] = $args['customer']['city'];

            if (isset($session['delivery']) && $session['delivery'] == 1 && !empty($session['delivery_fee'])) {
                $data['delivery_fee'] = $session['delivery_fee'];
            }
        }
        $data['comments'] = $args['comments'];
        $data['paid'] = false;
        $data['user_agent'] = request()->userAgent();

        try {
            $order = new CateringOrdersModel();
            foreach ($data as $field => $value) {
                $order->{$field} = $value;
            }
            $order->save();
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        /**
         * Saving order details (order items)
         */
        if ($session['type'] === 'buffet') {
            $itemQtys = $this->makeItemQty($session['persons']);

            foreach ($session['menu_items'][$data['menu']] as $x => $code) {
                try {
                    CateringOrdersDetailsModel::query()
                        ->insert([
                            'order_id' => $order->id,
                            'name' => item($code)->name,
                            'code' => $code,
                            'price' => 0,
                            'qty' => $itemQtys[$x]
                        ]);
                } catch (\Exception $exception) {
                    $order->delete();
                    return $exception->getMessage();
                }
            }
            foreach ($this->makeSideItemQty($session['persons'], $session['menu']) as $code => $qty) {
                CateringOrdersDetailsModel::query()
                    ->insert([
                        'order_id' => $order->id,
                        'name' => item($code)->name,
                        'code' => $code,
                        'price' => 0,
                        'qty' => $qty
                    ]);
            }

            if (!empty($session['drinks'])) {
                foreach ($session['drinks'] as $code => $qty) {
                    try {
                        CateringOrdersDetailsModel::query()
                            ->insert([
                                'order_id' => $order->id,
                                'name' => item($code)->name,
                                'code' => $code,
                                'price' => item($code)->price,
                                'qty' => $qty
                            ]);
                    } catch (\Exception $exception) {
                        $order->delete();
                        return $exception->getMessage();
                    }
                }
            }
        } else {
            foreach ($session['portion']['items'] as $code => $qty) {
                try {
                    CateringOrdersDetailsModel::query()
                        ->insert([
                            'order_id' => $order->id,
                            'name' => item($code)->name,
                            'code' => $code,
                            'price' => 0,
                            'qty' => $qty
                        ]);
                } catch (\Exception $exception) {
                    $order->delete();
                    return $exception->getMessage();
                }
            }
            if (!empty($session['portion']['sides']) && is_array($session['portion']['sides'])) {
                foreach ($session['portion']['sides'] as $code => $qty) {
                    try {
                        CateringOrdersDetailsModel::query()
                            ->insert([
                                'order_id' => $order->id,
                                'name' => item($code)->name,
                                'code' => $code,
                                'price' => item($code)->price,
                                'qty' => $qty
                            ]);
                    } catch (\Exception $exception) {
                        $order->delete();
                        return $exception->getMessage();
                    }
                }
            }
        }

        /**
         * Calculating
         */
        if ($Catering->calculateThermoBoxes() > 0) {
            try {
                CateringOrdersDetailsModel::query()
                    ->insert([
                        'order_id' => $order->id,
                        'name' => config('catering.thermo_box_name'),
                        'code' => config('catering.thermo_box_plu'),
                        'price' => config('catering.thermo_box_price'),
                        'qty' => $Catering->calculateThermoBoxes()
                    ]);
            } catch (\Exception $exception) {
                $order->delete();
                return $exception->getMessage();
            }
        }

        return $order->id;
        return 'OK';
    }

    public function makeSideItemQty($items, $menu)
    {
        $qtys[600] = $items;
        $qtys[610] = ceil($items / 2);
        $qtys[620] = floor($items / 2);
        $qtys[630] = floor($items / 2);
        $qtys[640] = ceil($items / 4);
        $qtys[670] = ceil($items / 2);

        if ($menu > 1) {
            $qtys[650] = ceil($items / 4);
            $qtys[660] = ceil($items / 4);
        }
        if ($menu > 2) {
            $qtys[200] = ceil($items / 2);
        }
        if ($menu > 3) {
            $qtys[700] = $items;
        }

        return $qtys;
    }

    public function makeItemQty($items)
    {
        $floor = floor($items / 4);
        $remainder = ($items % 4);
        $qtys[1] = $floor;
        if ($remainder > 0) {
            $qtys[1]++;
            --$remainder;
        }
        $qtys[2] = $floor;
        if ($remainder > 0) {
            $qtys[2]++;
            --$remainder;
        }
        $qtys[3] = $floor;
        if ($remainder > 0) {
            $qtys[3]++;
            --$remainder;
        }
        $qtys[4] = $floor;
        if ($remainder > 0) {
            $qtys[4]++;
        }

        return $qtys;
    }
}
