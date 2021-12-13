@extends('layouts.app')

@section('content')
    <!--Shop Breadcrumbs-->
    <div class="bn-shops-banner">
        <img src="{{ asset('asstes/image/shop/lyngby.jpg') }}" data-src="{{ asset('asstes/image/shop/lyngby.png') }}" alt="" class="d-sm-block d-none lazy">
        <img src="{{ asset('asstes/image/shop/lyngby-mobile.jpg') }}" data-src="{{ asset('asstes/image/shop/lyngby-mobile.png') }}" alt="" class="d-sm-none d-block lazy">
        <div class="bn-shop-contact">
            <div class="bn-shop-title">
                <h3>{{ __('global.takeaway') }}</h3>
            </div>

            <div class="bn-shop-header">
                <h2>{{ shop('lhg')->name }}</h2>
                <p>{{ shop('lhg')->address }}</p>
                <p><a href="tel:{{ shop('lhg')->phone }}">{{ shop('lhg')->phone }}</a></p>
                <p>{{ __('global.mon_sun') }}: 16.00 - 21.00</p>
                <br>
                <div class="bn-shop-footer-address">
                    <div class="float-start">
                        <small><strong>{{ __('global.closed') }}</strong> {{ __('global.closing_dates') }}.</small>
                        <small><strong>{{ __('shop.all') }}</strong> {{ __('shop.other_days') }}</small>
                    </div>
                    <div class="float-end">
{{--                        <a href="https://www.findsmiley.dk/504020" target="_blank">--}}
                            <img src="{{ asset('asstes/image/shop/smile.svg') }}" alt="" onclick="window.open('https://www.findsmiley.dk/504020')" style="cursor: pointer">
{{--                        </a>--}}
                        <img src="{{ asset('asstes/image/shop/map-holder.svg') }}" alt="" onclick="window.open('{{ shop('lhg')->map_link }}')" style="cursor: pointer">
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

    <!--Shop Maps-->
    <div class="bn-map-shop">
        <img src="{{ asset('asstes/image/shop/map-shop.jpg') }}" data-src="{{ asset('asstes/image/shop/map-shop.png') }}" alt="" class="d-sm-block d-none lazy">
        <img src="{{ asset('asstes/image/shop/map-shop-mobile.jpg') }}" data-src="{{ asset('asstes/image/shop/map-shop-mobile.png') }}" alt="" class="d-sm-none d-block lazy">
        <div class="bn-map-location d-sm-block d-none">
            <img src="{{ asset('asstes/image/shop/location-holder.svg') }}" alt="">
        </div>
    </div>

    <!--Shop Details box-->

    <div class="bn-details-box">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-12">
                    <div class="bn-details-content">
                        <h2>{{ shop('lhg')->long_name }}</h2>
                        <p>{{ __('lhg.shop_description_1') }}</p>
                        <p>
                            {{ __('lhg.shop_description_2') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
