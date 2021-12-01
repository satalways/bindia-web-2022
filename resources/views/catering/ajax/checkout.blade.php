<form action="{{ route('catering.post') }}" method="post" id="form1">
    <input type="hidden" name="action" value="updateCheckoutForm">
    <div class="bn-catering-menu-all bn-menu-overview"
         style="{{ $session['type']!=='buffet'?'padding-bottom:0 !important;':'' }}">
        <div class="container">
            <div class="bn-header-overview d-md-block d-none">
                <h1>{{ __('catering.order_overview') }}</h1>
            </div>
            <div class="row bn-border-bottom">
                <div class="col-lg-6 col-12">
                    <h2>{{ $menuName }}</h2>
                </div>
                @if($session['type'] === 'buffet')
                    <div class="col-md-2">
                        <span class="d-lg-inline-block d-none bn-span-text">{{ __('catering.people') }}</span>
                    </div>
                    <div class="col-lg-3 col-3 d-lg-block d-none">
                        <div class="bn-price-item">
                            <div class="bn-number-product">
                                <img src="{{ asset('asstes/image/take-away/min.svg') }}" alt="" data-add="-1"
                                     class="addPersons" style="cursor:pointer;">
                                <span>x{{ $session['persons'] }}</span>
                                <img src="{{ asset('asstes/image/take-away/max.svg') }}" alt="" data-add="1"
                                     class="addPersons" style="cursor: pointer">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-3 d-lg-block d-none">
                        <div class="bn-price-item">{{ number_format2($amount['persons'],0) }},-</div>
                    </div>
                @endif
            </div>
            @if($session['type'] === 'buffet')
                <div class="bn-menu-overview-box">
                    <div class="row">
                        <div class="col-md-8 col-9">
                            <div class="bn-menu-header">
                                {{ __('catering.main_dishes') }}
                            </div>
                            <div id="bn-check-last-order">
                                <div class="bn-radio-order">
                                    <select class="form-select" aria-label="Default select example"
                                            name="menu_items[2][1]">
                                        <optgroup label="VEG. & VEGAN">
                                            @foreach($vegs as $item)
                                                <option
                                                    value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][2][1] ?? config('catering.menu2.default1')) ? 'selected': '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="CURRIES">
                                            @foreach($curries as $item)
                                                <option
                                                    value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][2][1] ?? config('catering.menu2.default1')) ? 'selected': '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="bn-radio-order">
                                    <select class="form-select" aria-label="Default select example"
                                            name="menu_items[2][2]">
                                        <optgroup label="VEG. & VEGAN">
                                            @foreach($vegs as $item)
                                                <option
                                                    value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][2][2] ?? config('catering.menu2.default2')) ? 'selected': '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="CURRIES">
                                            @foreach($curries as $item)
                                                <option
                                                    value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][2][2] ?? config('catering.menu2.default2')) ? 'selected': '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="bn-radio-order">
                                    <select class="form-select" aria-label="Default select example"
                                            name="menu_items[2][3]">
                                        <optgroup label="VEG. & VEGAN">
                                            @foreach($vegs as $item)
                                                <option
                                                    value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][2][3] ?? config('catering.menu2.default3')) ? 'selected': '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="CURRIES">
                                            @foreach($curries as $item)
                                                <option
                                                    value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][2][3] ?? config('catering.menu2.default3')) ? 'selected': '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="bn-radio-order">
                                    <select class="form-select" aria-label="Default select example"
                                            name="menu_items[2][4]">
                                        <optgroup label="VEG. & VEGAN">
                                            @foreach($vegs as $item)
                                                <option
                                                    value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][2][4] ?? config('catering.menu2.default4')) ? 'selected': '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="CURRIES">
                                            @foreach($curries as $item)
                                                <option
                                                    value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][2][4] ?? config('catering.menu2.default4')) ? 'selected': '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 d-md-block d-none"></div>
                        <div class="col-md-2 col-3">
                            <div
                                class="bn-right-menu-bar {{ $session['type']=='buffet' && $session['menu']<4?'bn-light-black-color':'' }}">
                                <div class="bn-menu-header">
                                    {{ __('catering.drinks') }}
                                </div>
                                <span>
                                Mango Lassi
                            </span>
                            </div>
                            <div
                                class="bn-right-menu-bar {{ $session['type']=='buffet' && $session['menu']<3?'bn-light-black-color':'' }}">
                                <div class="bn-menu-header">
                                    Starters
                                </div>
                                <span>
                                    Tandoori Chicken
                                </span>
                            </div>
                            <div
                                class="bn-right-menu-bar {{ $session['type']=='buffet' && $session['menu']<2?'bn-light-black-color':'' }}">
                                <div class="bn-menu-header">
                                    Appetizers
                                </div>
                                <span>
                                   Papadums
                                </span>
                                <span>Chutneys</span>
                            </div>
                            <div class="bn-right-menu-bar">
                                <div class="bn-menu-header">
                                    Sides
                                </div>
                                <span>
                                  Pilaoo Rice
                                </span>
                                <span>Nan</span>
                                <span>Paratha</span>
                                <span>Raita</span>
                                <span>Mango Chutney</span>
                                <span>Chopped Salad</span>
                            </div>
                        </div>
                    </div>
                    <div class="row bn-border-bottom mb-0 d-lg-none d-flex">
                        <div class="col-md-8 col-9">
                            <div class="bn-number-people">
                                <input type="number" value="1">
                                <span>No. of people</span>
                            </div>
                        </div>
                        <div class="col-md-2 d-md-block d-none"></div>
                        <div class="col-md-2 col-3">
                            <div class="bn-number-price">
                                <h3>200,-</h3>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!--check out box-->
    <div class="bn-check-out bn-main-story bn-menu-overview-checkout-form">
        <div class="container">
            <div class="" id="bn-check-out-order">
                <div class="modal-dialog">
                    <div class="modal-content">
                        @if($session['type'] === 'buffet' && isset($session['drinks']))
                            @foreach($sideItems as $code=>$qty)
                                <div class="row bn-border-bottom bn-border-bottom-dash"
                                     style="padding-top: 0 !important;">
                                    <div class="col-lg-8 col-6">
                                        <h2>{{ item($code)->name }}</h2>
                                    </div>
                                    <div class="col-lg-3 col-4">
                                        <div class="bn-price-item">
                                            <div class="bn-number-product">
                                                <img src="{{ asset('asstes/image/take-away/min-grey.svg') }}" alt="">
                                                <span>{{ $qty }}</span>
                                                <img src="{{ asset('asstes/image/take-away/max-grey.svg') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-2">
                                        {{--                                        <div class="bn-price-item">{{ item($code)->price * $qty }},-</div>--}}
                                    </div>
                                </div>
                            @endforeach

                            @foreach($session['drinks'] as $code=>$qty)
                                <div class="row bn-border-bottom bn-border-bottom-dash">
                                    <div class="col-lg-8 col-6">
                                        <h2>{{ item($code)->name }}</h2>
                                    </div>
                                    <div class="col-lg-3 col-4">
                                        <div class="bn-price-item">
                                            <div class="bn-number-product">
                                                <img src="{{ asset('asstes/image/take-away/min.svg') }}" alt=""
                                                     data-add="-1" data-code="{{ $code }}" class="addDrink"
                                                     style="cursor: pointer">
                                                <span>{{ $qty }}</span>
                                                <img src="{{ asset('asstes/image/take-away/max.svg') }}" alt=""
                                                     data-add="1" data-code="{{ $code }}" class="addDrink"
                                                     style="cursor: pointer">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-2">
                                        <div class="bn-price-item">{{ item($code)->price * $qty }},-</div>
                                    </div>
                                </div>
                            @endforeach
                        @elseif($session['type'] === 'portion' && (isset($session['portion']['items']) || $session['portion']['sides']))
                            @if(!empty($session['portion']['items']))
                                @foreach($session['portion']['items'] as $code=>$qty)
                                    <div class="row bn-border-bottom bn-border-bottom-dash">
                                        <div class="col-lg-8 col-6">
                                            <h2>{{ item($code)->name }}</h2>
                                        </div>
                                        <div class="col-lg-3 col-4">
                                            <div class="bn-price-item">
                                                <div class="bn-number-product">
                                                    <img src="{{ asset('asstes/image/take-away/min.svg') }}" alt=""
                                                         data-add="-1" data-code="{{ $code }}" data-item="1"
                                                         class="addDrink"
                                                         style="cursor: pointer">
                                                    <span>{{ $qty }}</span>
                                                    <img src="{{ asset('asstes/image/take-away/max.svg') }}" alt=""
                                                         data-add="1" data-code="{{ $code }}" data-item="1"
                                                         class="addDrink"
                                                         style="cursor: pointer">
                                                </div>
                                            </div>
                                        </div>
                                        {{--                                        <div class="col-lg-1 col-2">--}}
                                        {{--                                            <div class="bn-price-item">{{ item($code)->price * $qty }},-</div>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                @endforeach
                            @endif
                            @if(!empty($session['portion']['sides']))
                                @foreach($session['portion']['sides'] as $code=>$qty)
                                    <div class="row bn-border-bottom bn-border-bottom-dash">
                                        <div class="col-lg-8 col-6">
                                            <h2>{{ item($code)->name }}</h2>
                                        </div>
                                        <div class="col-lg-3 col-4">
                                            <div class="bn-price-item">
                                                <div class="bn-number-product">
                                                    <img src="{{ asset('asstes/image/take-away/min.svg') }}" alt=""
                                                         data-add="-1" data-code="{{ $code }}" data-item="0"
                                                         class="addDrink"
                                                         style="cursor: pointer">
                                                    <span>{{ $qty }}</span>
                                                    <img src="{{ asset('asstes/image/take-away/max.svg') }}" alt=""
                                                         data-add="1" data-code="{{ $code }}" data-item="0"
                                                         class="addDrink"
                                                         style="cursor: pointer">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-2">
                                            <div class="bn-price-item">{{ item($code)->price * $qty }},-</div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endif
                        <div class="row bn-border-bottom bn-total-price">
                            <div class="col-lg-6 col-6">
                                <h2>{{ __('catering.order_total') }}</h2>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="bn-price-item">
                                    @if($session['type'] === 'buffet')
                                        {{ number_format2($amount['drinks'] + $amount['persons'],0) }}
                                    @else
                                        {{ number_format2($session['amount']['items'] + $session['amount']['sides'],0) }}
                                    @endif
                                    ,-
                                </div>
                            </div>
                        </div>
                        <div class="row bn-border-bottom bn-border-bottom-dash">
                            <div class="col-lg-7 col-9">
                                <h2>{{ __('catering.thermo_boxes') }}
                                    <small class="d-lg-none d-inline-block">
                                        {{ config('catering.thermo_box_price') }},- {{ __('catering.deposit_per_box') }}
                                    </small>
                                    <i class="fas fa-question-circle"></i></h2>
                            </div>
                            <div class="col-lg-4 col-1">
                                <div class="bn-radio-order bn-check-box-order bn-choose-drink-box">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="thermo"
                                               {{ $isThermo?'checked':'' }}
                                               id="thermo" value="1">
                                        <label class="form-check-label d-lg-block d-none noselect" for="thermo"
                                               style="cursor: pointer">
                                            {{ config('catering.thermo_box_price') }}
                                            ,- {{ __('catering.deposit_per_box') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 col-2">
                                <div
                                    class="bn-price-item">{{ number_format2($thermo * config('catering.thermo_box_price'),0) }}
                                    ,-
                                </div>
                            </div>
                        </div>
                        @if(isset($session['delivery']) && $session['delivery'] == 1 && isset($session['delivery_fee']))
                            <div class="row bn-border-bottom bn-border-bottom-dash">
                                <div class="col-lg-7 col-9">
                                    <h2>
                                    {{ __('catering.delivery_fee') }}
                                    </h2>
                                </div>
                                <div class="col-lg-4 col-1">

                                </div>
                                <div class="col-lg-1 col-2">
                                    <div
                                        class="bn-price-item">{{ number_format2($session['delivery_fee'],0) }}
                                        ,-
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row bn-border-bottom bn-total-price">
                            <div class="col-lg-6 col-6">
                                <h2>{{ __('catering.to_be_paid') }}</h2>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="bn-price-item">
                                    @if($session['type'] === 'buffet')
                                        {{ number_format2($amount['drinks'] + $amount['persons'] + $thermo * config('catering.thermo_box_price'),0) }}
                                    @else
                                        {{ number_format2($session['total_price'] + $thermo * config('catering.thermo_box_price'),0) }}
                                    @endif
                                    ,-
                                </div>
                            </div>
                        </div>
                        <div class="row bn-border-bottom bn-check-box-choose">
                            <div class="col-lg-8 col-5">
                                <h2>{{ __('catering.delivery1') }}</h2>
                            </div>
                            <div class="col-lg-4 col-7">
                                <div class="bn-radio-order bn-check-box-order">
                                    <div class="form-check">
                                        <input class="form-check-input updateForm2" type="radio" name="delivery"
                                               id="choose-pickup" value="0" {{ $delivery==0?'checked':'' }}>
                                        <label class="form-check-label" for="choose-pickup">
                                            {{ __('catering.pick_up') }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input updateForm2" type="radio" name="delivery"
                                               id="choose-delivery" value="1" {{ $delivery==1?'checked':'' }}>
                                        <label class="form-check-label" for="choose-delivery">
                                            {{ __('catering.delivery2') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row bn-border-bottom bn-check-box-choose d-sm-none d-flex">
                            <div class="col-lg-8 col-6">
                                <h2>Payment</h2>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="bn-radio-order bn-check-box-order">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="choose-payment"
                                               id="choose-online" value="option2">
                                        <label class="form-check-label" for="choose-online">
                                            Online
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="choose-payment"
                                               id="choose-shop" value="option1">
                                        <label class="form-check-label" for="choose-shop">
                                            Shop
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bn-check-out-from">
                <div class="row">
                    <div class="col-md-6">
                        <input type="email" name="customer[email]" class="form-control updateForm"
                               placeholder="{{ __('global.email') }}" value="{{ $session['customer']['email'] ?? '' }}">
                    </div>
                    <div class="col-md-3">
                        <input type="tel" name="customer[phone]" class="form-control updateForm"
                               placeholder="{{ __('global.phone') }}" value="{{ $session['customer']['phone'] ?? '' }}">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control updateForm" name="customer[name]"
                               value="{{ $session['customer']['name'] ?? '' }}"
                               placeholder="{{ __('global.name') }}">
                    </div>
                </div>
                <div class="row bn-from-bottom-space" style="{{ $delivery==1?'':'display:none' }}">
                    <div class="col-md-6 col-12">
                        <input type="text" class="form-control updateForm" placeholder="{{ __('global.address') }}"
                               name="customer[address]" value="{{ $session['customer']['address'] ?? '' }}">
                    </div>
                    <div class="col-md-3 col-4">
                        <input type="number" class="form-control updateForm" id="postal_code"
                               value="{{ $session['customer']['postal_code'] ?? '' }}"
                               placeholder="{{ __('global.postal_code') }}" name="customer[postal_code]">
                    </div>
                    <div class="col-md-3 col-8">
                        <input type="text" class="form-control updateForm" placeholder="{{ __('global.city') }}"
                               name="customer[city]" value="{{ $session['customer']['city'] ?? '' }}" id="city"
                               readonly="readonly">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <select class="form-select updateForm" name="shop" id="shop" {{ $delivery==1?'disabled':'' }}>
                            <option value="">{{ __('global.pick_up_at') }}</option>
                            @foreach(config('shops') as $shopName=>$shopArray)
                                <option
                                    {{ isset($session['shop']) && $session['shop'] == $shopName ? 'selected' : '' }} value="{{ $shopName }}">{{ $shopArray['long_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 col-6 bn-col-lr-mobile position-relative">
                        <label class="bn-date-time">{{ __('global.select_date') }}</label>
                        <input type="date" class="form-control updateForm" name="date"
                               value="{{ $session['date'] ?? '' }}"
                               min="{{ \Carbon\Carbon::tomorrow()->toDateString() }}">
                    </div>
                    <div class="col-md-3 col-6 bn-col-lr-mobile position-relative">
                        <label class="bn-date-time">{{ __('global.select_time') }}</label>
                        <input type="time" class="form-control updateForm" name="time"
                               value="{{ $session['time'] ?? '' }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <textarea class="form-control updateForm" name="comments"
                                  placeholder="{{ __('global.comments_in_english') }}">{{ $session['comments'] ?? '' }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--check out button-->
    <div class="bn-form-checkout-button bn-main-story bn-overview-btn">
        <div class="container">
            <div class="row bn-border-bottom bn-check-box-choose">
                <div class="col-md-7 col-7">
                    <div class="bn-radio-order bn-check-box-order">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="accept_terms" id="policy-choose"
                                   value="1">
                            <label class="form-check-label" for="policy-choose">
                                {{ __('checkout.i_accept') }}
                                <a href="{{ route('terms_and_conditions') }}" target="_blank">
                                    {{ __('checkout.accept_terms') }}
                                </a>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-5">
                    <button type="button" class="btn d-md-inline-block d-none"
                            onclick="window.location.href='{{ $back_link }}'">{{ __('global.back') }}</button>
                    <button type="submit" class="btn">{{ __('catering.confirm_and_pay') }}</button>
                </div>
            </div>

        </div>
    </div>
</form>
