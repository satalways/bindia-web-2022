<?php

namespace App\Logic;

use App\Models\GiftCardSubCards;
use App\Models\OrderDetails;
use App\Models\OrderItems;
use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class GiftCard
{
    const Redeemed = 4;
    const PartialRedeemed = 1;

    /**
     * @param array $args
     *
     * This method will generate gift card for customer. it will be paid always.
     */
    public function generateCard($args = [])
    {
        $default = [
            'accept' => 0,
            'amount' => 0,
            'customer_email' => '',
            'customer_name' => '',
            'customer_phone' => '',
            'send' => 'now',
            'date' => '',
            'time' => '',
            'from_email' => '',
            'from_name' => '',
            'from_phone' => '',
            'to_message' => '',
        ];
        $args = set_args($args, $default);

        if (!$args['accept']) return 'Please accept terms and conditions';
        if (!is_numeric($args['amount'])) return 'Invalid amount';
        if ($args['amount'] < 100) return 'Select minimum 100 kr for gift card';
        if (blank($args['customer_name'])) return 'Recipient name missing';
        if (!is_phone($args['customer_phone'])) return 'Recipient phone is not valid';
        if (!is_email($args['customer_email'])) return 'Recipient email is not valid';
        if (blank($args['from_name'])) return 'Your name missing';
        if (!is_phone($args['from_phone'])) return 'Your phone # is not valid';
        if (!is_email($args['from_email'])) return 'Your email is not valid';
        if ($args['send'] === 'now') {
            $args['send_datetime'] = Carbon::now();
        } else {
            $args['send_datetime'] = Carbon::create($args['date'] . ' ' . $args['time']);
        }

        try {
            $giftCard = new \App\Models\GiftCard();
            $giftCard->card_number = strtoupper(\Str::random(10));
            $giftCard->amount = intval($args['amount']);
            $giftCard->balance = intval($args['amount']);
            $giftCard->customer_name = $args['customer_name'];
            $giftCard->customer_phone = formatize_phone_number($args['customer_phone']);
            $giftCard->customer_email = $args['customer_email'];
            $giftCard->from_name = $args['from_name'];
            $giftCard->from_email = $args['from_email'];
            $giftCard->from_phone = formatize_phone_number($args['from_phone']);
            $giftCard->send_datetime = $args['send_datetime'];
            $giftCard->customer_card = true;
            $giftCard->card_type = 'PD';
            $giftCard->validity = 36;
            $giftCard->staff_instructions = 'This card is purchased by customer from web site.';
            $giftCard->sent = false;
            $giftCard->generated_time = Carbon::now();
            $giftCard->generated_ip = request()->ip();
            $giftCard->issued = true;
            $giftCard->issued_comments = 'This card is purchased by customer from web site.';
            $giftCard->issued_time = now();
            $giftCard->issued_ip = request()->ip();
            $giftCard->issued_by = -1;

            $giftCard->paid_by_customer = false;
            $giftCard->paid = false;

            $giftCard->valid_date = Carbon::today()->addMonths(36);
            $giftCard->to_message = $args['to_message'];
            $giftCard->deleted = false;
            $giftCard->card_for = 'TA';
            $giftCard->save();
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

//        try {
//            GiftCardSubCards::query()->insert([
//                'card_id' => $giftCard->id,
//                'amount' => 0,
//                'items' => '[]',
//                'time' => now(),
//                'ip' => request()->ip(),
//                'by' => 0,
//                'comments' => 'This card is purchased by customer from web site.',
//                'customer_comments' => $args['to_message']
//            ]);
//        } catch (\Exception $exception) {
//
//        }

        return 'OK' . route('giftcard.payment') . '?token=' . $giftCard->orderToken();
    }

    public function redeemGiftCardByOrder($orderID)
    {
        $order = Orders::query()->find($orderID);
        if (!$order) return 'Order not found in database.';

        if (blank($order->gift_card_numbers)) return 'Gift card is not attached with this order.';
        $giftCard = \App\Models\GiftCard::query()->find($order->gift_card_numbers);
        if (!$giftCard) return 'No gift card found in database.';
        if ($giftCard->deleted) return 'No gift card found in database.';
        if ($giftCard->isExpired()) return 'Gift card is expired.';
        if ($giftCard->isRedeemed()) return 'Gift card is already redeemed.';

        $redeemedAmount = 0;
        if (!$giftCard->is_percent_card && $giftCard->final_balance > 0) {
            Log::info($order->gift_card_discount);
            if ($order->gift_card_discount >= $giftCard->final_balance) {
                $redeemedAmount = $giftCard->balance;
                $giftCard->status = self::Redeemed;
            } else {
                $redeemedAmount = $order->gift_card_discount - $giftCard->item_balance;
                $giftCard->status = self::PartialRedeemed;
            }
        } else if (!$giftCard->is_percent_card && $giftCard->final_balance == 0 && $giftCard->status < self::Redeemed) {
            $giftCard->status = self::Redeemed;
        } else if ($giftCard->is_percent_card && $giftCard->status < self::Redeemed) {
            $redeemedAmount = $order->gift_card_discount;
            if ($giftCard->occurrence_time > 1) {
                $giftCard->occurrence_time = $giftCard->occurrence_time - 1;
                $giftCard->status = self::PartialRedeemed;
            } else {
                $giftCard->status = self::Redeemed;
                $giftCard->occurrence_time = 0;
            }
        }

        $selectedItems = $giftCard->selected_items;
        try {
            $giftCard->selected_items = [];
            $giftCard->save();
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        try {
            GiftCardSubCards::query()
                ->insert([
                    'card_id' => $giftCard->id,
                    'amount' => $redeemedAmount,
                    'items' => json_encode($selectedItems),
                    'time' => now(),
                    'ip' => $order->order_ip,
                    'by' => 0,
                    'customer_comments' => 'Gift card redeemed with order #' . $order->id,
                    'location' => $order->shop,
                    'order_id' => $order->id
                ]);
        } catch (\Exception $ex) {
            return $ex;
        }

        return 'OK';
    }

    public function markDonePayment($id)
    {
        $giftCard = \App\Models\GiftCard::query()->find($id);
        if (!$giftCard) return 'Gift card not found in database.';
        if ($giftCard->paid_by_customer) return 'Gift card is already paid by customer';

        try {
            $giftCard->paid = true;
            $giftCard->paid_by_customer = true;
            $giftCard->paid_ip = request()->ip();
            $giftCard->paid_time = now();
            $giftCard->save();
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        return 'OK';
    }
}
