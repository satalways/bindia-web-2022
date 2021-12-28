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
        var datePicker = function (minDate, minTime) {
            $('[name=date]').pickadate({
                //weekdaysShort: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                showMonthsShort: true,
                format: 'dd-mm-yyyy',
                //formatSubmit: 'dd-mm-yyyy',
                disable: [
                    [{{ date('Y') }}, 11, 24],
                    [{{ date('Y') }}, 11, 31],
                    [{{ date('Y', strtotime('next year')) }}, 11, 24],
                    [{{ date('Y', strtotime('next year')) }}, 11, 31],
                ],
                firstDay: 1,
                min: minDate,
                onClose: function () {
                    // var T = $('[name=time]').pickatime('picker');
                    // T.set({min: '18:00'});
                    loadItems(false);
                }
            });
            $('[name=time]').pickatime({
                format: 'H:i',
                interval: 5,
                min: minTime,
                max: '21:00',
                clear: ''
            });
        }

        var loadItems = function (loadDiv = true) {
            if (loadDiv) show();
            $.ajax({
                url: '{{ route('checkout.post') }}',
                method: 'post',
                data: {action: 'loadCart'},
                error: function (e1, e2, e3) {
                    hide();
                }
            }).done(function (data) {
                hide();
                $('#content').html(data.html);
                datePicker(data.minDate, data.minTime);
                loadCookieData();

                $('#shipping_address').typeahead({
                        hint: true,
                        highlight: true,
                        minLength: 1
                    },
                    {
                        limit: 12,
                        async: true,
                        //displayKey: 'tekst',
                        display: 'forslagstekst',
                        templates: {
                            empty: [
                                '<div class="empty-message">',
                                'no suggessions',
                                '</div>'
                            ].join('\n'),
                            suggestion: function (data) {
                                return '<div class="address">' + data.tekst + '</div>';
                            }
                        },
                        source: function (query, processSync, processAsync) {
                            //processSync(['It will load, Please wait...']);
                            return $.ajax({
                                url: "{{ route('checkout.address') }}",
                                type: 'GET',
                                data: {query: query},
                                dataType: 'json',
                                success: function (json) {
                                    // in this example, json is simply an array of strings
                                    return processAsync(json);
                                }
                            });
                        }
                    })
                    .on('typeahead:selected', function (evt, item) {
                        console.error(item);
                        if (item.data.postnr) {
                            $('#postal_code').val(item.data.postnr);
                            $('#shipping_city').val(item.data.supplerendebynavn);
                        } else {
                            $('#shipping_address').trigger('blur');
                            setTimeout(function () {
                                $('#shipping_address').trigger('focus');
                            }, 100);
                        }
                    })
                    .on('typeahead:asyncrequest', function () {
                        $(this).addClass('loading');
                    })
                    .on('typeahead:asynccancel typeahead:asyncreceive', function () {
                        $(this).removeClass('loading');
                        //$('.Typeahead-spinner').hide();
                    });

                {{--$('#shipping_address').typeahead({--}}
                {{--    hint: true,--}}
                {{--    highlight: true,--}}
                {{--    minLength: 1,--}}
                {{--    source: function (typeahead, query) {--}}
                {{--        return $.ajax({--}}
                {{--            url: "{{ route('checkout.address') }}",--}}
                {{--            method: 'post',--}}
                {{--            data: {query:query},--}}
                {{--            error: function(e1,e2,e3) {--}}
                {{--                console.error(e3);--}}
                {{--            },--}}
                {{--            success: function(data) {--}}
                {{--                console.error(data);--}}
                {{--            }--}}
                {{--        });--}}
                {{--        --}}{{--return $.post('{{ route('checkout.address') }}', {query: query}, function (data) {--}}
                {{--        --}}{{--    console.error(data);--}}
                {{--        --}}{{--    return typeahead.process(data);--}}
                {{--        --}}{{--});--}}
                {{--    }--}}
                {{--});--}}

                // $('#shipping_address').autoComplete({
                {{--resolver: 'custom',--}}
                {{--events: {--}}
                {{--    search: function (qry, callback) {--}}
                {{--        // let's do a custom ajax call--}}
                {{--        $.ajax(--}}
                {{--            '{{ route('checkout.address') }}',--}}
                {{--            {--}}
                {{--                data: { 'qry': qry}--}}
                {{--            }--}}
                {{--        ).done(function (res) {--}}
                {{--            console.error(res);--}}
                {{--            callback(res.results)--}}
                {{--        });--}}
                {{--    }--}}
                {{--}--}}
                // });
                // $('#shipping_address').autoComplete('show');

                {{--$('#address').autocomplete({--}}
                {{--    --}}{{--serviceUrl: '{{ route('checkout.address') }}',--}}
                {{--        --}}{{--onSelect: function (suggestion) {--}}
                {{--        --}}{{--    alert('You selected: ' + suggestion.value + ', ' + suggestion.data);--}}
                {{--        --}}{{--}--}}

                {{--    lookup: function (query, done) {--}}
                {{--        // Do Ajax call or lookup locally, when done,--}}
                {{--        // call the callback and pass your results:--}}
                {{--        var result = {--}}
                {{--            "query": "Unit",--}}
                {{--            suggestions: [--}}
                {{--                {"value": "United Arab Emirates", "data": "AE"},--}}
                {{--                {"value": "United Kingdom", "data": "UK"},--}}
                {{--                {"value": "United States", "data": "US"}--}}
                {{--            ]--}}
                {{--        };--}}

                {{--        done(result);--}}
                {{--    },--}}
                {{--    onSelect: function (suggestion) {--}}
                {{--        alert('You selected: ' + suggestion.value + ', ' + suggestion.data);--}}
                {{--    }--}}
                {{--});--}}
            });
        }

        var loadCookieData = function () {
            $('input.cookie').each(function () {
                var currentVal = $(this).val();
                if (!currentVal || currentVal === '') {
                    //console.error(Cookies.get($(this).attr('name')));
                    $(this).val(Cookies.get($(this).attr('name')))
                }
            })
        }

        $(function () {
            loadItems();

            $(document)
                .on('click', '#redeemGiftcard', function (e) {
                    e.preventDefault();
                    show();

                    $.ajax({
                        url: '{{ route('giftcard.post') }}',
                        method: 'post',
                        data: {action: 'checkGiftCards', string: $('#giftcard').val()},
                        error: function (e1, e2, e3) {
                            hide();
                            alert(e3);
                        }
                    }).done(function (data) {
                        hide();
                        if (data.substr(0, 6) === 'mailOK') {
                            alert('{{ __('checkout.gc_email_sent') }}');
                        } else if (data.substr(0, 2) === 'OK') {
                            loadItems();
                        } else {
                            alert(data);
                        }
                    });
                })
                .on('keydown', '#giftcard', function (e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        e.stopPropagation();
                        $('#redeemGiftcard').trigger('click');
                    }
                })
                .on('change', '.update2', function () {
                    var Form = $('#checkoutForm');
                    Form.find('[name=action]').val('updateSessionCart2');
                    Form.trigger('submit');
                })
                .on('click', '.update', function (e) {
                    var Form = $('#checkoutForm');
                    Form.find('[name=action]').val('updateSessionCart');
                    Form.trigger('submit');
                })
                .on('submit', '#checkoutForm', function (e) {
                    e.preventDefault();
                    var Action = $('#checkoutForm [name=action]').val();

                    if (Action !== 'updateSessionCart2') {
                        show();
                    }
                    $('#checkoutForm').ajaxSubmit({
                        error: function (e1, e2, e3) {
                            hide();
                            alert(e3);
                        },
                        success: function (data) {
                            if (typeof data === 'object') {
                                hide();
                                if (data.message) {
                                    alert(data.message)
                                }
                                if (data.new_time) {
                                    $('[name=time]').val(data.new_time);
                                }

                                if (Action === 'updateSessionCart') {
                                    hide();
                                    $('#html').html(data.html);
                                    loadItems();
                                } else if (Action === 'makeOrder') {
                                    if (data.substr(0, 4) === 'GOTO') {
                                        window.location.href = data.substr(4);
                                    } else {
                                        hide();
                                        alert(data);
                                    }
                                }
                            } else if (Action === 'makeOrder') {
                                if (data.substr(0, 4) === 'GOTO') {
                                    window.location.href = data.substr(4);
                                } else {
                                    hide();
                                    alert(data);
                                }
                            }
                        }
                    });
                })
                .on('click', '#removeGCButton', function (e) {
                    e.preventDefault();

                    $('#giftcard').val('');
                    var Form = $('#checkoutForm');
                    Form.find('[name=action]').val('updateSessionCart');
                    Form.trigger('submit');
                })
                .on('click', '#checkoutButton', function (e) {
                    e.preventDefault();

                    //if (!$('#checkoutForm').valid()) return false;

                    var Form = $('#checkoutForm');
                    Form.find('[name=action]').val('makeOrder');
                    Form.trigger('submit');
                })
                .on('change', '.cookie', function (e) {
                    Cookies.set($(this).attr('name'), $(this).val(), {expires: 365});
                })
                .on('change', '[name=shipping_postal_code]', function (e) {
                    e.preventDefault();
                    if ($(this).val() == '') {
                        $('.update2').trigger('change');
                    } else {
                        show("{{ __('checkout.calculating_delivery_fee') }}");
                        $.ajax({
                            url: '{{ route('checkout.post') }}',
                            method: 'post',
                            data: {action: 'checkingPostalCode', 'postal_code': $(this).val()},
                            error: function (e1, e2, e3) {
                                hide();
                            }
                        }).done(function (data) {
                            hide();
                            if (data.substr(0, 2) === 'OK') {
                                var D = JSON.parse(data.substr(2));
                                alert(D.message);

                                $('#city').val(D.city);
                                $('#choose-delivery').trigger('click');

                                // if (confirm(D.message)) {
                                //
                                // } else {
                                //     $('[name=shipping_postal_code]').val('');
                                //     $('#choose-pickup').trigger('click');
                                //     //$('.update2').trigger('change');
                                // }
                            } else {
                                alert(data);
                            }
                        });
                    }
                })
                .on('input', '#shipping_address', function () {
                    //console.error($(this).val())
                })
        });
    </script>
@endsection
