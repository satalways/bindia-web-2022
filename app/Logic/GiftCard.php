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

}
