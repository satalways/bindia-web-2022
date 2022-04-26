@extends('layouts.app')

@section('content')
    <!--Our Team content-->
    <div class="bn-our-team bn-main-story">
        <div class="container">
            <div class="bn-team-header">
                <h1>{{ __('global.our_team') }}</h1>
                <p><b>Administration</b><br><a style="font-size: 90% !important;" href="mailto:bindia@bindia.dk">bindia@bindia.dk</a></p>
            </div>

            <div class="row">
                <div class="col-md-3 col-4">
                    <img src="{{ asset('asstes/image/our-team/amer.jpg') }}" alt="">
                    <div class="bn-team-title">
                        <p>Amer Suleman</p>
                    </div>
                </div>
                <div class="col-md-3 col-4">
                    <img src="{{ asset('asstes/image/our-team/jacob.jpg') }}" alt="">
                    <div class="bn-team-title">
                        <p>Jacob Langhorn</p>
                    </div>
                </div>
                <div class="col-md-3 col-4">
                    <img src="{{ asset('asstes/image/our-team/rasmus.jpg') }}" alt="">
                    <div class="bn-team-title">
                        <p>Rasmus Langhorn</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-4">
                    <img src="{{ asset('asstes/image/our-team/white-pager-image.jpg') }}" alt="">
                    <div class="bn-team-title">
                        <p>Julia Gusieva</p>
                    </div>
                </div>
                <div class="col-md-3 col-4">
                    <img src="{{ asset('asstes/image/our-team/white-pager-image.jpg') }}" alt="">
                    <div class="bn-team-title">
                        <p>Peter Andersen</p>
                    </div>
                </div>
                <div class="col-md-3 col-4">
                    <img src="{{ asset('asstes/image/our-team/white-pager-image.jpg') }}" alt="">
                    <div class="bn-team-title">
                        <p>Kasper Emil Petersen</p>
                    </div>
                </div>
            </div>
            <br>
            <div class="bn-team-header">
                <p><b>Senior Chefs </b><br>
                    <small><a href="mailto:prd@bindia.dk">prd@bindia.dk</a></small></p>
            </div>

            <div class="row">
                <div class="col-md-3 col-4">
                    <img src="{{ asset('asstes/image/our-team/sukhwinder.jpg') }}" alt="">
                    <div class="bn-team-title">
                        <p>Sukhwinder Singh</p>
                    </div>
                </div>
                <div class="col-md-3 col-4">
                    <img src="{{ asset('asstes/image/our-team/puran.jpg') }}" alt="">
                    <div class="bn-team-title">
                        <p>Puran Singh Panwar</p>
                    </div>
                </div>
                <div class="col-md-3 col-4">
                    <img src="{{ asset('asstes/image/our-team/dinesh.jpg') }}" alt="">
                    <div class="bn-team-title">
                        <p>Dinesh Singh</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-4">
                    <img src="{{ asset('asstes/image/our-team/maninder.jpg') }}" alt="">
                    <div class="bn-team-title">
                        <p>Maninder Singh</p>
                    </div>
                </div>
            </div>

            <div class="bn-join-team">
                {!! __('global.want_to_join', ['link' => route('jobs')]) !!}
            </div>

        </div>
    </div>
@endsection
