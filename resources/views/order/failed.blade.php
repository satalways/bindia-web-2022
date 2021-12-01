@extends('layouts.app')
@section('content')
    <!--Main Breadcrumbs-->
    <div class="bn-breadcrumbs-take-away  d-sm-block">
        <div>
            <img src="{{ asset('asstes/image/take-away/mask-group-2.jpg') }}"
                 data-src="{{ asset('asstes/image/take-away/mask-group-2.png') }}" class="lazy" alt="">
        </div>
    </div>

    <div class="bn-details-box text-center" style="padding: 132px 0; padding-bottom: 268px">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h1>Order payment is failed</h1>
                    <p>
                        Sorry for inconvenience<br><br>
                        <a href="{{ route('contact') }}" class="btn bn-receipt-btn">Contact Us</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        a.btn.bn-receipt-btn {
            color: #fff;
            background: black;
            font-size: 16px;
            border-radius: 0;
            border: none;
        }
    </style>
@endsection
