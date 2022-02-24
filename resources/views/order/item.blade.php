@extends('layouts.app')

@section('content')
    <style>
        .bn-dine-menu .bn-top-paragraph p {
            margin-bottom: 15px;
        }
    </style>
{{--    <div class="bn-breadcrumbs-dine">--}}
{{--        <div class="container">--}}
{{--            <div class="d-none d-sm-block">--}}
{{--                <img src="{{ $item->image }}"--}}
{{--                     data-src2="{{ asset('asstes/image/item2.png') }}" alt="" class="lazy1">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="d-block d-sm-none pt-5">--}}
{{--            <img src="{{ $item->image }}"--}}
{{--                 data-src2="{{ asset('asstes/image/item2.png') }}" alt="" class="lazy1">--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="bn-dine-menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bn-top-paragraph">
                        <h1>
                            <small style="font-weight:bold; font-size: 62% !important; float: right"
                                   class="bn-price-item">
                                {{ $item->price }}
                                /
                                <span style="color: #F36A10; font-size: 28px">{{ $item->price_orange }}</span>
                            </small>
                            {{--                            <a style="text-decoration: none; font-weight: bold"--}}
                            {{--                               href="{{ route('item', ['slug' => $item->slug]) }}">{{ $item->name }}</a>--}}
                            <h1 class="bn-his-header">
                                {{ $title }}
                            </h1>
                        </h1>
                        <hr>
                        <img src="{{ $item->image }}"
                             data-src2="{{ asset('asstes/image/item2.png') }}" alt="" class="lazy1" style="width: 50%; float: right; margin-left: 10px;">

                        @if($content)
                            <h3>{{ $item->getDescription() }}</h3>
                            {!! $content !!}
                        @else
                            <p>
                                {{ $item->getDescription() }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
