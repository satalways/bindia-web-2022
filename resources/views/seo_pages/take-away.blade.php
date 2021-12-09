@extends('layouts.app')

@section('content')
    <div class="bn-breadcrumbs-dine">
        <div class="container">
            <div class="d-none d-sm-block">
                <img src="{{ asset('asstes/image/item2.png') }}"
                     data-src="{{ asset('asstes/image/take-away/mask-group-2.png') }}" alt="" class="lazy">
            </div>
        </div>
        <div class="d-block d-sm-none pt-5">
            <img src="{{ asset('asstes/image/item2.png') }}"
                 data-src="{{ asset('asstes/image/take-away/mask-group-2.png') }}" alt="" class="lazy">
        </div>
    </div>

    <div class="bn-dine-menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bn-top-paragraph">
                        <h1>
                            <h1>{{ $row->area }}</h1>
                        </h1>

                        @foreach($rows as $row)
                            {{ route('area.page', ['area' => $row->area_slug]) }}<br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
