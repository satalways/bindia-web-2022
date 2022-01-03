@extends('layouts.app')

@section('content')
    <div class="bn-feedback-banner">
        <img src="{{ asset('asstes/image/feedback/requst-feedback-banner.png') }}" alt="">
    </div>

    <div class="bn-check-out bn-feedback-main">
        <form action="{{ route('order.feedback.post') }}" method="post" id="form1" enctype="multipart/form-data">
            <div class="container">
                <div class="bn-heading-feedback">
                    <h2>Feedback</h2>
                </div>

                <div class="bn-check-out-from" id="bn-check-out-order">
                    <input type="hidden" name="action" value="saveRating">
                    <input type="hidden" name="data_id" value="{{ $order->id }}">
                    <input type="hidden" name="type"
                           value="{{ $order->isDelivery()?'weborder2':'weborder' }}">

                    @foreach($rows as $row)
                        @if('Rating' === $row->question_type_name)
                            <div class="bn-review-box-feedback">
                                <div class="float-start">{{ $row->question }}</div>
                                <div class="float-end bn-star-feedback starDiv" data-id="{{ $row->id }}">
                                    <input type="hidden" name="answers[{{ $row->id }}]" id="star{{ $row->id }}"
                                           value="0">
                                    {{--                                    <input id="input-id" type="text" class="rating" data-step="1"--}}
                                    {{--                                           data-animate="false" name="answers[{{ $row->id }}]" value="0"--}}
                                    {{--                                           data-show-clear="false" data-show-caption="false" data-size="md"--}}
                                    {{--                                    >--}}
                                    <img src="{{ asset('asstes/image/feedback/gray-star.svg') }}" alt="1" title="1"
                                         data-target="star{{ $row->id }}" data-value="1" style="cursor: pointer"
                                         class="starimg" data-id="{{ $row->id }}">
                                    <img src="{{ asset('asstes/image/feedback/gray-star.svg') }}" alt="2" title="2"
                                         data-target="star{{ $row->id }}" data-value="2" style="cursor: pointer"
                                         class="starimg" data-id="{{ $row->id }}">
                                    <img src="{{ asset('asstes/image/feedback/gray-star.svg') }}" alt="3" title="3"
                                         data-target="star{{ $row->id }}" data-value="3" style="cursor: pointer"
                                         class="starimg" data-id="{{ $row->id }}">
                                    <img src="{{ asset('asstes/image/feedback/gray-star.svg') }}" alt="4" title="4"
                                         data-target="star{{ $row->id }}" data-value="4" style="cursor: pointer"
                                         class="starimg" data-id="{{ $row->id }}">
                                    <img src="{{ asset('asstes/image/feedback/gray-star.svg') }}" alt="5" title="5"
                                         data-target="star{{ $row->id }}" data-value="5" style="cursor: pointer"
                                         class="starimg" data-id="{{ $row->id }}">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        @elseif ($row->question_type_name === 'YesNo')
                            <div class="bn-review-box-feedback">
                                <div class="float-start">{{ $row->question }}</div>
                                <div class="float-end bn-star-feedback">
                                    <div class="bn-radio-order float-end">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="answers[{{ $row->id }}]"
                                                   id="exampleRadios4{{ $row->id }}" value="Yes">
                                            <label class="form-check-label" for="exampleRadios4{{ $row->id }}">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="answers[{{ $row->id }}]"
                                                   id="exampleRadios5{{ $row->id }}" value="No">
                                            <label class="form-check-label" for="exampleRadios5{{ $row->id }}">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        @elseif ($row->question_type_name === 'TextArea')
                            <div class="row bn-space-top-feedback">
                                <div class="col-md-12">
                                    <textarea class="form-control" name="answers[{{ $row->id }}]"
                                              placeholder="{{ $row->question }}"></textarea>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <div class="row bn-space-t-feedback">
                        <div class="col-md-6">
                            <div class="position-relative">
                                <span class="bn-file-attachment-label form-control" id="bn-file-attachment-label">Attach File...</span>
                                <input type="file" placeholder="Attach File..." id="bn-file-attachment"
                                       class="form-control bn-file-attachment position-absolute top-0"
                                       name="file" style="opacity: 0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button class="btn bn-black-button float-end">Submit</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection

@section('js')
    {!! js('form') !!}
    <script>
        $(function () {
            $(document)
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
                                window.location.href = "{{ route('order.feedback.success') }}";
                            } else {
                                hideLoader();
                                alert(data);
                            }
                        }
                    });
                })
                .on('mouseenter', '.starimg', function (e) {
                    //e.stopPropagation();
                    $(this).attr('src', '{{ asset('asstes/image/feedback/black-star.svg') }}')

                    var Val = Number($(this).attr('data-value'));
                    var ID = $(this).attr('data-id');
                    if (Val > 1) {
                        for (x = 1; x < Val; x++) {
                            $('img.starimg[data-value=' + x + '][data-id=' + ID + ']').attr('src', '{{ asset('asstes/image/feedback/black-star.svg') }}');
                        }
                    }
                    if (Val < 5) {
                        for (x = Val + 1; x <= 5; x++) {
                            $('img.starimg[data-value=' + x + '][data-id=' + ID + ']').attr('src', '{{ asset('asstes/image/feedback/gray-star.svg') }}');
                        }
                    }
                })
                .on('mouseout', '.starimg', function (e) {
                    //e.stopPropagation();
                })
                .on('click', '.starimg', function () {
                    var Val = Number($(this).attr('data-value'));
                    var ID = $(this).attr('data-target');

                    $('#' + ID).val(Val);
                })
                .on('mouseleave', '.starDiv', function () {
                    var ID = $(this).attr('data-id');
                    var Val = Number($('#star' + ID).val());

                    if (Val === 0) {
                        for (x = 1; x <= 5; x++) {
                            $('img.starimg[data-value=' + x + '][data-id=' + ID + ']').attr('src', '{{ asset('asstes/image/feedback/gray-star.svg') }}');
                        }
                    } else {
                        for (x = 1; x <= Val; x++) {
                            $('img.starimg[data-value=' + x + '][data-id=' + ID + ']').attr('src', '{{ asset('asstes/image/feedback/black-star.svg') }}');
                        }
                        for (x = Val + 1; x <= 5; x++) {
                            $('img.starimg[data-value=' + x + '][data-id=' + ID + ']').attr('src', '{{ asset('asstes/image/feedback/gray-star.svg') }}');
                        }
                    }
                })
        })
    </script>
@endsection
