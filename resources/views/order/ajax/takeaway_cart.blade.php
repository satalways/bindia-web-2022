@if( $items['items']->count() === 0 )
    {{ __('takeaway.no_item_found') }}
@else
    @foreach($items['items'] as $item)
        <div class="row bn-border-bottom">
            <div class="col-xl-8 col-lg-7 col-md-8 col-8">
                <h2>{{ $item->name }}
                    @if(in_array($item->section, ['bn-veg', 'bn-curries']))
                        <small style="margin-left: 5px;">(no Sides)</small>
                    @endif
                </h2>
            </div>
            <div class="col-xl-2 col-lg-3 col-4 d-lg-inline-block d-none">
                <div class="bn-number-product float-end">
                    <img class="bn-remove-radio-html addItem" src="{{ asset('asstes/image/take-away/min.svg') }}" alt=""
                         data-inc="-1" style="cursor: pointer" data-id="{{ $item->id }}">
                    <span>x{{ $cartItems[$item->id] }}</span>
                    <img class="bn-add-radio-html addItem" src="{{ asset('asstes/image/take-away/max.svg') }}" alt=""
                         data-inc="+1" style="cursor: pointer" data-id="{{ $item->id }}">
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-4 col-4">
                <div class="bn-price-item">
                    <span
                        class="bh-current-price">{{ number_format2($item->price * $cartItems[$item->id],0) }} /</span>
                    <span
                        class="bn-discount-price">{{ number_format2($item->price_orange * $cartItems[$item->id],0) }}</span>
                </div>
            </div>
            <div class="col-xl-8 col-8 bn-body-radio-box">
                @if($item->order_chili)
                    @for($x=0; $x<$cartItems[$item->id]; $x++)
                        <div class="bn-radio-order">
                            <div class="form-check">
                                <input class="form-check-input spiceCheck" type="radio"
                                       name="spice[{{ $item->id }}][{{ $x }}]"
                                       id="exampleRadios1{{ $x.$item->id }}"
                                       value="default" {{ !isset($spice[$item->id][$x]) || (isset($spice[$item->id][$x]) && str_ends_with($spice[$item->id][$x], 'default')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="exampleRadios1{{ $x.$item->id }}">
                                    Standard
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input spiceCheck" type="radio"
                                       name="spice[{{ $item->id }}][{{ $x }}]"
                                       id="exampleRadios2{{ $x.$item->id }}"
                                       value="hot" {{ isset($spice[$item->id][$x]) && str_ends_with($spice[$item->id][$x], 'hot') ? 'checked' : '' }}>
                                <label class="form-check-label" for="exampleRadios2{{ $x.$item->id }}">
                                    Hot
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input spiceCheck" type="radio"
                                       name="spice[{{ $item->id }}][{{ $x }}]"
                                       id="exampleRadios3{{ $x.$item->id }}"
                                       value="xhot" {{ isset($spice[$item->id][$x]) && str_ends_with($spice[$item->id][$x], 'xhot') ? 'checked' : '' }}>
                                <label class="form-check-label" for="exampleRadios3{{ $x.$item->id }}">
                                    X-Hot
                                </label>
                            </div>
                        </div>
                    @endfor
                @endif
            </div>
            <div class="col-xl-4 col-lg-4 col-4 d-lg-none d-inline-block">
                <div class="bn-number-product float-end">
                    <img src="{{ asset('asstes/image/take-away/min.svg') }}" alt="" data-id="{{ $item->id }}"
                         class="addItem" data-inc="-1" style="cursor: pointer">
                    <span>x{{ $cartItems[$item->id] }}</span>
                    <img src="{{ asset('asstes/image/take-away/max.svg') }}" alt="" data-id="{{ $item->id }}"
                         class="addItem" data-inc="+1" style="cursor: pointer">
                </div>
            </div>
            {{--            <div class="col-lg-1 d-lg-block d-none">--}}
            {{--                <div class="bn-price-item">{{ $item->price * $cartItems[$item->id] }},-</div>--}}
            {{--            </div>--}}
        </div>
    @endforeach

    @if ( !empty($items['bag_price']) )
        <div class="row bn-border-bottom">
            <div class="col-lg-6 col-6">
                <h2>Take Away Bag</h2>
            </div>
            <div class="col-lg-6 col-6">
                <div class="bn-price-item">{{ $items['bag_price'] }},-</div>
            </div>
        </div>
    @endif
    <div class="row bn-border-bottom">
        <div class="col-lg-6 col-6">
            <h2>{{ __('checkout.total') }}</h2>
        </div>
        <div class="col-lg-6 col-6">
            <div class="bn-price-item position-relative">
                <span class="bh-current-price">{{ number_format2($items['total_price'],0) }} /</span>
                <span class="bn-discount-price">{{ number_format2($items['total_price_orange'],0) }}</span>
            </div>
        </div>
    </div>
    <div class="row bn-last-order-footer align-middle">
        <div class="col-md-9 col-6">
            @if (showSideOrders())
                <p class="float-end">{{ __('checkout.did_you_order_sides') }}</p>
            @endif
            <div class="clearfix"></div>
        </div>
        <div class="col-md-3 col-6">
            <button type="button" class="btn btn-dark w-100" onclick="window.location.href='{{ route('checkout') }}'">
                Checkout
            </button>
        </div>
    </div>
@endif
