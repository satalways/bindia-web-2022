@extends('layouts.app')

@section('content')
    <!--Shop Breadcrumbs-->
    <div class="bn-shops-banner">
        <img src="{{ asset('asstes/image/shop/triandlen.jpg') }}" data-src="{{ asset('asstes/image/shop/triandlen.jpg') }}" alt="" class="d-sm-block d-none lazy">
        <img src="{{ asset('asstes/image/shop/triandlen-mobile.jpg') }}" data-src="{{ asset('asstes/image/shop/triandlen-mobile.jpg') }}" alt="" class="d-sm-none d-block lazy">
        <div class="bn-shop-contact">
            <div class="bn-shop-title">
                <h3>{{ __('global.takeaway') }} & {{ __('global.dinein') }}</h3>
            </div>
            <div class="bn-shop-header">
                <h2>{{ shop('bdv')->name }}</h2>
                <p>{{ shop('bdv')->address }}</p>
                <p><a href="tel:{{ shop('bdv')->phone }}">{{ shop('bdv')->phone }}</a></p>
                <p>{{ __('global.mon_sun') }}: 16.00 - 21.00</p>
                <br>
                <div class="bn-shop-footer-address" style="margin-top: -18px">
                    <div class="float-start">
                        <small><strong>{{ __('global.closed') }}</strong> {{ __('global.closing_dates') }}.</small>
                        <small><strong>{{ __('shop.all') }}</strong> {{ __('shop.other_days') }}</small>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="bn-shop-review-box">
        <div class="container">
            <a target="_blank" href="{{ shop('bdv')->smily_link }}"><img src="{{ asset('asstes/image/shop/smile.svg') }}" alt=""></a>
            <img class="bn-line-width" src="{{ asset('asstes/image/shop/line-line.svg') }}" alt="">
            {!! makeGoogleReview(shop('bdv')->rating_link, 283, 4.2) !!}
            <img class="bn-line-width" src="{{ asset('asstes/image/shop/line-line.svg') }}" alt="">
            <div class="bn-text-shop">
                <a href="{{ shop('bdv')->inside_link }}" target="_blank">
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
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2248.4438403801414!2d12.573930251905699!3d55.69865648044342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465252fb7efe9a8f%3A0xc647f7a1bedbb34e!2sBindia%20Indisk%20Mad%20Take%20Away%20%C3%98sterbro!5e0!3m2!1sen!2s!4v1642429545599!5m2!1sen!2s" width="100%" height="512" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <!--Shop Details box-->

    <div class="bn-details-box">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-12">
                    <div class="bn-details-content">
                        {!! __('bdv.seo_text', [
                            'dine_link' => route('dinein'),
                            'inside_view_link' => shop('bdv')->inside_link,
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
