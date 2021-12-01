@extends('layouts.app')

@section('content')
    <div id="html">
        @include('catering.ajax.checkout')
    </div>
@endsection

@section('js')
    {!! js('form') !!}
    <script>
        $(function () {
            $(document)
                .on('click', '.addPersons', function () {
                    var Add = $(this).attr('data-add');

                    if (Add === '-1' && $(this).next().text() === "x{{ config('catering.min_people') }}") {
                        return;
                    }

                    show();
                    $.ajax({
                        url: "{{ route('catering.post') }}",
                        method: 'post',
                        data: {action: 'updatePersons', 'add': Add},
                        error: function (e1, e2, e3) {
                            hide();
                            alert(e3);
                        }
                    }).done(function (data) {
                        hide();
                        $('#html').html(data);
                    });
                })
                .on('click', '.addDrink', function () {
                    var Code = $(this).attr('data-code');
                    var Add = $(this).attr('data-add');
                    var Item = $(this).attr('data-item');

                    show();
                    $.ajax({
                        url: "{{ route('catering.post') }}",
                        method: 'post',
                        data: {action: 'addDrink', code: Code, add: Add, item: Item},
                        error: function (e1, e2, e3) {
                            hide();
                            alert(e3);
                        }
                    }).done(function (data) {
                        hide();
                        if (data.substr(0, 2) === 'OK') {
                            $('#html').html(data.substr(2));
                        } else {
                            alert(data);
                        }
                    });
                })
                .on('change', '#thermo', function () {
                    var thermo = $(this).is(':checked') ? 1 : 0;

                    show();
                    $.ajax({
                        url: "{{ route('catering.post') }}",
                        method: 'post',
                        data: {action: 'updateThermo', thermo: thermo},
                        error: function (e1, e2, e3) {
                            hide();
                            alert(e3);
                        }
                    }).done(function (data) {
                        hide();
                        $('#html').html(data);
                    });
                })
                .on('change', '.updateForm', function () {
                    $('#form1').ajaxSubmit({
                        error: function (e1, e2, e3) {
                            alert(e3);
                        },
                        success: function (data) {
                        }
                    });
                })
                .on('change', '.updateForm2', function () {
                    $('#form1').ajaxSubmit({
                        error: function (e1, e2, e3) {
                            alert(e3);
                        },
                        success: function (data) {
                            $('#html').html(data);
                        }
                    });
                })
                .on('submit', '#form1', function (e) {
                    e.preventDefault();

                    var Form = $('#form1');
                    Form.find('[name=action]').val('saveOrder');
                    show();
                    Form.ajaxSubmit({
                        error: function (e1, e2, e3) {
                            hide();
                            Form.find('[name=action]').val('updateCheckoutForm');
                            alert(e3);
                        },
                        success: function (data) {
                            hide();
                            Form.find('[name=action]').val('updateCheckoutForm');
                            alert(data);
                        }
                    });
                })
                .on('change', '#postal_code', function () {
                    show();

                    $.ajax({
                        url: '{{ route('catering.post') }}',
                        method: 'post',
                        data: {action: 'getCityByPostalCode', postal_code: $(this).val()},
                        error: function (e1, e2, e3) {
                            hide();
                            alert(e3);
                        }
                    }).done(function (data) {
                        hide();
                        if (data.substr(0,2) === 'OK') {
                            $('#html').html(data.substr(2));
                        } else {
                            $('#postal_code').val('');
                            alert (data);
                        }
                    });
                })
            ;
        })
    </script>
@endsection
