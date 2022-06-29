@extends('layouts.app')

@section('content')
    <style>
        .video-responsive {
            overflow: hidden;
            padding-bottom: 56.25%;
            position: relative;
            height: 0;
        }

        .video-responsive iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }

        .bn-jobs-main .bn-check-box-order .form-check label {
            text-transform: none !important;
        }
    </style>

    <div class="bn-breadcrumb-jobs bn-main-story">
        <div class="container">
            <div class="video-responsive">
                <iframe width="420" height="315" src="https://www.youtube.com/embed/x--YkH1Q4-E??rel=0&modestbranding=1&autohide=1&mute=1&showinfo=0&controls=1&autoplay=1"
                        frameborder="0" allowfullscreen allow="autoplay; fullscreen"></iframe>
            </div>
        </div>

        <br><br><br>
    </div>
@endsection
