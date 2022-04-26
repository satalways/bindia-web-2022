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
            <img src="{{ asset('asstes/image/dine-in/breadcrumbs-mobile.jpg') }}" class="" alt="">
        </div>
    </div>
    <!--End Main Banner-->

    <div class="bn-dine-menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bn-top-paragraph">
                        <h1>Thank you for your confirmation</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="bn-content-menu">
                        <p>

                        </p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-2 col-md-2 col-sm-2 col-12"></div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="bn-menu-b-box">
                        <ul class="list-unstyled">
                            <li><a class="" href="{{ route('amg') }}">Amagerbrogade</a></li>
                            <li><a class="" href="{{ route('bdv') }}">Blegdamsver(Trianglen)</a></li>
                            <li><a class="" href="{{ route('elm') }}">Elmegade</a></li>
                            <li><a class="" href="{{ route('gkv') }}">Gi. Kongevej</a></li>
                            <li><a class="" href="{{ route('lhg') }}">Lyngby Hovedgade</a></li>
                            <li><a class="" href="{{ route('shg') }}">Soborg Hovedgade</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
