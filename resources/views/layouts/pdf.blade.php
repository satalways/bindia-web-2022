<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bindia PDF</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.1/cerulean/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
          crossorigin="anonymous"/>

    @yield('styles')
    <style>
        .page-break {
            page-break-after: always;
        }

        h1 {
            color: #c00;
        }
    </style>
</head>
<body>
<div class="page-container" style="margin: 0; padding: 0">
    <div class="page-content-wrapper">
        <div class="page-content">
            <div id="sb-site">
                <div class="row" style="margin: auto;">
                    <div class="col-md-12">
                        <div>
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('asstes/pdf-logo.png') }}" alt=""
                                     style="float: left; background-color: #000; padding: 10px">
                            </a>
                            <h4 style="float: right">{!! $title ?? 'Bindia' !!}</h4>
                        </div>
                        <div class="clear-both"></div>
                        <hr>

                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
