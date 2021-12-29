<?php

namespace App\Models;

use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Model\GiftCardSubCards;
use Model\OrderItems;

class GiftCard extends Model
{
    use HasFactory;

    protected $table = 'gift_cards';

    public $timestamps = false;

    protected $appends = [
        'is_percent_card',
        'selected_items_names',
        'sub_cards',
    ];

    protected $dates = [
        'generated_time',
        'issued_time',
        'redeemed_time',
        'valid_date',
        'loyalty_time',
        'send_datetime',
        'sent_time',
        'paid_time',
        'deleted_time',
    ];

    protected $casts = [
        'deleted' => 'boolean',
        'paid_by_customer' => 'boolean',
        'sent' => 'boolean',
        'staff_can_issue' => 'boolean',
        'loyalty' => 'boolean',
        'paid' => 'boolean',
        'redeemed' => 'boolean',
        'issued' => 'boolean',
        'customer_card' => 'boolean',
        'converted' => 'boolean',
        'selected_items' => 'array',
        'redeemed_orders' => 'array'
    ];

    protected $fillable = ['id'];

    /**
     * @return bool
     */
    public function getIsPercentCardAttribute(): bool
    {
        return $this->amount_type === 'percent';
    }

    /**
     * @return HasMany
     */
//    public function sub_cards()
//    {
//        return $this->hasMany(GiftCardSubCards::class, 'card_id')
//            ->orderBy('id', 'DESC');
//    }

    /**
     * @return HasMany|array
     */
    public function getSelectedItemsNamesAttribute(): HasMany|array
    {
        if (blank($this->attributes['selected_items'])) return [];

        $items = make_array($this->attributes['selected_items']);
        $names = [];

        foreach ($items as $code => $qty) {
            try {
                $name = \App\Models\OrderItems::query()
                    ->where('code', $code)
                    ->value('name');

                if ($name) {
                    $names[$name] = $qty;
                }
            } catch (\Exception $exception) {

            }
        }

        return $names;
    }

    public function getSentTimeAttribute()
    {
        if ($this->attributes['sent_time'] === '0000-00-00 00:00:00') return null;

        return $this->attributes['sent_time'];
    }

    public function getPaidTimeAttribute()
    {
        if ($this->attributes['paid_time'] === '0000-00-00 00:00:00') return null;

        return $this->attributes['paid_time'];
    }

    public function getSubCardsAttribute()
    {
        return \App\Models\GiftCardSubCards::query()->where('card_id', $this->id)->orderBy('id', 'desc')->get();
    }

    public function isExpired(): bool
    {
        $date = $this->valid_date;
        return once(function () use ($date) {
            return Carbon::now()->greaterThan($date);
        });
    }

    /**
     * Get status name of a gift card.
     *
     * @return string
     */
    public function getStatusName(): string
    {
        $array = config('gc.status');
        return $array[$this->status] ?? 'Unknown';
    }

    public function isRedeemed()
    {
        return $this->status === 4;
    }

    public function getBalanceAttribute()
    {
        if ($this->amount_type === 'percent') {
            return $this->attributes['balance'];
        } else {
            return $this->amount - $this->getSubCardsAttribute()->sum('amount');
        }
    }

    public function getOrangeItemBalanceAttribute()
    {
        if (is_array($this->selected_items)) {
            $items = \App\Models\OrderItems::query()
                ->where('active', true)
                ->whereIn('code', array_keys($this->selected_items))
                ->select(['code', 'price_orange'])
                ->orderBy('code')
                ->get();

            $qtyArray = $this->selected_items;

            $amount = 0;
            foreach ($items as $item) {
                if (isset($qtyArray[$item->code])) {
                    $amount += ($qtyArray[$item->code] * $item->price_orange);
                }
            }

            return $amount;
        } else {
            return 0;
        }
    }

    public function getItemBalanceAttribute()
    {
        if (is_array($this->selected_items)) {
            $items = \App\Models\OrderItems::query()
                ->where('active', true)
                ->whereIn('code', array_keys($this->selected_items))
                ->select(['code', 'price'])
                ->orderBy('code')
                ->get();

            $qtyArray = $this->selected_items;

            $amount = 0;
            foreach ($items as $item) {
                if (isset($qtyArray[$item->code])) {
                    $amount += ($qtyArray[$item->code] * $item->price);
                }
            }

            return $amount;
        } else {
            return 0;
        }
    }

    public function getFinalBalanceAttribute()
    {
        return $this->getBalanceAttribute() + $this->getItemBalanceAttribute();
    }

    public function getOrangeFinalBalanceAttribute()
    {
        return $this->getBalanceAttribute() + $this->getOrangeItemBalanceAttribute();
    }

    public function orderToken()
    {
        return encodeData(['id' => $this->id]);
    }
}
