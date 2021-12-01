@extends('layouts.app')

@section('content')
    <!---->
    <div class="bn-buffet-item bn-buffet-menu-box bn-main-story">
        <div class="container">
            <div class="bn-buffet-header">
                <h1>{{ __('catering.buffet_portion_packed') }}</h1>
                <div class="row">
                    <div class="col-md-2 col-3 bn-border-bottom">
                    </div>
                    <div class="col-md-4 col-4 bn-border-bottom">
                        <p><b class="bn-light-black">{{ __('catering.buffet') }}</b></p>
                    </div>
                    <div class="col-md-3 col-5 bn-border-bottom">
                        <p><b class="bn-org-text">{{ __('catering.portion_packed') }}</b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-3 bn-border-bottom">
                        <p><b>{{ __('catering.packing') }}</b></p>
                    </div>
                    <div class="col-md-4 col-4 bn-border-bottom">
                        <p class="bn-light-color-b">{{ __('catering.buffet_style') }}</p>
                    </div>
                    <div class="col-md-3 col-5 bn-border-bottom">
                        <p class="">{{ __('catering.separately_packed') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-3 bn-border-bottom">
                        <p><b>{{ __('catering.meal_type') }}</b></p>
                    </div>
                    <div class="col-md-4 col-4 bn-border-bottom">
                        <p class="bn-light-color-b">{{ __('catering.dinner_party') }}</p>
                    </div>
                    <div class="col-md-3 col-5 bn-border-bottom">
                        <p>{{ __('catering.lunch_simple_dinner') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-3 bn-border-bottom">
                        <p><b>{{ __('catering.quantity') }}</b></p>
                    </div>
                    <div class="col-md-4 col-4 bn-border-bottom">
                        <p class="bn-light-color-b">{{ __('catering.bindia_guarantees') }}</p>
                    </div>
                    <div class="col-md-3 col-5 bn-border-bottom">
                        <p>500g per {{ __('catering.portion') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-3">
                    </div>
                    <div class="col-md-3 col-4 bn-padding-0">
                        <a href="{{ route('catering') }}" class="btn bg-dark bn-btn-two w-100 text-white">
                            {{ __('catering.buffet') }}
                        </a>
                    </div>
                    <div class="col-md-1 d-md-inline-block d-none"></div>
                    <div class="col-md-3 col-5 bn-padding-0">
                        <a href="{{ route('catering.portion') }}" class="btn bg-dark bn-btn-one w-100 text-white">
                            {{ __('catering.portion_packed') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="html">
        @include('catering.ajax.portion')
    </div>
@endsection

@section('js')
    {!! js('form') !!}
    <script>
        $(function () {
            $(document)
                .on('click', '.addItemInCart', function () {
                    var Code = $(this).attr('data-code');
                    var Add = $(this).attr('data-add');

                    if (Add === "-1" && $(this).next().text() === 'x0') return;

                    show();
                    $.ajax({
                        url: "{{ route('catering.post') }}",
                        method: 'post',
                        data: {action: 'updatePortionItemCart', code: Code, add: Add},
                        error: function (e1, e2, e3) {
                            hide();
                            alert(e3);
                        }
                    }).done(function (data) {
                        hide();
                        $('#html').html(data);
                    });
                })
                .on('click', '#continueBtn', function (e) {
                    e.preventDefault();

                    show();
                    $('#form1').ajaxSubmit({
                        error: function (e1, e2, e3) {
                            hide();
                            alert(e3);
                        },
                        success: function (data) {
                            if (data.substr(0, 2) === 'OK') {
                                window.location.href = "{{ route('catering.optionals') }}";
                            } else {
                                hide();
                                alert(data);
                            }
                        }
                    });
                })
        })
    </script>
@endsection
