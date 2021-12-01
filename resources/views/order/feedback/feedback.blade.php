@extends('layouts.app')

@section('content')
    <!--Main Breadcrumbs-->
    <div class="bn-breadcrumb-faq bn-main-story">
        <img src="{{ asset('asstes/image/faq/terms-banner.jpg') }}" data-src="{{ asset('asstes/image/faq/terms-banner.png') }}" alt="" class="d-sm-block d-none lazy">
        <img src="{{ asset('asstes/image/faq/trems-mobile.jpg') }}" data-src="{{ asset('asstes/image/faq/trems-mobile.png') }}" alt="" class="d-sm-none d-block lazy">
    </div>

    <!--Main end Breadcrumbs-->
    <div class="bn-contact-us bn-main-story">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="bn-contact-heading">
                        <h1>Feedback Rating</h1>
                        <p>
                            Dear {{ $order->full_name }}, Please send us your valuable feedback.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="bn-contact-form">
                        <form action="{{ route('order.feedback.post') }}" method="post" id="form1">
                            <input type="hidden" name="action" value="saveRating">
                            <input type="hidden" name="data_id" value="{{ $order->id }}">
                            <input type="hidden" name="type"
                                   value="{{ $order->isDelivery()?'weborder2':'weborder' }}">
                            @foreach($rows as $row)
                                <div class="row">
                                    @if('Rating' === $row->question_type_name)
                                        <div class="col-lg-8 col-12">
                                            <b style="font-size: 130%">{{ $row->question }}</b>
                                        </div>
                                        <div class="col-lg-4 col-12" style="text-align: right">
                                            <input id="input-id" type="text" class="rating" data-step="1"
                                                   data-animate="false" name="answers[{{ $row->id }}]" value="0"
                                                   data-show-clear="false" data-show-caption="false" data-size="md"
                                                   style="margin-bottom: 0 !important; height: auto !important;">
                                        </div>
                                    @elseif ($row->question_type_name === 'YesNo')
                                        <div class="col-lg-8 col-12">
                                            <b style="font-size: 130%">{{ $row->question }}</b>
                                        </div>
                                        <div class="col-lg-4 col-12" style="text-align: right">
                                            <input class="form-check-input" type="radio"
                                                   name="answers[{{ $row->id }}]" checked
                                                   id="inlineRadio1{{ $row->id }}" value="-1"
                                                   style="display: none">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                       name="answers[{{ $row->id }}]"
                                                       id="inlineRadio1{{ $row->id }}" value="Yes"
                                                       style="height: 22px !important;">
                                                <label class="form-check-label"
                                                       for="inlineRadio1{{ $row->id }}">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                       name="answers[{{ $row->id }}]"
                                                       id="inlineRadio2{{ $row->id }}" value="No"
                                                       style="height: 22px !important;">
                                                <label class="form-check-label"
                                                       for="inlineRadio2{{ $row->id }}">No</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                       name="answers[{{ $row->id }}]"
                                                       id="inlineRadio3{{ $row->id }}" value="-1"
                                                       style="height: 22px !important;">
                                                <label class="form-check-label"
                                                       for="inlineRadio3{{ $row->id }}">N/A</label>
                                            </div>
                                        </div>
                                    @elseif ($row->question_type_name === 'TextArea')
                                        <div class="col-lg-12 col-12">
                                            <b style="font-size: 130%">{{ $row->question }}</b>
                                        </div>
                                        <div class="col-lg-12 col-12">
                                            <textarea name="answers[{{ $row->id }}]" placeholder="Your suggestions"
                                                      class="form-control"></textarea>
                                        </div>
                                    @endif
                                </div>
                            @endforeach

                            <button type="submit" class="btn">
                                {{ __('global.send') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {!! js('form') !!}
    <!-- with v4.1.0 Krajee SVG theme is used as default (and must be loaded as below) - include any of the other theme CSS files as mentioned below (and change the theme property of the plugin) -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.1.2/themes/krajee-svg/theme.min.css"
          integrity="sha512-q6XeY4ys7Foi9D1oD7BaADWxjvqeI+58MAg/f7a61vpnclnScvmdCHdFf+X8kNVxKUkhcyDoKfcNJa150v5MEw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.1.2/css/star-rating.min.css"
          integrity="sha512-0VKIzRYJRN0QKkUNbaW7Ifj5sPZiJVAKF1ZmHB/EMHtZKXlzzbs4ve0Z0chgkwDWP6HkZlGShFj5FHoPstke1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- with v4.1.0 Krajee SVG theme is used as default (and must be loaded as below) - include any of the other theme JS files as mentioned below (and change the theme property of the plugin) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.1.2/js/star-rating.min.js"
            integrity="sha512-BjVoLC9Qjuh4uR64WRzkwGnbJ+05UxQZphP2n7TJE/b0D/onZ/vkhKTWpelfV6+8sLtQTUqvZQbvvGnzRZniTQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.1.2/themes/krajee-svg/theme.min.js"
            integrity="sha512-tl/PJxCMfgyb4CtWoIgSXi/1x5As+ufhB62D67+nF4F5i2MafacNEuBCRgh6FHb3iAsfLXabp4cC6qDWMCZnSw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(function () {
            $('input.rating').rating();

            $(document)
                .on('submit', '#form1', function (e) {
                    e.preventDefault();

                    show();
                    $('#form1').ajaxSubmit({
                        error: function (e1, e2, e3) {
                            hide();
                            alert(e3);
                        },
                        success: function (data) {
                            if (data.substr(0, 2) === 'OK') {
                                window.location.href = "{{ route('order.feedback.success') }}";
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
