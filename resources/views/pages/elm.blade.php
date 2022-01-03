@extends('layouts.app')

@section('content')
    <!--Shop Breadcrumbs-->
    <div class="bn-shops-banner">
        <img src="{{ asset('asstes/image/shop/elmegade.jpg') }}" data-src="{{ asset('asstes/image/shop/elmegade.png') }}" alt="" class="d-sm-block d-none lazy">
        <img src="{{ asset('asstes/image/shop/elmegade-mobile.jpg') }}" data-src="{{ asset('asstes/image/shop/elmegade-mobile.png') }}" alt="" class="d-sm-none d-block lazy">
        <div class="bn-shop-contact">
            <div class="bn-shop-title">
                <h3>{{ __('global.takeaway') }}</h3>
            </div>

            <div class="bn-shop-header">
                <h2>{{ shop('elm')->name }}</h2>
                <p>{{ shop('elm')->address }}</p>
                <p><a href="tel:{{ shop('elm')->phone }}">{{ shop('elm')->phone }}</a></p>
                <p>{{ __('global.mon_sun') }}: 16.00 - 21.00</p>
                <br>
                <div class="bn-shop-footer-address">
                    <div class="float-start">
                        <small><strong>{{ __('global.closed') }}</strong> {{ __('global.closing_dates') }}.</small>
                        <small><strong>{{ __('shop.all') }}</strong> {{ __('shop.other_days') }}</small>
                    </div>
                    <div class="float-end">
{{--                        <a href="https://www.findsmiley.dk/966205" target="_blank">--}}
                            <img src="{{ asset('asstes/image/shop/smile.svg') }}" alt="" onclick="window.open('https://www.findsmiley.dk/966205')" style="cursor: pointer">
{{--                        </a>--}}
                        <img src="{{ asset('asstes/image/shop/map-holder.svg') }}" alt="" onclick="window.open('{{ shop('elm')->map_link }}')" style="cursor: pointer">
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
                        <div class="text-center mb-5">
                            <a href="{{ route('takeaway') }}" class="btn btn-lg btn-dark">Order Take Away</a>
                            <a href="{{ shop('elm')->rating_link }}" target="_blank" style="text-decoration: none">
                                <img src="{{ asset('images/google-review.png') }}" alt="" style="height: 50px; width: auto">
                            </a>
                            <a href="{{ shop('elm')->inside_link }}" target="_blank" class="btn btn-lg btn-danger">
                                Inside Our Shop
                            </a>
                        </div>

                        {!! __('elm.seo_text', [
                            'dine_link' => route('dinein'),
                            'inside_view_link' => shop('elm')->inside_link,
                            'reheat_link' => route('order.food.reheat.pdf'),
                            'takeaway_link' => route('takeaway'),
                            'value_link' => route('our_values')
                        ]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
