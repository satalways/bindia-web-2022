<form action="{{ route('checkout.post') }}" method="post" id="checkoutForm">
    <input type="hidden" name="action" value="sendOrder">
    <div class="bn-email-item bn-check-out-last-order bn-main-story">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-3 col-3 bn-checkout-col">
                    <p>{{ __('checkout.do_have_gift_card') }}</p>
                </div>
                <div class="col-lg-4 col-sm-6 col-7 bn-checkout-col">
                    <input type="text" class="form-control" id="giftcard" name="giftcard"
                           value="{{ $items['checkout']['giftcard'] ?? '' }}"
                           placeholder="{{ __('checkout.email_or_card') }}">
                </div>
                <div class="col-lg-2 col-sm-3 col-2 bn-checkout-col">
                    <button type="button" class="bnt btn-dark d-block w-100" data-bs-toggle2="modal"
                            data-bs-target2="#bn-check-last-order" id="redeemGiftcard">
                        {{ __('checkout.go') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--check out box-->
    <div class="bn-check-out bn-main-story">
        <div class="container">
            @include('order.popups.copy_order')

            <div class="bn-order-orange-price">
                <img src="{{ asset('asstes/image/check-out/orange-price-light.png') }}" alt="">
            </div>
            <div class="" id="bn-check-out-order">
                <div class="modal-dialog">
                    <div class="modal-content">
                        @if($items['isOrange'])
                            <div class="bn-orange-container">
                                <img src="{{ asset('asstes/image/check-out/orange-frame.svg') }}" alt=""
                                     class="d-sm-block d-none">
                                <img src="{{ asset('asstes/image/check-out/orange-moble-frame.png') }}" alt=""
                                     class="d-sm-none d-block">
                            </div>
                        @endif

                        <div class="row bn-border-bottom bn-check-box-choose bn-bottom-space-check-mobile">
                            <div class="col-lg-8 col-4">
                                <h2>{{ __('checkout.choose') }}</h2>
                            </div>
                            <div class="col-lg-4 col-8">
                                <div class="bn-radio-order bn-check-box-order">
                                    <div class="form-check">
                                        <input class="form-check-input update {{ $items['isOrange']?'bn-checked-color-chnaged':'' }}" type="radio" name="delivery"
                                               id="choose-pickup"
                                               value="Pickup at Shop" {{ !isset($items['checkout']['delivery']) || $items['checkout']['delivery']==='Pickup at Shop'?'checked':'' }}>
                                        <label class="form-check-label" for="choose-pickup">
                                            {{ __('checkout.pickup') }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input update" type="radio" name="delivery"
                                               id="choose-delivery"
                                               value="By Taxi" {{ isset($items['checkout']['delivery']) && $items['checkout']['delivery']==='By Taxi'?'checked':'' }}>
                                        <label class="form-check-label" for="choose-delivery">
                                            {{ __('checkout.delivery') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row bn-border-bottom bn-check-box-choose bn-bottom-space-check">
                            <div class="col-lg-8 col-4">
                                <h2>{{ __('checkout.payment') }}</h2>
                            </div>
                            <div class="col-lg-4 col-8">
                                <div class="bn-radio-order bn-check-box-order">
                                    <div class="form-check">
                                        <input class="form-check-input update {{ $items['isOrange']?'bn-checked-color-chnaged':'' }}" type="radio" name="payment_type"
                                               id="choose-online"
                                               value="card" {{ !isset($items['checkout']['payment_type']) || $items['checkout']['payment_type']==='card'?'checked':'' }}>
                                        <label class="form-check-label" for="choose-online">
                                            {{ __('checkout.online') }}
                                        </label>
                                    </div>
                                    @if( !isset($items['checkout']['delivery']) || (isset($items['checkout']['delivery']) && $items['checkout']['delivery']==='Pickup at Shop') )
                                        <div class="form-check">
                                            <input class="form-check-input update" type="radio" name="payment_type"
                                                   id="choose-shop"
                                                   value="atshop" {{ isset($items['checkout']['payment_type']) && $items['checkout']['payment_type']==='atshop'?'checked':'' }}>
                                            <label class="form-check-label" for="choose-shop">
                                                {{ __('checkout.shop') }}
                                            </label>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="bn-add-product-all-item">
                            @foreach($items['items'] as $item)
                                <div class="bn-product-child-item">
                                    @if ($item->order_chili && isset($spice2[$item->id]))
                                        @foreach($spice2[$item->id] as $spiceName => $spiceQty)
                                            <div
                                                class="row bn-border-bottom bn-check-out-mobile bn-selected-price {{ $loop->index==0?'bn-product-border-b-none':'' }}">
                                                <div class="col-xl-5 col-lg-5 col-md-6 col-6 bn-col-mobile">
                                                    <h2>
                                                        {{ $item->name }}
                                                        <small class="d-sm-inline-block d-none">(<i>{{ $items['isOrange']?$item->price_orange:$item->price }},-</i>)</small>
                                                        @if(in_array($item->section,['bn-curries','bn-veg']))
                                                            <small>(No Sides)</small>
                                                        @endif
                                                    </h2>
                                                </div>
                                                <div class="col-xl-2 col-lg-2 col-md-2 col-2 bn-col-mobile">
                                                    <div class="bn-number-product d-inline-block">
                                                        <span>{{ spiceName($spiceName) }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-3 col-md-2 col-2">
                                                    <div class="bn-number-product d-inline-block float-end">
                                                        <span>x{{ $spiceQty }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-2 col-lg-2 col-md-2 col-2 bn-col-mobile-left">
                                                    @if($items['isOrange'])
                                                        <div
                                                            class="bn-price-item d-inline-block float-end bn-orange-color">
                                                            {{ $item->price_orange * $spiceQty }},-
                                                        </div>
                                                    @else
                                                        <div
                                                            class="bn-price-item d-inline-block float-end">
                                                            {{ $item->price * $spiceQty }},-
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="row bn-border-bottom bn-check-out-mobile bn-selected-price">
                                            <div class="col-xl-5 col-lg-5 col-md-6 col-6 bn-col-mobile">
                                                <h2>
                                                    {{ $item->name }}
                                                    <small class="d-sm-inline-block d-none">(<i>{{ $items['isOrange']?$item->price_orange:$item->price }},-</i>)</small>
                                                    @if(in_array($item->section,['bn-curries','bn-veg']))
                                                        <small>(No Sides)</small>
                                                    @endif
                                                </h2>
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-2 bn-col-mobile">
                                                <div class="bn-number-product d-inline-block">
                                                    <span></span>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-2 col-2">
                                                <div class="bn-number-product d-inline-block float-end">
                                                    <span>x{{ $item->qty }}</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-2 bn-col-mobile-left">
                                                @if($items['isOrange'])
                                                    <div
                                                        class="bn-price-item d-inline-block float-end bn-orange-color">
                                                        {{ $item->price_orange * $item->qty }},-
                                                    </div>
                                                @else
                                                    <div
                                                        class="bn-price-item d-inline-block float-end">
                                                        {{ $item->price * $item->qty }},-
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        @if ( isset($items['bag_price']) && $items['bag_price'] > 0 )
                            <div class="row bn-border-bottom bn-bottom-space-check bn-bottom-span-mobile-set">
                                <div class="col-lg-6 col-6">
                                    <h2>Bag <small>x{{ $items['bags'] }}</small></h2>
                                </div>
                                <div class="col-lg-6 col-6">
                                    <div class="bn-price-item {{ $items['isOrange']?'bn-orange-color':'' }}">{{ $items['bag_price'] }},-</div>
                                </div>
                            </div>
                        @endif

                        @if ($items['giftCardDiscount']>0)
                            <div class="row bn-border-bottom-dash">
                                <div class="col-lg-6 col-6">
                                    <h2>
                                        {{ __('checkout.gift_card_discount') }}

                                        <button type="button" class="btn btn-danger btn-xs" title="Remove gift card"
                                                id="removeGCButton">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </h2>
                                </div>
                                <div class="col-lg-6 col-6">
                                    <div class="bn-price-item">{{ $items['giftCardDiscount'] }},-</div>
                                </div>
                            </div>
                        @endif

                        @if($items['discount']>0)
                            <div class="row bn-border-bottom-dash pt-0">
                                <div class="col-lg-6 col-6">
                                    <h2>{{ __('checkout.discount') }}</h2>
                                </div>
                                <div class="col-lg-6 col-6">
                                    <div class="bn-price-item">-{{ $items['discount'] }},-</div>
                                </div>
                            </div>
                        @endif

                        @if(!empty($items['delivery_fee']))
                            <div class="row bn-border-bottom" id="delivery">
                                <div class="col-lg-6 col-6">
                                    <h2>
                                        {{ __('checkout.delivery_fee') }}
                                    </h2>
                                </div>
                                <div class="col-lg-6 col-6">
                                    <div class="bn-price-item">-{{ $items['delivery_fee'] }},-</div>
                                </div>
                            </div>
                        @endif

                        <div class="row bn-border-bottom bn-total-price">
                            <div class="col-lg-6 col-6">
                                <h2>{{ __('checkout.total') }}</h2>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="bn-price-item {{ $items['isOrange']?'bn-orange-color':'' }}">{{ $items['total_price'] }},-</div>
                            </div>
                        </div>

                        <div class="row bn-last-order-footer align-middle">
                            <div class="col-md-12 col-12">
                                <p class="float-end">{{ __('checkout.did_you_order_sides') }}</p>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bn-check-out-from">
                <div class="row">
                    <div class="col-md-6">
                        <input type="email" class="form-control update2 cookie" placeholder="{{ __('global.email') }}"
                               name="shipping_email" value="{{ $items['checkout']['shipping_email'] ?? '' }}"
                               required="required">
                    </div>
                    <div class="col-md-3">
                        <input type="tel" class="form-control update2 cookie" placeholder="{{ __('global.phone') }}"
                               name="shipping_phone" value="{{ $items['checkout']['shipping_phone'] ?? '' }}">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control update2 cookie" placeholder="{{ __('global.name') }}"
                               name="customer_name"
                               value="{{ $items['checkout']['customer_name'] ?? '' }}">
                    </div>
                </div>
                @if( isset($items['checkout']['delivery']) && $items['checkout']['delivery']==='By Taxi' )
                    <div class="row bn-from-bottom-space">
                        <div class="col-md-6 col-12">
                            <input type="text" class="form-control update2" placeholder="{{ __('global.address') }}"
                                   name="shipping_address" value="{{ $items['checkout']['shipping_address'] ?? '' }}">
                        </div>
                        <div class="col-md-3 col-4 bn-pr-mobile">
                            <input type="number" class="form-control" placeholder="{{ __('global.postal_code') }}"
                                   name="shipping_postal_code" max="{{ $maxPost }}" min="{{ $minPost }}"
                                   value="{{ $items['checkout']['shipping_postal_code'] ?? '' }}" id="postal_code">
                        </div>
                        <div class="col-md-3 col-8">
                            <input type="text" class="form-control update2" placeholder="{{ __('global.city') }}"
                                   name="shipping_city"
                                   value="{{ $items['checkout']['shipping_city'] ?? '' }}" id="city"
                                   readonly="readonly">
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6 col-12">
                        @if( isset($items['checkout']['delivery']) && $items['checkout']['delivery'] === 'By Taxi' )
                            <input class="form-control" value="Select delivery time:" disabled
                                   style="text-align: right;">
                        @else
                            <select class="form-select update2" required="required"
                                    name="shop" {{ isset($items['checkout']['delivery']) && $items['checkout']['delivery']==='By Taxi'?'disabled':'' }}>
                                <option value="">{{ __('checkout.pick_up_at') }}</option>
                                @foreach(config('shops') as $shop => $array)
                                    <option
                                        {{ ($items['checkout']['shop'] ?? '') == $shop ? 'selected' : '' }} value="{{ $shop }}">
                                        {{ $array['order_name'] }}
                                    </option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                    <div class="col-md-3 col-6 bn-col-pr-mobile bn-col-lr-mobile position-relative">
                        <label class="bn-date-time">{{ __('global.select_date') }}</label>
                        <input type="text" class="form-control update2" name="date"
                               value="{{ $items['checkout']['date'] ?? \Carbon\Carbon::today()->format(config('date_format')) }}"
                               min="{{ \Carbon\Carbon::today()->toDateString() }}">
                    </div>
                    <div class="col-md-3 col-6 bn-col-lr-mobile position-relative">
                        <label class="bn-date-time">{{ __('global.select_time') }}</label>
                        <input type="text" class="form-control update2"
                               min="{{ '16:'.config('order.order_prep_time') }}"
                               name="time"
                               value="{{ $time }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <textarea class="form-control" placeholder="{{ __('global.comments_in_english') }}"
                                  name="comments">{{ $items['checkout']['comments'] ?? '' }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--check out button-->
    <div class="bn-form-checkout-button bn-main-story">
        <div class="container">
            <div class="row bn-border-bottom bn-check-box-choose">
                <div class="col-md-9 col-8">
                    <div class="bn-radio-order bn-check-box-order">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="term_accept" id="policy-choose"
                                   value="1" required>
                            <label class="form-check-label" for="policy-choose">
                                {!! __('checkout.i_accept_checout_terms', ['link' => route('terms_and_conditions')]) !!}
                            </label>
                        </div>
                        <div class="form-check mb-0">
                            <input class="form-check-input" type="checkbox" name="copy_order"
                                   id="enable-order"
                                   value="1" {{ isset($items['checkout']['copy_order']) && $items['checkout']['copy_order'] == 1 ? 'checked':'' }}>
                            <label class="form-check-label" for="enable-order">
                                {!! __('checkout.enable_copy_last_order') !!}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-4">
                    <button type="button" class="btn" id="checkoutButton">Checkout</button>
                </div>
            </div>

        </div>
    </div>
</form>

