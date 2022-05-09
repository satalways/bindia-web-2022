@extends('layouts.app')

@section('content')
    <style>
        input.loading {
            background: url("{{ asset('images/loading.gif') }}") no-repeat right center;
        }

        .bn-date-time {
            display: none !important;
        }

        span.twitter-typeahead .tt-menu {
            cursor: pointer;
        }

        input.i:invalid, select.i:invalid {
            border: 1px solid #cc0000 !important;
        }

        input.error {
            border: 1px solid #cc0000 !important;
        }

        input.i:valid, input.success, select.i:valid {
            border: 1px solid #2f8f2f !important;
        }

        .dropdown-menu,
        span.twitter-typeahead .tt-menu {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            float: left;
            min-width: 160px;
            padding: 5px 0;
            margin: 2px 0 0;
            font-size: 1rem;
            color: #373a3c;
            text-align: left;
            list-style: none;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 0.25rem;
        }

        span.twitter-typeahead .tt-suggestion {
            display: block;
            width: 100%;
            padding: 3px 20px;
            clear: both;
            font-weight: normal;
            line-height: 1.5;
            color: #373a3c;
            text-align: inherit;
            white-space: nowrap;
            background: #fff;
            border: 0;
        }

        span.twitter-typeahead .tt-suggestion:focus,
        .dropdown-item:hover,
        span.twitter-typeahead .tt-suggestion:hover {
            color: #2b2d2f;
            text-decoration: none;
            background-color: #f5f5f5;
        }

        span.twitter-typeahead .active.tt-suggestion,
        span.twitter-typeahead .tt-suggestion.tt-cursor,
        span.twitter-typeahead .active.tt-suggestion:focus,
        span.twitter-typeahead .tt-suggestion.tt-cursor:focus,
        span.twitter-typeahead .active.tt-suggestion:hover,
        span.twitter-typeahead .tt-suggestion.tt-cursor:hover {
            color: #fff;
            text-decoration: none;
            background-color: #0275d8;
            outline: 0;
        }

        span.twitter-typeahead .disabled.tt-suggestion,
        span.twitter-typeahead .disabled.tt-suggestion:focus,
        span.twitter-typeahead .disabled.tt-suggestion:hover {
            color: #818a91;
        }

        span.twitter-typeahead .disabled.tt-suggestion:focus,
        span.twitter-typeahead .disabled.tt-suggestion:hover {
            text-decoration: none;
            cursor: not-allowed;
            background-color: #fff;
            background-image: none;
            filter: "progid:DXImageTransform.Microsoft.gradient(enabled = false)";
        }

        span.twitter-typeahead {
            width: 100%;
        }

        .input-group span.twitter-typeahead {
            display: block !important;
        }

        .input-group span.twitter-typeahead .tt-menu {
            top: 2.375rem !important;
        }
    </style>
    <div id="content">

    </div>
@endsection

@section('styles')
    <script src="{{ asset('js/custom.min.js') }}"></script>
@endsection

@section('js')
    {!! js('date') !!}
    {!! js('form') !!}
    {!! js('cookie') !!}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/@tarekraafat/autocomplete.js@9.1.1/dist/css/autoComplete.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.jquery.min.js"
            integrity="sha512-AnBkpfpJIa1dhcAiiNTK3JzC3yrbox4pRdrpw+HAI3+rIcfNGFbVXWNJI0Oo7kGPb8/FG+CMSG8oADnfIbYLHw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var gc_email_sent = "{{ __('checkout.gc_email_sent') }}";
    </script>
    <script src="{{ asset('js/order-checkout.min.js') }}?v=2"></script>
@endsection
