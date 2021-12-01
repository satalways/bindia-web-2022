@if( $items['items']->count() === 0 )
    {{ __('takeaway.no_item_found') }}
@else
    @foreach($items['items'] as $item)
        <div class="row bn-border-bottom">
            <div class="col-xl-3 col-lg-4 col-6">
                <h2>{{ $item->name }}
                    @if(in_array($item->section, ['bn-veg', 'bn-curries']))
                        <span style="font-size: 60%; font-weight: normal !important;">(No Sides)</span>
                    @endif
                </h2>
            </div>
            <div class="col-6 d-lg-none d-block">
                <div class="bn-price-item">{{ $item->price * $cartItems[$item->id] }},-</div>
            </div>
            <div class="col-xl-6 col-lg-5 col-md-9 col-8">
                @if($item->order_chili)
                    <div class="bn-radio-order">
                        <div class="form-check">
                            <input class="form-check-input spiceCheck" type="radio" name="spice[{{ $item->id }}]"
                                   id="exampleRadios1{{ $item->id }}"
                                   value="default" {{ !isset($spice[$item->id]) || (isset($spice[$item->id]) && str_ends_with($spice[$item->id], 'default')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="exampleRadios1{{ $item->id }}">
                                Standard
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input spiceCheck" type="radio" name="spice[{{ $item->id }}]"
                                   id="exampleRadios2{{ $item->id }}"
                                   value="hot" {{ isset($spice[$item->id]) && str_ends_with($spice[$item->id], 'hot') ? 'checked' : '' }}>
                            <label class="form-check-label" for="exampleRadios2{{ $item->id }}">
                                Hot
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input spiceCheck" type="radio" name="spice[{{ $item->id }}]"
                                   id="exampleRadios3{{ $item->id }}"
                                   value="xhot" {{ isset($spice[$item->id]) && str_ends_with($spice[$item->id], 'xhot') ? 'checked' : '' }}>
                            <label class="form-check-label" for="exampleRadios3{{ $item->id }}">
                                X-Hot
                            </label>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-lg-2 col-md-3 col-4">
                <div class="bn-number-product">
                    <img src="{{ asset('asstes/image/take-away/min.svg') }}" alt="" data-id="{{ $item->id }}"
                         class="addItem" data-inc="-1" style="cursor: pointer">
                    <span>x{{ $cartItems[$item->id] }}</span>
                    <img src="{{ asset('asstes/image/take-away/max.svg') }}" alt="" data-id="{{ $item->id }}"
                         class="addItem" data-inc="+1" style="cursor: pointer">
                </div>
            </div>
            <div class="col-lg-1 d-lg-block d-none">
                <div class="bn-price-item">{{ $item->price * $cartItems[$item->id] }},-</div>
            </div>
        </div>
    @endforeach

    @if ( isset($items['bag_price']) && $items['bag_price'] > 0 )
        <div class="row bn-border-bottom">
            <div class="col-lg-6 col-6">
                <h2>Take Away Bag</h2>
            </div>
            <div class="col-lg-6 col-6">
                <div class="bn-price-item">{{ $items['bag_price'] }},-</div>
            </div>
        </div>
    @endif
    {{--<div class="row bn-border-bottom-dash">--}}
    {{--    <div class="col-lg-6 col-6">--}}
    {{--        <h2>Discount</h2>--}}
    {{--    </div>--}}
    {{--    <div class="col-lg-6 col-6">--}}
    {{--        <div class="bn-price-item">10,-</div>--}}
    {{--    </div>--}}
    {{--</div>--}}
    <div class="row bn-border-bottom">
        <div class="col-lg-6 col-6">
            <h2>Total</h2>
        </div>
        <div class="col-lg-6 col-6">
            <div class="bn-price-item">{{ $items['total_price'] }},-</div>
        </div>
    </div>
    <div class="row bn-last-order-footer align-middle">
        <div class="col-md-9 col-6">
            <p class="float-end">{{ __('checkout.did_you_order_sides') }}</p>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-3 col-6">
            <button type="button" class="btn btn-dark w-100" onclick="window.location.href='{{ route('checkout') }}'">
                Checkout
            </button>
        </div>
    </div>
@endif
