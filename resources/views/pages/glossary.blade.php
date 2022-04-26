@extends('layouts.app')

@section('content')
    <!--Main Breadcrumbs-->
    <div class="bn-breadcrumb-glossary bn-main-story">
        <img src="{{ asset('asstes/image/glossary/glossary-banner.jpg') }}" alt="" class="d-sm-block d-none">
        <img src="{{ asset('asstes/image/glossary/glossary-banner-mobile.jpg') }}" alt="" class="d-sm-none d-block">
    </div>
    <!--Main end Breadcrumbs-->
    <div class="bn-glossary-content bn-main-story position-relative">
        <div class="container">
            <div class="bn-glossary-header">
                <h1>{{ __('glossary.h1') }}</h1>
            </div>
            <div class="row">
                <div class="col-lg-1 d-lg-block d-none"></div>
                <div class="col-lg-2 col-3">
                    <div class="bn-glossary-sub-header">
                        <h2>{{ __('glossary.biryani') }}</h2>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8 col-9">
                    <div class="bn-glossary-text">
                        <p>{{ __('glossary.biryani_description') }}<p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1 d-lg-block d-none"></div>
                <div class="col-lg-2 col-3">
                    <div class="bn-glossary-sub-header">
                        <h2>{{ __('glossary.chutney') }}</h2>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8 col-9">
                    <div class="bn-glossary-text">
                        <p>{{ __('glossary.chutney_description') }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1 d-lg-block d-none"></div>
                <div class="col-lg-2 col-3">
                    <div class="bn-glossary-sub-header">
                        <h2>{{ __('glossary.curry') }}</h2>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8 col-9">
                    <div class="bn-glossary-text">
                        <p>{{ __('glossary.curry_description') }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1 d-lg-block d-none"></div>
                <div class="col-lg-2 col-3">
                    <div class="bn-glossary-sub-header">
                        <h2>{{ __('glossary.jeera') }}</h2>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8 col-9">
                    <div class="bn-glossary-text">
                        <p>{{ __('glossary.jeera_description') }}<p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1 d-lg-block d-none"></div>
                <div class="col-lg-2 col-3">
                    <div class="bn-glossary-sub-header">
                        <h2>{{ __('glossary.madras') }}</h2>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8 col-9">
                    <div class="bn-glossary-text">
                        <p>{{ __('glossary.madras_description') }}<p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1 d-lg-block d-none"></div>
                <div class="col-lg-2 col-3">
                    <div class="bn-glossary-sub-header">
                        <h2>{{ __('glossary.masala') }}</h2>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8 col-9">
                    <div class="bn-glossary-text">
                        <p>{{ __('glossary.masala_description') }}<p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1 d-lg-block d-none"></div>
                <div class="col-lg-2 col-3">
                    <div class="bn-glossary-sub-header">
                        <h2>{{ __('glossary.methi') }}</h2>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8 col-9">
                    <div class="bn-glossary-text">
                        <p>{{ __('glossary.methi_description') }}<p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1 d-lg-block d-none"></div>
                <div class="col-lg-2 col-3">
                    <div class="bn-glossary-sub-header">
                        <h2>{{ __('glossary.paneer') }}</h2>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8 col-9">
                    <div class="bn-glossary-text">
                        <p>{{ __('glossary.paneer_description') }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1 d-lg-block d-none"></div>
                <div class="col-lg-2 col-3">
                    <div class="bn-glossary-sub-header">
                        <h2>{{ __('glossary.tandoor') }}</h2>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8 col-9">
                    <div class="bn-glossary-text">
                        <p>{{ __('glossary.tandoor_description') }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1 d-lg-block d-none"></div>
                <div class="col-lg-2 col-3">
                    <div class="bn-glossary-sub-header">
                        <h2>{{ __('glossary.tandoori') }}</h2>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8 col-9">
                    <div class="bn-glossary-text">
                        <p>{{ __('glossary.tandoori_description') }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1 d-lg-block d-none"></div>
                <div class="col-lg-2 col-3">
                    <div class="bn-glossary-sub-header">
                        <h2>{{ __('glossary.tikka') }}</h2>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8 col-9">
                    <div class="bn-glossary-text">
                        <p>{{ __('glossary.tikka_description') }}<p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
