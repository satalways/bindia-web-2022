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
        <img src="{{ asset('asstes/image/shop/gi-kongevej.jpg') }}"
             data-src="{{ asset('asstes/image/shop/gi-kongevej.jpg') }}" alt="" class="d-sm-block d-none lazy">
        <img src="{{ asset('asstes/image/shop/gi-kongevej-mobile.jpg') }}"
             data-src="{{ asset('asstes/image/shop/gi-kongevej-mobile.jpg') }}" alt="" class="d-sm-none d-block lazy">
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
                    {{--                    <div class="float-end">--}}
                    {{--                        <a href="https://www.findsmiley.dk/966201" target="_blank">--}}
                    {{--                            <img src="{{ asset('asstes/image/shop/smile.svg') }}" alt="" onclick="window.open('https://www.findsmiley.dk/966201')" style="cursor: pointer">--}}
                    {{--                        </a>--}}
                    {{--                        <img src="{{ asset('asstes/image/shop/map-holder.svg') }}" alt="" onclick="window.open('{{ shop('gkv')->map_link }}')" style="cursor: pointer">--}}
                    {{--                    </div>--}}
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="bn-shop-review-box">
        <div class="container">
            <a target="_blank" href="{{ shop('gkv')->smily_link }}"><img
                    src="{{ asset('asstes/image/shop/smile.svg') }}" alt=""></a>
            <img class="bn-line-width" src="{{ asset('asstes/image/shop/line-line.svg') }}" alt="">
            {{--            <div style="display: inline-block; margin-bottom: -50px;">--}}
            {{--                <div class="review-widget_net" data-uuid="c768ac37-3833-4b53-ad0a-7c3216da819f" data-template="10" data-filter="" data-lang="en" data-theme="light"><center><a href="https://www.review-widget.net/" target="_blank" rel="noopener"><img src="https://grwapi.net/assets/spinner/spin.svg" title="Google Review Widget" alt="Review Widget"></a></center></div><script async type="text/javascript" src="https://grwapi.net/widget.min.js"></script>--}}
            {{--            </div>--}}

            {!! makeGoogleReview(shop('gkv')->rating_link, 118, 4.0) !!}

            <img class="bn-line-width" src="{{ asset('asstes/image/shop/line-line.svg') }}" alt="">
            <div class="bn-text-shop">
                <a href="{{ shop('gkv')->inside_link }}" target="_blank">
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
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2249.700180093034!2d12.537342451905065!3d55.676813680437576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465253a2fd897c1b%3A0x63cddd56e03aa52e!2sBindia%20Indisk%20Mad%20Take%20Away%20Frederiksberg!5e0!3m2!1sen!2s!4v1642429292025!5m2!1sen!2s"
            width="100%" height="512" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <!--Shop Details box-->

    <div class="bn-details-box">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-12">
                    <div class="bn-details-content">
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
