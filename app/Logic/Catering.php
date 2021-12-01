<?php

namespace App\Logic;

use App\Models\TakeoutZonesModel;

class Catering
{
    const sessionKey = 'bindiaCatering';

    public function saveSession($key, $value = null)
    {
        if (is_null($value) && is_array($key)) {
            request()->session()->put(self::sessionKey, $key);
        } else {
            $values = request()->session()->get(self::sessionKey, []);
            $values[$key] = $value;
            request()->session()->put(self::sessionKey, $values);
        }
    }

    public function calculateSessionPrice()
    {
        $session = $this->getSession();
        if (!isset($session['menu']) || !isset($session['type'])) return 0;
        if ($session['type'] === 'buffet') {
            $persons = config('catering.menu' . $session['menu'] . '.price') * $session['persons'];
        } else {
            $persons = $session['persons'];
        }

        $drinks = 0;
        if (isset($session['drinks']) && is_array($session['drinks'])) {
            foreach ($session['drinks'] as $code => $qty) {
                $drinks += item($code)->price * $qty;
            }
        }

        return [
            'persons' => $persons,
            'drinks' => $drinks,
        ];
    }

    public function addInSession(array $values)
    {
        $session = $this->getSession();
        if (empty($session)) $this->saveSession($values);
        else {
            $this->saveSession(array_merge($session, $values));
        }
    }

    public function getSession()
    {
        $session = request()->session()->get(self::sessionKey, []);
        if (isset($session['type']) && $session['type'] === 'portion') {
            $session['persons'] = isset($session['portion']['items']) ? array_sum($session['portion']['items']) : 0;
            $session['amount']['items'] = $session['persons'] * config('catering.portion.price');
            $session['amount']['sides'] = 0;
            if (isset($session['portion']['sides'])) {
                foreach ($session['portion']['sides'] as $code => $qty) {
                    $session['amount']['sides'] += item($code)->price * $qty;
                }
            }

            $session['total_price'] = $session['amount']['items'] + $session['amount']['sides'];
        }

        if (isset($session['delivery']) && $session['delivery'] == 1 && !empty($session['customer']['postal_code'])) {
            $row = TakeoutZonesModel::query()
                ->whereRaw('? between post_number and post_number2', [$session['customer']['postal_code']])
                ->orderByDesc('id')
                ->first();

            if ($row) {
                $session['delivery_fee'] = $row->price * 2;

                /**
                 * Adding an extra 10kr. in delivery on larger orders
                 */
                if ($session['total_price'] >= 2500) {
                    //dd(($session['total_price'] - 2000));
                    $session['delivery_fee'] += floor(($session['total_price'] - 2000) / 500) * 10;
                }

                $session['total_price'] += $session['delivery_fee'];
            }
        }

        return $session;
    }

    public function addItemToCart($code, $add, $item = null)
    {
        $session = $this->getSession();
        if ($session['type'] === 'buffet') {
            if (!isset($session['drinks'][$code]) && $add == 1) {
                $session['drinks'][$code] = 1;
            } else if (isset($session['drinks'][$code]) && $add == 1) {
                $session['drinks'][$code]++;
            } else if (isset($session['drinks'][$code]) && $add == -1) {
                $session['drinks'][$code]--;
            }

            if (isset($session['drinks'][$code]) && $session['drinks'][$code] < 1) unset($session['drinks'][$code]);
        } else {
            if ($item == 1) {
                if ($add == -1 && $session['persons'] <= config('catering.min_people')) return __('catering.select_dishes', ['dishes' => config('catering.min_people')]);
                if ($add == -1) {
                    $session['portion']['items'][$code] = isset($session['portion']['items'][$code]) ? $session['portion']['items'][$code] - 2 : 0;
                } else if ($add == 1) {
                    $session['portion']['items'][$code] = isset($session['portion']['items'][$code]) ? $session['portion']['items'][$code] + 2 : 0;
                }
                if ($session['portion']['items'][$code] < 2) unset($session['portion']['items'][$code]);
            } else if ($item == 0) {
                if ($add == -1) {
                    $session['portion']['sides'][$code] = isset($session['portion']['sides'][$code]) ? $session['portion']['sides'][$code] - 1 : 0;
                } else if ($add == 1) {
                    $session['portion']['sides'][$code] = isset($session['portion']['sides'][$code]) ? $session['portion']['sides'][$code] + 1 : 0;
                }
                if ($session['portion']['sides'][$code] < 1) unset($session['portion']['sides'][$code]);
            }
        }

        $this->saveSession($session);
        return 'OK';
    }

    public function calculateThermoBoxes()
    {
        $session = $this->getSession();
        if (!isset($session['type'])) return 0;
        if (!$this->IsThermo()) return 0;
        if ($session['type'] === 'buffet') {
            $per_person_points = config('catering.menu' . $session['menu'] . '.points_per_person', 0);
            $per_person_points *= $session['persons'];
        } else {
            $per_person_points = $session['persons'] * 3;
            if (isset($session['portion']['sides'])) {
                foreach ($session['portion']['sides'] as $code => $qty) {
                    if (item($code)->section === 'bn-sides') $per_person_points += $qty;
                }
            }
        }

        if ($per_person_points < 1) {
            return 0;
        }

        return ceil($per_person_points / 60);
    }

    public function IsThermo()
    {
        $session = $this->getSession();
        return !isset($session['thermo']) || $session['thermo'] == 1;
    }

    public function Delivery()
    {
        $session = $this->getSession();
        return $session['delivery'] ?? '';
    }
}
