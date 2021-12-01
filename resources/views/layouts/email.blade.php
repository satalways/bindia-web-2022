<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $subject ?? '' }}</title>
</head>
<body>
<div class="container">
    <div style="text-align:right;">
        <a href="https://www.bindia.dk">
            <img src="https://www.bindia.dk/themes/2016/img/logo.png"
                 style="width: 80px; background-color: #000; padding: 5px; border-radius: 3px;"/>
        </a>
    </div>
    <div style="margin: 35px 30px 40px 30px">
        {!! $content ?? '' !!}
    </div>
</div>
</body>
</html>
