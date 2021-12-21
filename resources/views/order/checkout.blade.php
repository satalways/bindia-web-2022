@extends('layouts.app')

@section('content')

    <style>
        .bn-date-time {
            display: none !important;
        }
    </style>
    <div id="content">

    </div>
@endsection

@section('js')
    {!! js('date') !!}
    {!! js('form') !!}
    {!! js('cookie') !!}

    <script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@master/dist/latest/bootstrap-autocomplete.min.js"></script>

    <script>
        var datePicker = function (minDate, minTime) {
            $('[name=date]').pickadate({
                //weekdaysShort: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                showMonthsShort: true,
                format: 'dd-mm-yyyy',
                //formatSubmit: 'dd-mm-yyyy',
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
                //console.error(data);
                $('#content').html(data.html);
                datePicker(data.minDate, data.minTime);
                loadCookieData();

                $('#shipping_address').autoComplete({
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
                });
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
                    console.error($(this).val())
                })
        });
    </script>
@endsection
