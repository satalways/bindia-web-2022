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
                        <h1>Coming soon...</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="bn-content-menu">
                        <p>
                            Our team is working on this page, it will be available soon.
                        </p>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"></div>
            </div>
        </div>

    </div>
@endsection
