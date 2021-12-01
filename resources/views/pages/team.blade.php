@extends('layouts.app')

@section('content')
    <!--Our Team content-->
    <div class="bn-our-team bn-main-story">
        <div class="container">
            <div class="bn-team-header">
                <h1>Our Team</h1>
                <p><b>Administration</b><br><a style="font-size: 90% !important;" href="mailto:bindia@bindia.dk">bindia@bindia.dk</a></p>
            </div>

            <div class="row">
                <div class="col-md-3 col-4">
                    <img src="{{ asset('asstes/image/our-team/amer.jpg') }}" data-src="{{ asset('asstes/image/our-team/amer.png') }}" class="lazy" alt="">
                    <div class="bn-team-title">
                        <p>Amer Suleman</p>
                    </div>
                </div>
                <div class="col-md-3 col-4">
                    <img src="{{ asset('asstes/image/our-team/jacob.jpg') }}" data-src="{{ asset('asstes/image/our-team/jacob.png') }}" class="lazy" alt="">
                    <div class="bn-team-title">
                        <p>Jacob Langhorn</p>
                    </div>
                </div>
                <div class="col-md-3 col-4">
                    <img src="{{ asset('asstes/image/our-team/rasmus.jpg') }}" data-src="{{ asset('asstes/image/our-team/rasmus.png') }}" class="lazy" alt="">
                    <div class="bn-team-title">
                        <p>Rasmus Langhorn</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-4">
                    <img src="{{ asset('asstes/image/our-team/white-pager-image.png') }}" alt="">
                    <div class="bn-team-title">
                        <p>Julia Gusieva</p>
                    </div>
                </div>
                <div class="col-md-3 col-4">
                    <img src="{{ asset('asstes/image/our-team/white-pager-image.png') }}" alt="">
                    <div class="bn-team-title">
                        <p>Peter Andersen</p>
                    </div>
                </div>
                <div class="col-md-3 col-4">
                    <img src="{{ asset('asstes/image/our-team/white-pager-image.png') }}" alt="">
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
                    <img src="{{ asset('asstes/image/our-team/sukhwinder.jpg') }}" data-src="{{ asset('asstes/image/our-team/sukhwinder.png') }}" class="lazy" alt="">
                    <div class="bn-team-title">
                        <p>Sukhwinder Singh</p>
                    </div>
                </div>
                <div class="col-md-3 col-4">
                    <img src="{{ asset('asstes/image/our-team/puran.jpg') }}" data-src="{{ asset('asstes/image/our-team/puran.png') }}" class="lazy" alt="">
                    <div class="bn-team-title">
                        <p>Puran Singh Panwar</p>
                    </div>
                </div>
                <div class="col-md-3 col-4">
                    <img src="{{ asset('asstes/image/our-team/dinesh.jpg') }}" data-src="{{ asset('asstes/image/our-team/dinesh.png') }}" class="lazy" alt="">
                    <div class="bn-team-title">
                        <p>Dinesh Singh</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-4">
                    <img src="{{ asset('asstes/image/our-team/maninder.jpg') }}" data-src="{{ asset('asstes/image/our-team/maninder.png') }}" class="lazy" alt="">
                    <div class="bn-team-title">
                        <p>Maninder Singh</p>
                    </div>
                </div>
                <div class="col-md-3 col-4">
                    <img src="{{ asset('asstes/image/our-team/virendra.jpg') }}" data-src="{{ asset('asstes/image/our-team/virendra.png') }}" class="lazy" alt="">
                    <div class="bn-team-title">
                        <p>Virendra Singh</p>
                    </div>
                </div>

            </div>

            <div class="bn-join-team">
                Want to join the team? Apply <a href="{{ route('jobs') }}">here</a>
            </div>

        </div>
    </div>
@endsection
