@extends('layouts.app')

@section('content')
    <!--Shop Breadcrumbs-->
    <div class="bn-shops-banner">
        <img src="{{ asset('asstes/image/shop/soborg.jpg') }}" data-src="{{ asset('asstes/image/shop/soborg.png') }}" alt="" class="d-sm-block d-none lazy">
        <img src="{{ asset('asstes/image/shop/soborg-mobile.jpg') }}" data-src="{{ asset('asstes/image/shop/soborg-mobile.png') }}" alt="" class="d-sm-none d-block lazy">
        <div class="bn-shop-contact">
            <div class="bn-shop-title">
                <h3>{{ __('global.takeaway') }} & {{ __('global.dinein') }}</h3>
            </div>

            <div class="bn-shop-header">
                <h2>{!! shop('shg')->name !!}</h2>
                <p>{{ shop('shg')->address }}</p>
                <p><a href="tel:{{ shop('shg')->phone }}">{{ shop('shg')->phone }}</a></p>
                <p>{{ __('global.mon_sun') }}: 16.00 - 21.00</p>
                <br>
                <div class="bn-shop-footer-address">
                    <div class="float-start">
                        <small><strong>{{ __('global.closed') }}</strong> {{ __('global.closing_dates') }}.</small>
                        <small><strong>{{ __('shop.all') }}</strong> {{ __('shop.other_days') }}</small>
                    </div>
                    <div class="float-end">
{{--                        <a href="https://www.findsmiley.dk/947692" target="_blank">--}}
                            <img src="{{ asset('asstes/image/shop/smile.svg') }}" alt="" onclick="window.open('https://www.findsmiley.dk/947692')" style="cursor: pointer">
{{--                        </a>--}}
                        <img src="{{ asset('asstes/image/shop/map-holder.svg') }}" alt="" onclick="window.open('{{ shop('shg')->map_link }}')" style="cursor: pointer">
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

    <!--Shop Maps-->
    <div class="bn-map-shop">
{{--        <img src="{{ asset('asstes/image/shop/map-shop.jpg') }}" data-src="{{ asset('asstes/image/shop/map-shop.png') }}" alt="" class="d-sm-block d-none lazy">--}}
{{--        <img src="{{ asset('asstes/image/shop/map-shop-mobile.jpg') }}" data-src="{{ asset('asstes/image/shop/map-shop-mobile.png') }}" alt="" class="d-sm-none d-block lazy">--}}
{{--        <div class="bn-map-location d-sm-block d-none">--}}
{{--            <img src="{{ asset('asstes/image/shop/location-holder.svg') }}" alt="">--}}
{{--        </div>--}}
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2246.4914737282775!2d12.514392351906666!3d55.73258918045262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465253085ee9eaed%3A0xfb8a56a28c883e1c!2sBindia%20Indisk%20Mad%20Take%20Away%20S%C3%B8borg!5e0!3m2!1sen!2s!4v1642429493056!5m2!1sen!2s" width="100%" height="512" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <!--Shop Details box-->

    <div class="bn-details-box">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-12">
                    <div class="bn-details-content">
                        <div class="text-center mb-5">
                            <a href="{{ route('takeaway') }}" class="btn btn-lg btn-dark">{{ __('global.order_now') }}</a>
                            <a href="{{ shop('shg')->rating_link }}" target="_blank" style="text-decoration: none">
                                <img src="{{ asset('images/google-review.png') }}" alt="" style="height: 50px; width: auto">
                            </a>
                            <a href="{{ shop('shg')->inside_link }}" target="_blank" class="btn btn-lg btn-danger">
                                Inside Our Shop
                            </a>
                        </div>

                        {!! __('shg.seo_text', [
                            'dine_link' => route('dinein'),
                            'inside_view_link' => shop('shg')->inside_link,
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
