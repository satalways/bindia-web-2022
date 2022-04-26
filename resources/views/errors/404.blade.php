@extends('layouts.app')

@section('content')
    <div class="bn-breadcrumbs-take-away d-none d-sm-block">
        <div>
            <img src="{{ asset('asstes/image/take-away/mask-group-2.jpg') }}" data-src="{{ asset('asstes/image/take-away/mask-group-2.jpg') }}" alt="" class="lazy">
        </div>
    </div>

    <div class="bn-dine-menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bn-top-paragraph">
                        <h1>404 Error</h1>
                        <p>The page you are looking for is not found on our website</p>

                        <a class="btn btn-secondary" href="{{ route('home') }}">Home</a>
                        <a class="btn btn-secondary" href="{{ route('takeaway') }}">{{ __('global.takeaway') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
