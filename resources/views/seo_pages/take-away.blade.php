@extends('layouts.app')

@section('content')
    <style>
        img.img {
            width: 150px;
            object-fit: cover;
        }
    </style>

    <!--Main Banner-->
    <div class="bn-slider bg-transparent bn-animation-banner">
        <div class="d-sm-block d-none bn-slider-ds-img">
            <img class="bn-image-index bn-image-desktop lazy" src="{{ asset('asstes/image/item2.png') }}"
                 data-src="{{ asset('asstes/image/slider-image.png') }}" alt="">
        </div>
        <div class="d-sm-none d-block bn-slider-ds-img">
            <img class="bn-image-index lazy" src="{{ asset('asstes/image/item2.png') }}"
                 data-src="{{asset('asstes/image/slider-mobile.png')}}" alt="">
        </div>
        <div class="bn-button-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="mt-4">
                            <a href="{{ route('takeaway') }}#bn-take-away-price" class="btn btn-dark">
                                Order Take Away
                            </a>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Main Banner-->

    <div class="bn-dine-menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bn-top-paragraph">
                        <h1>
                            <h1>{{ $heading }}</h1>
                        </h1>

                        <div class="text-center mb-5 mt-3">
                            <a href="{{ route('takeaway') }}#bn-take-away-price" class="btn btn-dark">
                                Order Take Away
                            </a>
                        </div>

                        <div class="row">
                            @foreach($items as $item)
                                <div class="col-md-4 mb-5">
                                    <img class="bn-thumbnail-img lazy"
                                         src="{{ asset('asstes/image/food_loader.gif') }}?v=1"
                                         data-src="{{ $item->image }}?v=5"
                                         alt="">
                                    <h4>
                                        <span class="float-end">{{ $item->price_orange }}/-</span>
                                        {{ $item->name }}
                                    </h4>
                                </div>
                            @endforeach
                        </div>

                        <table class="table table-bordered">
                            <tr>
                                @foreach($items as $item)
                                    @if( $loop->index % $cols === 0 )
                            </tr><tr>
                                @endif
                                <td class="text-center">
                                    <img src="{{ asset('asstes/image/item2.png') }}" data-src="{{ $item->image }}" class="lazy img" alt="">
                                    <br>{{ $item->name }}
                                </td>
                                @endforeach
                            </tr>
                        </table>

                        <table class="table table-bordered">
                            <tr>
                                @foreach($rows as $area)
                                    @if( $loop->index % $cols === 0 )
                                        </tr><tr>
                                    @endif
                                    <td>
                                        <a href="{{ route('area.page', ['area' => $area->area_slug]) }}">{{ $area->area }}</a>
                                    </td>
                                @endforeach
                            </tr>
                        </table>


                        <div class="text-center mb-5 mt-3">
                            <a href="{{ route('takeaway') }}#bn-take-away-price" class="btn btn-dark">
                                Order Take Away
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
