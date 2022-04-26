@extends('layouts.app')

@section('content')
    <!--Main Breadcrumbs-->
    <div class="bn-breadcrumbs-dine">
        <div class="container">
            <div class="d-none d-sm-block">
                <img src="{{ asset('asstes/image/dine-in/breadcumbs-banner.jpg') }}" alt="" class="">
            </div>
        </div>
        <div class="d-block d-sm-none pt-5">
            <img src="{{ asset('asstes/image/dine-in/breadcrumbs-mobile.jpg') }}" alt="" class="">
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
                {!! __('dinein.text', [
                    'amg_inside_link' => shop('amg')->inside_link,
                    'amg_name' => shop('amg')->name,
                    'gkv_inside_link' => shop('gkv')->inside_link,
                    'gkv_name' => shop('gkv')->name,
                    'lhg_inside_link' => shop('lhg')->inside_link,
                    'lhg_name' => shop('lhg')->name,
                    'elm_inside_link' => shop('elm')->inside_link,
                    'elm_name' => shop('elm')->name,
                    'shg_inside_link' => shop('shg')->inside_link,
                    'shg_name' => shop('shg')->name,
                    'bdv_inside_link' => shop('bdv')->inside_link,
                    'bdv_name' => shop('bdv')->name,

                    'takeaway_link' => route('takeaway')
                ]) !!}

            </div>
        </div>
    </div>
@endsection
