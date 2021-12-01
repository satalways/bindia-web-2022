@extends('layouts.app')

@section('content')
    <div class="bn-breadcrumbs-dine">
        <div class="container">
            <div class="d-none d-sm-block">
                <img src="{{ asset('asstes/image/item2.png') }}"
                     data-src="{{ $item->image }}" alt="" class="lazy">
            </div>
        </div>
        <div class="d-block d-sm-none pt-5">
            <img src="{{ asset('asstes/image/item2.png') }}"
                 data-src="{{ $item->image }}" alt="" class="lazy">
        </div>
    </div>

    <div class="bn-dine-menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bn-top-paragraph">
                        <h1>
                            <small style="font-weight:bold; font-size: 62% !important; float: right">{{ $item->price }},-</small>
                            <a style="text-decoration: none; font-weight: bold"
                               href="{{ route('item', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                        </h1>
                        <p>
                            {{ $item->getDescription() }}
                        </p>
                        <p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
