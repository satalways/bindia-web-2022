@extends('layouts.app')

@section('content')
    <!--Main Breadcrumbs-->
    <div class="bn-breadcrumbs-dine">
        <div class="container">
            <div class="d-none d-sm-block">
                <img src="{{ asset('asstes/image/item2.png') }}"
                     data-src="{{ asset('asstes/image/catering-menu/nav-menu-four.jpg') }}" class="lazy" alt="">
            </div>
        </div>
        <div class="d-block d-sm-none pt-5">
            <img src="{{ asset('asstes/image/dine-in/breadcrumbs-mobile.jpg') }}" class="" alt="">
        </div>
    </div>
    <!--End Main Banner-->

    <div class="bn-dine-menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bn-top-paragraph">
                        <h1>{{ __('global.coming_soon') }}...</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="bn-content-menu">
                        {!! __('global.coming_soon_gc_text') !!}
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"></div>
            </div>
        </div>

    </div>
@endsection
