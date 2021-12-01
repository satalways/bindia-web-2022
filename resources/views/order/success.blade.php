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
                    <h1>Thank you for your order</h1>
                    <a target="_blank" class="btn btn-lg bn-receipt-btn" href="{{ $order->pdfLink() }}">View Receipt</a>

                    {{--                    Your order is completed! Your invoice has been sent to your email address.--}}
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
