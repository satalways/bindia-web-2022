@extends('layouts.app')

@section('content')
    <form action="{{ route('giftcard.post') }}" id="form1" method="post">
        <input type="hidden" name="action" value="sendCustomerGiftCard">

        <div class="bn-breadcrumb-gift">
            <img src="{{ asset('asstes/image/gift-card/gift-banner.jpg') }}"
                 data-src="{{ asset('asstes/image/gift-card/gift-banner.png') }}" alt="" class="d-md-block d-none lazy">
        </div>
        <!--check out box-->
        <div class="bn-check-out bn-main-story bn-gift-card-main">
            <div class="container">
                <div class="bn-gift-heading">
                    <h1>{{ __('gc.giftcard') }}</h1>
                    <p>{!! __('gc.h1_p1') !!}</p>
                </div>
                <div class="bn-gift-sub-heading">
                    <h2>{{ __('gc.amount') }}:</h2>
                </div>
                <div class="row bn-gift-price">
                    <div class="col-md-4 col-5">
                        <input type="number" placeholder="DKK" class="form-control" min="100" step="5"
                               required="required" name="amount">
                    </div>
                </div>
                <div class="bn-gift-sub-heading">
                    <h2>{{__('gc.giftcard_for')}}:</h2>
                </div>
                <div class="bn-check-out-from">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" class="form-control" placeholder="{{ __('gc.rec_name') }}"
                                   required="required" name="customer_name" id="customer_name">
                        </div>
                        <div class="col-md-3">
                            <input type="tel" class="form-control" placeholder="{{ __('gc.rec_phone') }}"
                                   required="required" name="customer_phone" id="customer_phone">
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" placeholder="{{ __('gc.rec_email') }}"
                                   required="required" name="customer_email" id="customer_email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea class="form-control" name="to_message"
                                      placeholder="{{ __('gc.rec_greetings') }}"></textarea>
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="bn-check-box-order">
                            <div class="form-check">
                                <label class="form-check-label">
                                    {{ __('gc.send') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="send" id="send_now" checked
                                       value="now">
                                <label class="form-check-label" for="send_now">
                                    {{ __('global.now') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="send" id="send_later"
                                       value="later">
                                <label class="form-check-label" for="send_later">
                                    {{ __('global.later') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="{{ __('gc.select_sent_date') }}"
                                   id="date" readonly="readonly" disabled="disabled" name="date"
                                   value="{{ \Carbon\Carbon::today()->format(config('app.date_format')) }}">
                        </div>
                        <div class="col-md-6">
                            <input type="time" class="form-select" name="time" id="time" disabled="disabled"
                                   placeholder="{{ __('gc.select_sent_time') }}" value="{{ date('H:i') }}">
                        </div>
                    </div>
                    <div class="bn-gift-sub-heading">
                        <h2>{{ __('global.from') }}:</h2>
                    </div>
                    <div class="row bn-gift-last-box">
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="{{ __('global.name') }}"
                                   name="from_name" required="required" id="from_name">
                        </div>
                        <div class="col-md-3">
                            <input type="tel" class="form-control" placeholder="{{ __('global.phone') }}"
                                   name="from_phone" required="required" id="from_phone">
                        </div>
                        <div class="col-md-5">
                            <input type="email" class="form-control" placeholder="{{ __('global.email') }}"
                                   name="from_email" required="required" id="from_email">
                        </div>
                        <div class="col-12">
                            {{ __('gc.h2_p') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--check out button-->
        <div class="bn-form-checkout-button bn-gift-card-button bn-main-story">
            <div class="container">
                <div class="row bn-border-bottom bn-check-box-choose">
                    <div class="col-md-9 col-7 pt-lg-4 pt-0">
                        <div class="bn-radio-order bn-check-box-order">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="accept" id="policy-choose"
                                       required="required" value="1">
                                <label class="form-check-label" for="policy-choose">
                                    {{ __('global.i_accept') }}
                                    <a href="#">{{ __('gc.terms_of_sales_and_delivery') }}</a>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-5">
                        <button type="submit" class="btn">{{ __('global.confirm_and_pay') }}</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection

@section('js')
    {!! js('date') !!}
    {!! js('validate') !!}
    {!! js('form') !!}

    <script>
        $(function () {
            $("#form1").validate({
                debug: true
            });

            $('#date').pickadate({
                //weekdaysShort: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                showMonthsShort: true,
                format: 'dd-mm-yyyy',
                //formatSubmit: 'dd-mm-yyyy',
                firstDay: 1,
                min: 0
            });

            $('#time').pickatime({
                format: 'H:i',
                interval: 5,
                clear: ''
            });

            $(document)
                .on('click', '#send_later', function () {
                    $('#date, #time').prop('disabled', false);
                    $('#date').trigger('focus');
                })
                .on('click', '#send_now', function () {
                    $('#date, #time').prop('disabled', true);
                })
                .on('change', '#customer_name', function () {
                    $('#from_name').val($(this).val());
                })
                .on('change', '#customer_phone', function () {
                    $('#from_phone').val($(this).val());
                })
                .on('change', '#customer_email', function () {
                    $('#from_email').val($(this).val());
                })
                .on('submit', '#form1', function (e) {
                    e.preventDefault();

                    showLoader();
                    $('#form1').ajaxSubmit({
                        error: function (e1, e2, e3) {
                            hideLoader();
                            alert(e3);
                        },
                        success: function (data) {
                            if (data.substr(0, 2) === 'OK') {
                                window.location.href = data.substr(2);
                            } else {
                                hideLoader();
                                alert(data);
                            }
                        }
                    });
                })
        });
    </script>
@endsection
