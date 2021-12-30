@extends('layouts.app')

@section('content')
    <!---->
    <div class="bn-buffet-item bn-buffet-menu-box bn-main-story">
        <div class="container">
            <div class="bn-buffet-header">
                <h1>{{ __('catering.buffet_portion_packed') }}</h1>
                <div class="row">
                    <div class="col-md-2 col-3 bn-border-bottom">
                    </div>
                    <div class="col-md-4 col-4 bn-border-bottom">
                        <p><b class="bn-org-text">{{ __('catering.buffet') }}</b></p>
                    </div>
                    <div class="col-md-3 col-5 bn-border-bottom">
                        <p><b class="bn-light-black">{{ __('catering.portion_packed') }}</b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-3 bn-border-bottom">
                        <p><b>{{ __('catering.packing') }}</b></p>
                    </div>
                    <div class="col-md-4 col-4 bn-border-bottom">
                        <p>{{ __('catering.buffet_style') }}</p>
                    </div>
                    <div class="col-md-3 col-5 bn-border-bottom">
                        <p class="bn-light-color-b">{{ __('catering.separately_packed') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-3 bn-border-bottom">
                        <p><b>{{ __('catering.meal_type') }}</b></p>
                    </div>
                    <div class="col-md-4 col-4 bn-border-bottom">
                        <p>{{ __('catering.dinner_party') }}</p>
                    </div>
                    <div class="col-md-3 col-5 bn-border-bottom">
                        <p class="bn-light-color-b">{{ __('catering.lunch_simple_dinner') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-3 bn-border-bottom">
                        <p><b>{{ __('catering.quantity') }}</b></p>
                    </div>
                    <div class="col-md-4 col-4 bn-border-bottom">
                        <p>{{ __('catering.bindia_guarantees') }}</p>
                    </div>
                    <div class="col-md-3 col-5 bn-border-bottom">
                        <p class="bn-light-color-b">500g per {{ __('catering.portion') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-3">
                    </div>
                    <div class="col-md-3 col-4 bn-padding-0">
                        <a href="{{ route('catering') }}"
                           class="btn bg-dark bn-btn-one w-100 text-white">
                            {{ __('catering.buffet') }}
                        </a>
                    </div>
                    <div class="col-md-1 d-md-inline-block d-none"></div>
                    <div class="col-md-3 col-5 bn-padding-0">
                        <a href="{{ route('catering.portion') }}" class="btn bg-dark bn-btn-two w-100 text-white">
                            {{ __('catering.portion_packed') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('catering.post') }}" method="post" id="form1">
        <input type="hidden" name="action" value="orderStep1">
        <input type="hidden" name="type" value="buffet">
        <input type="hidden" name="menu" value="4">
        <input type="hidden" name="persons" value="">
        <!--item Food box-->
        <div class="bn-catering-menu-all">
            <div class="container">
                <div id="bn-menu-banner">
                    <img src="" alt="">
                </div>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link {{ isset($session['menu']) && $session['menu']==1 ? 'active' : '' }}"
                                id="nav-home-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-menu-one"
                                type="button" role="tab" aria-controls="nav-menu-one" aria-selected="true"
                                value="nav-menu-one">
                            {{ __('catering.menu1') }}
                        </button>
                        <button class="nav-link {{ isset($session['menu']) && $session['menu']==2 ? 'active' : '' }}"
                                id="nav-profile-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-menu-two" type="button" role="tab" aria-controls="nav-menu-two"
                                aria-selected="false" value="nav-menu-two">
                            {{ __('catering.menu2') }}
                        </button>
                        <button class="nav-link {{ isset($session['menu']) && $session['menu']==3 ? 'active' : '' }}"
                                id="nav-contact-tabs" data-bs-toggle="tab"
                                data-bs-target="#nav-menu-three" type="button" role="tab" aria-controls="nav-menu-three"
                                aria-selected="false" value="nav-menu-three">
                            {{ __('catering.menu3') }}
                        </button>
                        <button
                            class="nav-link {{ !isset($session['menu']) || (isset($session['menu']) && $session['menu']==4) ? 'active' : '' }}"
                            id="nav-contact-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-menu-four" type="button" role="tab" aria-controls="nav-menu-four"
                            aria-selected="false" value="nav-menu-four">
                            {{ __('catering.menu4') }}
                        </button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade {{ isset($session['menu']) && $session['menu']==1 ? 'show active' : '' }}"
                         id="nav-menu-one" role="tabpanel"
                         aria-labelledby="nav-menu-one">
                        <div class="row">
                            <div class="col-md-8 col-9">
                                <div class="bn-menu-header">
                                    {{ __('catering.main_dishes') }}
                                </div>
                                <div id="bn-check-last-order1">
                                    <div class="bn-radio-order">
                                        <select class="form-select" aria-label="Default select example"
                                                name="menu_items[1][1]">
                                            <optgroup label="VEG. & VEGAN">
                                                @foreach($vegs as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][1][1] ?? config('catering.menu1.default1')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="CURRIES">
                                                @foreach($curries as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][1][1] ?? config('catering.menu1.default1')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="bn-radio-order">
                                        <select class="form-select" aria-label="Default select example"
                                                name="menu_items[1][2]">
                                            <optgroup label="VEG. & VEGAN">
                                                @foreach($vegs as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][1][2] ?? config('catering.menu1.default2')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="CURRIES">
                                                @foreach($curries as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][1][2] ?? config('catering.menu1.default2')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="bn-radio-order">
                                        <select class="form-select" aria-label="Default select example"
                                                name="menu_items[1][3]">
                                            <optgroup label="VEG. & VEGAN">
                                                @foreach($vegs as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][1][3] ?? config('catering.menu1.default3')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="CURRIES">
                                                @foreach($curries as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][1][3] ?? config('catering.menu1.default3')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="bn-radio-order">
                                        <select class="form-select" aria-label="Default select example"
                                                name="menu_items[1][4]">
                                            <optgroup label="VEG. & VEGAN">
                                                @foreach($vegs as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][1][4] ?? config('catering.menu1.default4')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="CURRIES">
                                                @foreach($curries as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][1][4] ?? config('catering.menu1.default4')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 d-md-block d-none"></div>
                            <div class="col-md-2 col-3">
                                <div class="bn-right-menu-bar bn-light-black-color">
                                    <div class="bn-menu-header">
                                        {{ __('catering.drinks') }}
                                    </div>
                                    <span>
                                    Mango Lassi
                                </span>
                                </div>
                                <div class="bn-right-menu-bar bn-light-black-color">
                                    <div class="bn-menu-header">
                                        {{ __('catering.starters') }}
                                    </div>
                                    <span>
                                    Tandoori Chicken
                                </span>
                                </div>
                                <div class="bn-right-menu-bar bn-light-black-color">
                                    <div class="bn-menu-header">
                                        {{ __('catering.appetizers') }}
                                    </div>
                                    <span>
                                   Papadums
                                </span>
                                    <span>Chutneys</span>
                                </div>
                                <div class="bn-right-menu-bar">
                                    <div class="bn-menu-header">
                                        {{ __('catering.sides') }}
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
                        <div class="row pt-0">
                            <div class="col-md-8 col-9">
                                <div class="bn-number-people">
                                    <input type="number"
                                           value="{{ $session['persons'] ?? config('catering.min_people') }}"
                                           id="persons1"
                                           min="{{ config('catering.min_people') }}">
                                    <span>{{ __('catering.people') }}</span>
                                </div>
                            </div>
                            <div class="col-md-2 d-md-block d-none"></div>
                            <div class="col-md-2 col-3">
                                <div class="bn-number-price">
                                    <h3>{{ config('catering.menu1.price') }},-</h3>
                                    <span>{{ __('catering.per_person') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="bn-button-menu">
                            <button type="button" class="btn continueBtn" data-menu="1">
                                {{ __('global.continue') }}
                            </button>
                        </div>
                    </div>
                    <div class="tab-pane fade {{ isset($session['menu']) && $session['menu']==2 ? 'show active' : '' }}"
                         id="nav-menu-two" role="tabpanel" aria-labelledby="nav-menu-two">
                        <div class="row">
                            <div class="col-md-8 col-9">
                                <div class="bn-menu-header">
                                    {{ __('catering.main_dishes') }}
                                </div>
                                <div id="bn-check-last-order2">
                                    <div class="bn-radio-order">
                                        <select class="form-select" aria-label="Default select example"
                                                name="menu_items[2][1]">
                                            <optgroup label="VEG. & VEGAN">
                                                @foreach($vegs as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][2][1] ?? config('catering.menu2.default1')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="CURRIES">
                                                @foreach($curries as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][2][1] ?? config('catering.menu2.default1')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="bn-radio-order">
                                        <select class="form-select" aria-label="Default select example"
                                                name="menu_items[2][2]">
                                            <optgroup label="VEG. & VEGAN">
                                                @foreach($vegs as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][2][2] ?? config('catering.menu2.default2')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="CURRIES">
                                                @foreach($curries as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][2][2] ?? config('catering.menu2.default2')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="bn-radio-order">
                                        <select class="form-select" aria-label="Default select example"
                                                name="menu_items[2][3]">
                                            <optgroup label="VEG. & VEGAN">
                                                @foreach($vegs as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][2][3] ?? config('catering.menu2.default3')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="CURRIES">
                                                @foreach($curries as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][2][3] ?? config('catering.menu2.default3')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="bn-radio-order">
                                        <select class="form-select" aria-label="Default select example"
                                                name="menu_items[2][4]">
                                            <optgroup label="VEG. & VEGAN">
                                                @foreach($vegs as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][2][4] ?? config('catering.menu2.default4')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="CURRIES">
                                                @foreach($curries as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][2][4] ?? config('catering.menu2.default4')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 d-md-block d-none"></div>
                            <div class="col-md-2 col-3">
                                <div class="bn-right-menu-bar bn-light-black-color">
                                    <div class="bn-menu-header">
                                        {{ __('catering.drinks') }}
                                    </div>
                                    <span>
                                    Mango Lassi
                                </span>
                                </div>
                                <div class="bn-right-menu-bar bn-light-black-color">
                                    <div class="bn-menu-header">
                                        {{ __('catering.starters') }}
                                    </div>
                                    <span>
                                    Tandoori Chicken
                                </span>
                                </div>
                                <div class="bn-right-menu-bar">
                                    <div class="bn-menu-header">
                                        {{ __('catering.appetizers') }}
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
                        <div class="row pt-0">
                            <div class="col-md-8 col-9">
                                <div class="bn-number-people">
                                    <input type="number"
                                           value="{{ $session['persons'] ?? config('catering.min_people') }}"
                                           id="persons2"
                                           min="{{ config('catering.min_people') }}">
                                    <span>{{ __('catering.people') }}</span>
                                </div>
                            </div>
                            <div class="col-md-2 d-md-block d-none"></div>
                            <div class="col-md-2 col-3">
                                <div class="bn-number-price">
                                    <h3>{{ config('catering.menu2.price') }},-</h3>
                                    <span>{{ __('catering.per_person') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="bn-button-menu">
                            <button type="button" class="btn continueBtn" data-menu="2">
                                {{ __('global.continue') }}
                            </button>
                        </div>
                    </div>
                    <div class="tab-pane fade {{ isset($session['menu']) && $session['menu']==3 ? 'show active' : '' }}"
                         id="nav-menu-three" role="tabpanel" aria-labelledby="nav-menu-three">
                        <div class="row">
                            <div class="col-md-8 col-9">
                                <div class="bn-menu-header">
                                    {{ __('catering.main_dishes') }}
                                </div>
                                <div id="bn-check-last-order3">
                                    <div class="bn-radio-order">
                                        <select class="form-select" aria-label="Default select example"
                                                name="menu_items[3][1]">
                                            <optgroup label="VEG. & VEGAN">
                                                @foreach($vegs as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][3][1] ?? config('catering.menu3.default1')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="CURRIES">
                                                @foreach($curries as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][3][1] ?? config('catering.menu3.default1')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="bn-radio-order">
                                        <select class="form-select" aria-label="Default select example"
                                                name="menu_items[3][2]">
                                            <optgroup label="VEG. & VEGAN">
                                                @foreach($vegs as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][3][2] ?? config('catering.menu3.default2')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="CURRIES">
                                                @foreach($curries as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][3][2] ?? config('catering.menu3.default2')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="bn-radio-order">
                                        <select class="form-select" aria-label="Default select example"
                                                name="menu_items[3][3]">
                                            <optgroup label="VEG. & VEGAN">
                                                @foreach($vegs as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][3][3] ?? config('catering.menu3.default3')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="CURRIES">
                                                @foreach($curries as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][3][3] ?? config('catering.menu3.default3')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="bn-radio-order">
                                        <select class="form-select" aria-label="Default select example"
                                                name="menu_items[3][4]">
                                            <optgroup label="VEG. & VEGAN">
                                                @foreach($vegs as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][3][4] ?? config('catering.menu3.default4')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="CURRIES">
                                                @foreach($curries as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][3][4] ?? config('catering.menu3.default4')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 d-md-block d-none"></div>
                            <div class="col-md-2 col-3">
                                <div class="bn-right-menu-bar bn-light-black-color">
                                    <div class="bn-menu-header">
                                        {{ __('catering.drinks') }}
                                    </div>
                                    <span>
                                    Mango Lassi
                                </span>
                                </div>
                                <div class="bn-right-menu-bar">
                                    <div class="bn-menu-header">
                                        {{ __('catering.starters') }}
                                    </div>
                                    <span>
                                    Tandoori Chicken
                                </span>
                                </div>
                                <div class="bn-right-menu-bar">
                                    <div class="bn-menu-header">
                                        {{ __('catering.appetizers') }}
                                    </div>
                                    <span>
                                   Papadums
                                </span>
                                    <span>Chutneys</span>
                                </div>
                                <div class="bn-right-menu-bar">
                                    <div class="bn-menu-header">
                                        {{ __('catering.sides') }}
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
                        <div class="row pt-0">
                            <div class="col-md-8 col-9">
                                <div class="bn-number-people">
                                    <input type="number"
                                           value="{{ $session['persons'] ?? config('catering.min_people') }}"
                                           id="persons3"
                                           min="{{ config('catering.min_people') }}">
                                    <span>{{ __('catering.people') }}</span>
                                </div>
                            </div>
                            <div class="col-md-2 d-md-block d-none"></div>
                            <div class="col-md-2 col-3">
                                <div class="bn-number-price">
                                    <h3>{{ config('catering.menu3.price') }},-</h3>
                                    <span>{{ __('catering.per_person') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="bn-button-menu">
                            <button type="button" class="btn continueBtn" data-menu="3">
                                {{ __('global.continue') }}
                            </button>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade {{ !isset($session['menu']) || (isset($session['menu']) && $session['menu']==4) ? 'show active' : '' }}"
                        id="nav-menu-four" role="tabpanel"
                        aria-labelledby="nav-menu-four">
                        <div class="row">
                            <div class="col-md-8 col-9">
                                <div class="bn-menu-header">
                                    {{ __('catering.main_dishes') }}
                                </div>
                                <div id="bn-check-last-order4">
                                    <div class="bn-radio-order">
                                        <select class="form-select" aria-label="Default select example"
                                                name="menu_items[4][1]">
                                            <optgroup label="VEG. & VEGAN">
                                                @foreach($vegs as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][4][1] ?? config('catering.menu4.default1')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="CURRIES">
                                                @foreach($curries as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][4][1] ?? config('catering.menu4.default1')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="bn-radio-order">
                                        <select class="form-select" aria-label="Default select example"
                                                name="menu_items[4][2]">
                                            <optgroup label="VEG. & VEGAN">
                                                @foreach($vegs as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][4][2] ?? config('catering.menu4.default2')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="CURRIES">
                                                @foreach($curries as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][4][2] ?? config('catering.menu4.default2')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="bn-radio-order">
                                        <select class="form-select" aria-label="Default select example"
                                                name="menu_items[4][3]">
                                            <optgroup label="VEG. & VEGAN">
                                                @foreach($vegs as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][4][3] ?? config('catering.menu4.default3')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="CURRIES">
                                                @foreach($curries as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][4][3] ?? config('catering.menu4.default3')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="bn-radio-order">
                                        <select class="form-select" aria-label="Default select example"
                                                name="menu_items[4][4]">
                                            <optgroup label="VEG. & VEGAN">
                                                @foreach($vegs as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][4][4] ?? config('catering.menu4.default4')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="CURRIES">
                                                @foreach($curries as $item)
                                                    <option value="{{ $item->code }}" {{ $item->code == ($session['menu_items'][4][4] ?? config('catering.menu4.default4')) ? 'selected': '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 d-md-block d-none"></div>
                            <div class="col-md-2 col-3">
                                <div class="bn-right-menu-bar">
                                    <div class="bn-menu-header">
                                        {{ __('catering.drinks') }}
                                    </div>
                                    <span>
                                    Mango Lassi
                                </span>
                                </div>
                                <div class="bn-right-menu-bar">
                                    <div class="bn-menu-header">
                                        {{ __('catering.starters') }}
                                    </div>
                                    <span>
                                    Tandoori Chicken
                                </span>
                                </div>
                                <div class="bn-right-menu-bar">
                                    <div class="bn-menu-header">
                                        {{ __('catering.appetizers') }}
                                    </div>
                                    <span>
                                   Papadums
                                </span>
                                    <span>Chutneys</span>
                                </div>
                                <div class="bn-right-menu-bar">
                                    <div class="bn-menu-header">
                                        {{ __('catering.sides') }}
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
                        <div class="row pt-0">
                            <div class="col-md-8 col-9">
                                <div class="bn-number-people">
                                    <input type="number"
                                           value="{{ $session['persons'] ?? config('catering.min_people') }}"
                                           id="persons4"
                                           min="{{ config('catering.min_people') }}">
                                    <span>{{ __('catering.people') }}</span>
                                </div>
                            </div>
                            <div class="col-md-2 d-md-block d-none"></div>
                            <div class="col-md-2 col-3">
                                <div class="bn-number-price">
                                    <h3>{{ config('catering.menu4.price') }},-</h3>
                                    <span>{{ __('catering.per_person') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="bn-button-menu">
                            <button type="button" class="btn continueBtn" data-menu="4">
                                {{ __('global.continue') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


@section('js')
    {!! js('form') !!}
    <script>
        $(function () {
            $(document)
                .on('submit', '#form1', function (e) {
                    e.preventDefault();
                })
                .on('click', '.continueBtn', function (e) {
                    e.preventDefault();

                    var Form = $('#form1');
                    var menu = $(this).attr('data-menu');
                    Form.find('[name=menu]').val(menu);
                    Form.find('[name=persons]').val($('#persons' + menu).val());

                    showLoader();
                    Form.ajaxSubmit({
                        error: function (e1, e2, e3) {
                            hideLoader();
                            alert(e3);
                        },
                        success: function (data) {
                            if (data.substr(0, 2) === 'OK') {
                                window.location.href = "{{ route('catering.drinks') }}";
                            } else {
                                hideLoader();
                                alert(data);
                            }
                        }
                    });
                })
        });
    </script>
@endsection
