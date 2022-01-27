@extends('layouts.app')

@section('content')
    <!--Shop Breadcrumbs-->
    <div class="bn-shops-banner">
        <img src="{{ asset('asstes/image/shop/gi-kongevej.jpg') }}" data-src="{{ asset('asstes/image/shop/gi-kongevej.png') }}" alt="" class="d-sm-block d-none lazy">
        <img src="{{ asset('asstes/image/shop/gi-kongevej-mobile.jpg') }}" data-src="{{ asset('asstes/image/shop/gi-kongevej-mobile.png') }}" alt="" class="d-sm-none d-block lazy">
        <div class="bn-shop-contact">
            <div class="bn-shop-title">
                <h3>{{ __('global.takeaway') }} & {{ __('global.dinein') }}</h3>
            </div>

            <div class="bn-shop-header">
                <h2>{{ shop('gkv')->name }}</h2>
                <p>{{ shop('gkv')->address }}</p>
                <p><a href="tel:{{ shop('gkv')->phone }}">{{ shop('gkv')->phone }}</a></p>
                <p>{{ __('global.mon_sun') }}: 16.00 - 21.00</p>
                <br>
                <div class="bn-shop-footer-address">
                    <div class="float-start">
                        <small><strong>{{ __('global.closed') }}</strong> {{ __('global.closing_dates') }}.</small>
                        <small><strong>{{ __('shop.all') }}</strong> {{ __('shop.other_days') }}</small>
                    </div>
                    <div class="float-end">
{{--                        <a href="https://www.findsmiley.dk/966201" target="_blank">--}}
                            <img src="{{ asset('asstes/image/shop/smile.svg') }}" alt="" onclick="window.open('https://www.findsmiley.dk/966201')" style="cursor: pointer">
{{--                        </a>--}}
                        <img src="{{ asset('asstes/image/shop/map-holder.svg') }}" alt="" onclick="window.open('{{ shop('gkv')->map_link }}')" style="cursor: pointer">
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
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2249.700180093034!2d12.537342451905065!3d55.676813680437576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465253a2fd897c1b%3A0x63cddd56e03aa52e!2sBindia%20Indisk%20Mad%20Take%20Away%20Frederiksberg!5e0!3m2!1sen!2s!4v1642429292025!5m2!1sen!2s" width="100%" height="512" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <!--Shop Details box-->

    <div class="bn-details-box">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-12">
                    <div class="bn-details-content">
                        <div class="text-center mb-5">
                            <a href="{{ route('takeaway') }}" class="btn btn-lg btn-dark">{{ __('global.order_now') }}</a>
                            <a href="{{ shop('gkv')->rating_link }}" target="_blank" style="text-decoration: none">
                                <img src="{{ asset('images/google-review.png') }}" alt="" style="height: 50px; width: auto">
                            </a>
                            <a href="{{ shop('gkv')->inside_link }}" target="_blank" class="btn btn-lg btn-danger">
                                Inside Our Shop
                            </a>
                        </div>

                        {!! __('gkv.seo_text', [
                            'dine_link' => route('dinein'),
                            'inside_view_link' => shop('gkv')->inside_link,
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
