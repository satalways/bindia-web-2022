@extends('layouts.app')

@section('content')
    <!--Main Breadcrumbs-->
    <div class="bn-breadcrumbs-dine">
        <div class="container">
            <div class="d-none d-sm-block">
                <img src="{{ asset('asstes/image/dine-in/breadcumbs-banner.jpg') }}"
                     data-src="{{ asset('asstes/image/dine-in/breadcumbs-banner.png') }}" alt="" class="lazy">
            </div>
        </div>
        <div class="d-block d-sm-none pt-5">
            <img src="{{ asset('asstes/image/dine-in/breadcrumbs-mobile.jpg') }}"
                 data-src="{{ asset('asstes/image/dine-in/breadcrumbs-mobile.png') }}" alt="" class="lazy">
        </div>
    </div>
    <!--End Main Banner-->

    <div class="bn-dine-menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bn-top-paragraph">
                        <p><span>Dine-In</span> {{ __('dinein.same_price') }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="bn-content-menu">
                        <p>
                            {{ __('dinein.para_1') }}
                        </p>
                        <p>
                            {{ __('dinein.para_2') }}
                        </p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-2 col-md-2 col-sm-2 col-12"></div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="bn-menu-b-box">
                        <ul class="list-unstyled">
                            @foreach(config('shops') as $shop => $arr)
                                <li><a target="_blank" class=""
                                       href="{{ shop($shop)->map_link }}">{{ $arr['long_name'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="bn-content-menu">
                        <p>
                            {{ __('dinein.para_3') }}
                        </p>
                    </div>
                    <div class="bn-menu-list">
                        {{ __( 'dinein.see_menu') }} <a href="{{ route('takeaway') }}">{{ __('global.here') }}</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
