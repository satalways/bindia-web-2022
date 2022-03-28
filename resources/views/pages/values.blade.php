@extends('layouts.app')

@section('styles')
    @if (!isMobile())
        <style>
            .bn-image-content-values .row .bn-content-text-header p a {
                font-size: 22px !important;
            }
        </style>
    @endif
@endsection

@section('content')
    <!--Main Breadcrumbs-->
    <div class="bn-breadcrumb-our-values bn-main-story">
        <img src="{{ asset('asstes/image/our-values/our-values-banner.jpg') }}"
             data-src="{{ asset('asstes/image/our-values/our-values-banner.png') }}" alt=""
             class="d-sm-block d-none lazy">
        <img src="{{ asset('asstes/image/our-values/our-vaues-mobile-banner.jpg') }}"
             data-src="{{ asset('asstes/image/our-values/our-vaues-mobile-banner.png') }}" alt=""
             class="d-sm-none d-block lazy">
    </div>
    <!--Main end Breadcrumbs-->
    <!-- Profile box-->
    <div class="bn-profile-values bn-main-story">
        <div class="container">
            <div class="bn-profile-item">
                <img src="{{ asset('asstes/image/our-values/porfile-image.jpg') }}"
                     data-src="{{ asset('asstes/image/our-values/porfile-image.png') }}" class="lazy" alt="">
                <h1>{{ __('values.heading') }}
                    <br>
                    <small
                        style="font-size: 25px !important; font-weight: normal !important;">{{ __('values.heading_sub') }}</small>
                </h1>
            </div>
        </div>
    </div>
    <!-- End Profile box-->
    <!-- Values content box-->
    <div class="bn-values-content bn-main-story">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-6">
                    <div class="bn-values-text">
                        <h2>{{ __('values.good_long_life') }}</h2>
                        <p>
                            {!! __('values.good_long_life_description_1') !!}
                        </p>
                        <p>
                            {!! __('values.good_long_life_description_2') !!}
                        </p>
                        <p>
                            {!! __('values.good_long_life_description_3') !!}
                        </p>
                    </div>
                </div>
                <div class="col-md-2 d-sm-block d-none"></div>
                <div class="col-md-5 col-6">
                    <div class="bn-values-text">
                        <h2>{{ __('values.harvested_consumed') }}</h2>
                        <p>
                            {!! __('values.harvested_consumed_description_1') !!}
                        </p>
                        <p>
                            {!! __('values.harvested_consumed_description_2') !!}
                        </p>
                        <p>
                            {!! __('values.harvested_consumed_description_3') !!}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Values text box-->
    <div class="bn-text-item-box bn-main-story">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-9">
                    <div class="bn-text-box text-center">
                        <h2>
                            {!! __('values.harvested_consumed_description_4') !!}
                        </h2>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
    <!-- image value text box-->
    <div class="bn-image-content-values bn-main-story">
        <div class="container">
            <div class="row align-middle">
                <div class="col-5 position-relative text-center">
                    <img class="bn-image-v1 position-absolute top-50 start-50 translate-middle"
                         src="{{ asset('asstes/image/our-values/binda-logo.svg') }}" alt="">
                </div>
                <div class="col-md-1 d-sm-block d-none"></div>
                <div class="col-md-5 col-6">
                    <div class="bn-content-text-header">
                        <h2>{{ __('values.organic') }}</h2>
                        <p>
                            {!! __('values.organic_description_1') !!}
                        </p>
                        <p>
                            {!! __('values.organic_description_2') !!}
                        </p>
                        <p>
                            {!! __('values.organic_description_3') !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row align-middle">
                <div class="col-md-5 col-6">
                    <div class="bn-content-text-header">
                        <h2>{{ __('values.repackage') }}</h2>
                        <p>
                            {!! __('values.repackage_p1') !!}
                        </p>
                        <p>
                            {!! __('values.repackage_p2') !!}
                        </p>
                        <p>
                            {!! __('values.repackage_p3') !!}
                        </p>
                    </div>
                </div>
                <div class="col-md-1 d-sm-block d-none"></div>
                <div class="col-6 position-relative text-center">
                    <img class="bn-image-v2 position-absolute top-50 start-50 translate-middle lazy "
                         src="{{ asset('asstes/image/our-values/image-v2.jpg') }}"
                         data-src="{{ asset('asstes/image/our-values/image-v2.png') }}" alt="">
                </div>
            </div>
            <div class="row align-middle">
                <div class="col-5 position-relative text-center">
                    <img class="bn-image-v3 position-absolute top-50 start-50 translate-middle lazy"
                         src="{{ asset('asstes/image/our-values/image-v3.png') }}" alt="">
                </div>
                <div class="col-md-1 d-sm-block d-none"></div>
                <div class="col-md-5 col-6">
                    <div class="bn-content-text-header">
                        <h2>{{ __('values.plastic') }}</h2>
                        <p>
                            {!! __('values.plastic_description_1') !!}
                        </p>
                        <p>
                            {!! __('values.plastic_description_2') !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row align-middle">
                <div class="col-md-5 col-6">
                    <div class="bn-content-text-header">
                        <h2>{{ __('values.renewable_electricity') }}</h2>
                        <p>{!! __('values.R_E_description_1') !!}</p>
                        <p>{!! __('values.R_E_description_2') !!}</p>
                    </div>
                </div>
                <div class="col-md-1 d-sm-block d-none"></div>
                <div class="col-6 position-relative text-center">
                    <img class="bn-image-v4 position-absolute top-50 start-50 translate-middle"
                         src="{{ asset('asstes/image/our-values/image-v4.png') }}" alt="">
                </div>
            </div>
            <div class="row align-middle">
                <div class="col-5 position-relative text-center">
                    <img class="bn-image-v5 position-absolute top-50 start-50 translate-middle"
                         src="{{ asset('asstes/image/our-values/image-v5.svg') }}" alt="">
                </div>
                <div class="col-md-1 d-sm-block d-none"></div>
                <div class="col-md-5 col-6">
                    <div class="bn-content-text-header">
                        <h2>{{ __('values.too_good_to_go') }}</h2>
                        <p>{!! __('values.too_good_description_1') !!}</p>
                        <p>{{ __('values.too_good_description_2') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
