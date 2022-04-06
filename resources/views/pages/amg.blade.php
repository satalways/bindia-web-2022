@extends('layouts.app')

@section('styles')
    <style>
        .grw-net-widget-four {
            border: none !important;
        }
    </style>
@endsection


@section('content')
    <!--Shop Breadcrumbs-->
    <div class="bn-shops-banner">
        <img src="{{ asset('asstes/image/shop/amagerbrogade.jpg') }}"
             data-src="{{ asset('asstes/image/shop/amagerbrogade.png') }}" alt="" class="d-sm-block d-none lazy">
        <img src="{{ asset('asstes/image/shop/amagerborgade-mobile.jpg') }}"
             data-src="{{ asset('asstes/image/shop/amagerborgade-mobile.png') }}" alt="" class="d-sm-none d-block lazy">
        <div class="bn-shop-contact">
            <div class="bn-shop-title">
                <h3>{{ __('global.takeaway') }} & {{ __('global.dinein') }}</h3>
            </div>
            <div class="bn-shop-header">
                <h2>{{ shop('amg')->name }}</h2>
                <p>{{ shop('amg')->address }}</p>
                <p><a href="tel:{{ shop('amg')->phone }}">{{ shop('amg')->phone }}</a></p>
                <p>{{ __('global.mon_sun') }}: 16.00 - 21.00</p>
                <br>
                <div class="bn-shop-footer-address">
                    <div class="float-start">
                        <small><strong>{{ __('global.closed') }}</strong> {{ __('global.closing_dates') }}.</small>
                        <small><strong>{{ __('shop.all') }}</strong> {{ __('shop.other_days') }}</small>
                    </div>
{{--                    <div class="float-end">--}}
{{--                        --}}{{--                        <a href="https://www.findsmiley.dk/903529" target="_blank">--}}
{{--                        <img src="{{ asset('asstes/image/shop/smile.svg') }}" alt=""--}}
{{--                             onclick="window.open('https://www.findsmiley.dk/903529')" style="cursor: pointer">--}}
{{--                        --}}{{--                        </a>--}}
{{--                        <img src="{{ asset('asstes/image/shop/map-holder.svg') }}" alt=""--}}
{{--                             onclick="window.open('{{ shop('amg')->map_link }}')" style="cursor: pointer">--}}
{{--                    </div>--}}
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="bn-shop-review-box">
        <div class="container">
            <a target="_blank" href="{{ shop('amg')->smily_link }}"><img src="{{ asset('asstes/image/shop/smile.svg') }}" alt=""></a>
            <img class="bn-line-width" src="{{ asset('asstes/image/shop/line-line.svg') }}" alt="">
            <div style="display: inline-block; margin-bottom: -50px;">
                <div class="review-widget_net" data-uuid="c768ac37-3833-4b53-ad0a-7c3216da819f" data-template="10" data-filter="" data-lang="en" data-theme="light"><center><a href="https://www.review-widget.net/" target="_blank" rel="noopener"><img src="https://grwapi.net/assets/spinner/spin.svg" title="Google Review Widget" alt="Review Widget"></a></center></div><script async type="text/javascript" src="https://grwapi.net/widget.min.js"></script>
            </div>
            <img class="bn-line-width" src="{{ asset('asstes/image/shop/line-line.svg') }}" alt="">
            <div class="bn-text-shop">
                <a href="{{ shop('amg')->inside_link }}" target="_blank">
                    Look inside
                </a>
            </div>
            <a href="{{ route('takeaway') }}" class="btn bg-dark btn-lg bn-image-button text-white">
                {{ __('global.order_now') }}
            </a>
        </div>
    </div>

    <!--Shop Maps-->
    <div class="bn-map-shop">
{{--        <img src="{{ asset('asstes/image/shop/map-shop.jpg') }}"--}}
{{--             data-src="{{ asset('asstes/image/shop/map-shop.png') }}" alt="" class="d-sm-block d-none lazy">--}}
{{--        <img src="{{ asset('asstes/image/shop/map-shop-mobile.jpg') }}"--}}
{{--             data-src="{{ asset('asstes/image/shop/map-shop-mobile.png') }}" alt="" class="d-sm-none d-block lazy">--}}
{{--        <div class="bn-map-location d-sm-block d-none">--}}
{{--            <img src="{{ asset('asstes/image/shop/location-holder.svg') }}" alt="">--}}
{{--        </div>--}}
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2250.874681661505!2d12.606907051904416!3d55.65638858043207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465253f94e06b5d3%3A0x25d44c203fa7e60c!2sBindia%20Indisk%20Mad%20Take%20Away%20Amager!5e0!3m2!1sen!2s!4v1642425693253!5m2!1sen!2s" width="100%" height="512" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <!--Shop Details box-->

    <div class="bn-details-box" style="padding-top: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-12">
                    <div class="bn-details-content">
{{--                        <div class="text-center mb-5">--}}
{{--                            <a href="{{ shop('amg')->rating_link }}" target="_blank" style="text-decoration: none">--}}
{{--                                <img src="{{ asset('images/google-review.png') }}" alt="" style="height: 50px; width: auto">--}}
{{--                            </a>--}}
{{--                        </div>--}}

                        {!! __('amg.seo_text', [
                            'dine_link' => route('dinein'),
                            'inside_view_link' => shop('amg')->inside_link,
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
