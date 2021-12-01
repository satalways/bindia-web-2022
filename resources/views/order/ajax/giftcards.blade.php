{{--<pre>--}}
{{--{{ print_r($giftCards, true) }}--}}
{{--</pre>--}}


@foreach($giftCards as $giftCard)
    <div class="row bn-border-bottom bn-gift-row-border mt-5">
        {{--        {{ print_r($giftCard->toArray(), true) }}--}}

        <div class="row bn-border-bottom mt-5">
            <div class="col-md-6 col-6">
                <div class="bn-radio-order">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" value="option1">
                        <label class="form-check-label" for="exampleRadios1">
                            Gift Card <span class="bn-coupon-code">#{{ $giftCard->card_number }}</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-6">
                <div class="bn-price-item bn-coupon-code">
                    Valid until: {{ $giftCard->valid_date->format(config('app.date_format')) }}
                </div>
            </div>
        </div>
        @if(!empty($giftCard->selected_items_names))
            <div class="row bn-gift-row-border">
                <div class="col-md-6 col-6">
                    <div class="bn-radio-order">
                        <div class="form-check">
                            <label class="form-check-label">
                                Available Items
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-6">
                    <div class="bn-price-item bn-price-gift-book">
                        @foreach($giftCard->selected_items_names as $item => $qty)
                            {{ $qty }}x {{ $item }}@if(!$loop->last),@endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if($giftCard->amount > 0)
            <div class="row bn-gift-row-border">
                <div class="col-md-6 col-6">
                    <div class="bn-radio-order">
                        <div class="form-check">
                            <label class="form-check-label">
                                Available Amount
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-6">
                    <div class="bn-price-item bn-price-gift-book">{{ $giftCard->amount }},-</div>
                </div>
            </div>
        @endif
    </div>
@endforeach
