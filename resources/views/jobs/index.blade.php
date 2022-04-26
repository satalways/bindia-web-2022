@extends('layouts.app')

@section('content')
    <style>
        .video-responsive {
            overflow: hidden;
            padding-bottom: 56.25%;
            position: relative;
            height: 0;
        }

        .video-responsive iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }

        .bn-jobs-main .bn-check-box-order .form-check label {
            text-transform: none !important;
        }
        /*div.form-check {*/
        /*    padding-left: 35px !important;*/
        /*}*/
    </style>


    <div class="bn-breadcrumb-jobs bn-main-story">
        <div class="container">
            <div class="video-responsive">
                <iframe width="420" height="315" src="https://www.youtube.com/embed/7Lvg3Q9pJaU?autoplay=1"
                        frameborder="0" allowfullscreen></iframe>
            </div>
        </div>

        <form action="{{ route('jobs.post') }}" id="form1" method="post">
            <div class="bn-check-out bn-main-story bn-gift-card-main bn-jobs-main">
                <div class="container">
                    <div class="bn-gift-heading">
                        <h1>{{ __('job.work_at_bindia') }}</h1>
                        <div class="bn-check-box-order">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="job_title" id="chef-one" value="Chef"
                                       checked required>
                                <label class="form-check-label" for="chef-one">
                                    {{ __('job.chef') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="job_title" id="kitchen-helper"
                                       value="Kitchen Helper & Takeaway Attendant" required>
                                <label class="form-check-label" for="kitchen-helper">
                                    {{ __('job.kitchen_helper') }} and {{ __('job.takeaway_attendant') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="bn-check-out-from">
                        <div class="bn-gift-sub-heading">
                            <h2>{{ __('job.' . $questions[0]['lang_key'] ) }}</h2>
                        </div>
                        <div class="row 2bn-text-area-height">
                            <div class="col-lg-6">
                            <textarea class="form-control" name="questions[0][0]" id="questions_0_0"
                                      placeholder="{{ $questions[0]['q'][0]['question'] }}"></textarea>
                            </div>
                            <div class="col-lg-6">
                            <textarea name="questions[0][1]" class="form-control" id="questions_0_1"
                                      placeholder="{{ $questions[0]['q'][1]['question'] }}"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            <textarea class="form-control" name="questions[0][2]" id="questions_0_2"
                                      placeholder="{{ $questions[0]['q'][2]['question'] }}"></textarea>
                            </div>
                            <div class="col-lg-6">
                            <textarea class="form-control" name="questions[0][3]" id="questions_0_3"
                                      placeholder="{{ $questions[0]['q'][3]['question'] }}"></textarea>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="bn-check-box-order">
                                <div class="form-check">
                                    <label class="form-check-label" style="text-transform: none">
                                        {{ $questions[0]['q'][4]['question'] }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="questions[0][4]"
                                           id="questions_0_4"
                                           value="Yes">
                                    <label class="form-check-label" for="questions_0_0">
                                        {{ __('global.yes') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="questions[0][4]" id="culture-two"
                                           value="No">
                                    <label class="form-check-label" for="culture-two">
                                        {{ __('global.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="bn-gift-sub-heading">
                            <h2>{{ __('job.' . $questions[1]['lang_key'] ) }}</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            <textarea class="form-control" name="questions[1][0]" id="questions_1_0"
                                      placeholder="{{ $questions[1]['q'][0]['question'] }}"></textarea>
                            </div>
                            <div class="col-lg-6">
                            <textarea name="questions[1][1]" class="form-control" id="questions_1_1"
                                      placeholder="{{ $questions[1]['q'][1]['question'] }}"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            <textarea class="form-control" name="questions[1][2]" id="questions_1_2"
                                      placeholder="{{ $questions[1]['q'][2]['question'] }}"></textarea>
                            </div>
                            <div class="col-lg-6">
                            <textarea name="questions[1][3]" class="form-control" id="questions_1_3"
                                      placeholder="{{ $questions[1]['q'][3]['question'] }}"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            <textarea class="form-control" name="questions[1][4]" id="questions_1_4"
                                      placeholder="{{ $questions[1]['q'][4]['question'] }}"></textarea>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="questions[1][5]" id="questions_1_5"
                                       placeholder="{{ $questions[1]['q'][5]['question'] }}">
                                <input type="text" class="form-control" name="questions[1][6]" id="questions_1_6"
                                       placeholder="{{ $questions[1]['q'][6]['question'] }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            <textarea class="form-control" name="questions[1][7]" id="questions_1_7"
                                      placeholder="{{ $questions[1]['q'][7]['question'] }}"></textarea>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="questions[1][8]" id="questions_1_8"
                                       placeholder="{{ $questions[1]['q'][8]['question'] }}">
                            </div>
                        </div>
                        <div class="bn-gift-sub-heading">
                            <h2>{{ __('job.' . $questions[2]['lang_key'] ) }}</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            <textarea class="form-control" name="questions[2][0]" id="questions_2_0"
                                      placeholder="{{ $questions[2]['q'][0]['question'] }}"></textarea>
                            </div>
                            <div class="col-lg-6">
                            <textarea class="form-control" name="questions[2][1]" id="questions_2_1"
                                      placeholder="{{ $questions[2]['q'][1]['question'] }}"></textarea>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="bn-check-box-order">
                                <div class="form-check">
                                    <label class="form-check-label" style="text-transform: none">
                                        {{ $questions[2]['q'][2]['question'] }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="questions[2][2]"
                                           id="questions_2_2"
                                           value="Yes">
                                    <label class="form-check-label" for="questions_2_2">
                                        {{ __('global.yes') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="questions[2][2]"
                                           id="certificate-no"
                                           value="No">
                                    <label class="form-check-label" for="certificate-no">
                                        {{ __('global.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="bn-gift-sub-heading">
                            <h2>{{ __('job.' . $questions[3]['lang_key'] ) }}</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            <textarea class="form-control" name="questions[3][0]" id="questions_3_0"
                                      placeholder="{{ $questions[3]['q'][0]['question'] }}"></textarea>
                            </div>
                            <div class="col-lg-6">
                            <textarea class="form-control" name="questions[3][1]" id="questions_3_1"
                                      placeholder="{{ $questions[3]['q'][1]['question'] }}"></textarea>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="bn-check-box-order">
                                <div class="form-check " style="min-width: 51.5%">
                                    <label class="form-check-label">
                                        {{ $questions[3]['q'][2]['question'] }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="questions[3][2]"
                                           id="questions_3_2"
                                           value="Yes">
                                    <label class="form-check-label" for="questions_3_2">
                                        {{ __('global.yes') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="questions[3][2]" id="evenings-no"
                                           value="No">
                                    <label class="form-check-label" for="evenings-no">
                                        {{ __('global.no') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="bn-gift-sub-heading">
                            <h2>{{ __('job.' . $questions[4]['lang_key'] ) }}</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            <textarea class="form-control" name="questions[4][0]" id="questions_4_0"
                                      placeholder="{{ $questions[4]['q'][0]['question'] }}"></textarea>
                            </div>
                            <div class="col-lg-6">
                            <textarea class="form-control" name="questions[4][1]" id="questions_4_1"
                                      placeholder="{{ $questions[4]['q'][1]['question'] }}"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            <textarea class="form-control" name="questions[4][2]" id="questions_4_2"
                                      placeholder="{{ $questions[4]['q'][2]['question'] }}"></textarea>
                            </div>
                            <div class="col-lg-6">
                            <textarea class="form-control" name="questions[4][3]" id="questions_4_3"
                                      placeholder="{{ $questions[4]['q'][3]['question'] }}"></textarea>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-lg-6">
                                <div class="bn-check-box-order">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            {{ $questions[4]['q'][4]['question'] }}
                                        </label>
                                    </div>
                                    <div class="form-check" style="padding-left: 33px;">
                                        <input class="form-check-input" type="radio" name="questions[4][4]"
                                               id="questions_4_4"
                                               value="Yes">
                                        <label class="form-check-label" for="questions_4_4">
                                            {{ __('global.yes') }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="questions[4][4]"
                                               id="questions_4_4_2" value="No">
                                        <label class="form-check-label" for="questions_4_4_2">
                                            {{ __('global.no') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="bn-check-box-order">
                                    <div class="form-check w-50">
                                        <label class="form-check-label">
                                            {{ $questions[4]['q'][5]['question'] }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="questions[4][5]"
                                               id="questions_4_5"
                                               value="Yes">
                                        <label class="form-check-label" for="questions_4_5">
                                            {{ __('global.yes') }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="questions[4][5]"
                                               id="questions_4_5_2" value="No">
                                        <label class="form-check-label" for="questions_4_5_2">
                                            {{ __('global.no') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="bn-check-box-order">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            {{ $questions[4]['q'][6]['question'] }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="questions[4][6]"
                                               id="questions_4_6"
                                               value="Yes">
                                        <label class="form-check-label" for="questions_4_6">
                                            {{ __('global.yes') }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="questions[4][6]"
                                               id="questions_4_6_2" value="No">
                                        <label class="form-check-label" for="choose-questions_4_6_2">
                                            {{ __('global.no') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bn-gift-sub-heading">
                            <h2>{{ __('job.' . $questions[5]['lang_key'] ) }}</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            <textarea class="form-control" name="questions[5][0]" id="questions_5_0"
                                      placeholder="{{ $questions[5]['q'][0]['question'] }}"></textarea>
                            </div>
                            <div class="col-lg-6">
                            <textarea class="form-control" name="questions[5][1]" id="questions_5_1"
                                      placeholder="{{ $questions[5]['q'][1]['question'] }}"></textarea>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="bn-check-box-order bn-check-language">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        {{ $questions[5]['q'][2]['question'] }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="questions[5][2]"
                                           id="questions_5_2"
                                           value="Poor">
                                    <label class="form-check-label" for="questions_5_2">
                                        {{ __('global.poor') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="questions[5][2]"
                                           id="questions_5_2_2"
                                           value="Average">
                                    <label class="form-check-label" for="questions_5_2_2">
                                        {{ __('global.average') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="questions[5][2]"
                                           id="questions_5_2_3"
                                           value="Good">
                                    <label class="form-check-label" for="questions_5_2_3">
                                        {{ __('global.good') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="questions[5][2]"
                                           id="questions_5_2_4"
                                           value="Excellent">
                                    <label class="form-check-label" for="questions_5_2_4">
                                        {{ __('global.excellent') }}
                                    </label>
                                </div>
                            </div>
                            <div class="bn-check-box-order bn-check-language">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        {{ $questions[5]['q'][3]['question'] }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="questions[5][3]"
                                           id="questions_5_3"
                                           value="Poor">
                                    <label class="form-check-label" for="questions_5_3">
                                        {{ __('global.poor') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="questions[5][3]"
                                           id="questions_5_3_2"
                                           value="Average">
                                    <label class="form-check-label" for="questions_5_3_2">
                                        {{ __('global.average') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="questions[5][3]"
                                           id="questions_5_3_3"
                                           value="Good">
                                    <label class="form-check-label" for="questions_5_3_3">
                                        {{ __('global.good') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="questions[5][3]"
                                           id="questions_5_3_4"
                                           value="Excellent">
                                    <label class="form-check-label" for="questions_5_3_4">
                                        {{ __('global.excellent') }}
                                    </label>
                                </div>
                            </div>
                            <div class="bn-check-box-order bn-check-language">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        {{ $questions[5]['q'][4]['question'] }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="questions[5][4]"
                                           id="questions_5_4"
                                           value="Poor">
                                    <label class="form-check-label" for="questions_5_4">
                                        {{ __('global.poor') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="questions[5][4]"
                                           id="questions_5_4_2"
                                           value="Average">
                                    <label class="form-check-label" for="questions_5_4_2">
                                        {{ __('global.average') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="questions[5][4]"
                                           id="questions_5_4_3"
                                           value="Good">
                                    <label class="form-check-label" for="questions_5_4_3">
                                        {{ __('global.good') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="questions[5][4]"
                                           id="questions_5_4_4"
                                           value="Excellent">
                                    <label class="form-check-label" for="questions_5_4_4">
                                        {{ __('global.excellent') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="bn-gift-sub-heading">
                            <div class="row">
                                <div class="col-lg-2">
                                    <h2>{{ __('job.' . $questions[6]['lang_key'] ) }}</h2>
                                </div>
                                <div class="col-lg-10">
                                    <div class="bn-check-box-order">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                {{ $questions[6]['q'][0]['question'] }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="questions[6][0]"
                                                   id="questions_6_0" value="Male">
                                            <label class="form-check-label" for="questions_6_0">
                                                {{ __('job.male')}}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="questions[6][0]"
                                                   id="questions_6_0_2" value="Female">
                                            <label class="form-check-label" for="questions_6_0_2">
                                                {{ __('job.female') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="questions[6][1]" id="questions_6_1"
                                       placeholder="{{ $questions[6]['q'][1]['question'] }}">
                            </div>
                            <div class="col-lg-6">
                                <input type="email" class="form-control" name="questions[6][2]" id="questions_6_2"
                                       placeholder="{{ $questions[6]['q'][2]['question'] }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="questions[6][3]" id="questions_6_3"
                                       placeholder="{{ $questions[6]['q'][3]['question'] }}">
                            </div>
                            <div class="col-lg-6">
                                <input type="tel" class="form-control" name="questions[6][4]" id="questions_6_4"
                                       placeholder="{{ $questions[6]['q'][4]['question'] }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="questions[6][5]" id="questions_6_5"
                                       placeholder="{{ $questions[6]['q'][5]['question'] }}">
                            </div>
                            <div class="col-lg-6">
                                <select class="form-select select2" name="questions[6][6]" id="questions_6_6"
                                        placeholder="{{ $questions[6]['q'][6]['question'] }}">
                                    <option value="">{{ $questions[6]['q'][6]['question'] }}</option>
                                    @foreach($countries as $country)
                                        <option>{{ $country->printable_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="questions[6][7]" id="questions_6_7"
                                       placeholder="{{ $questions[6]['q'][7]['question'] }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="questions[6][9]" id="questions_6_9"
                                       placeholder="{{ $questions[6]['q'][8]['question'] }}">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="questions[6][10]" id="questions_6_10"
                                       placeholder="{{ $questions[6]['q'][9]['question'] }}">
                            </div>

                        </div>
                        <div class="row">
                            <div class="bn-check-box-order">
{{--                                <div class="form-check">--}}
{{--                                    <label class="form-check-label">--}}
{{--                                        {{ $questions[6]['q'][10]['question'] }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
                                <div class="col-lg-6 position-relative">
                                    <span id="bn-job-file-attach-one"
                                          class="form-control">{{ $questions[6]['q'][10]['question'] }}</span>
                                    <input type="file" id="bn-file-attach-one" name="questions_6_10" accept="image/*"
                                           class="form-control position-absolute top-0"
                                           placeholder="{{ $questions[6]['q'][10]['question'] }}"
                                           style="opacity: 0">
                                </div>
{{--                                <div class="col-lg-6">--}}
                                    {{--                                    <input type="file" class="form-control"--}}
                                    {{--                                           title="{{ $questions[6]['q'][10]['question'] }}"--}}
                                    {{--                                           placeholder="{{ $questions[6]['q'][10]['question'] }}" accept="image/*"--}}
                                    {{--                                           name="questions_6_10" id="questions_6_10">--}}
{{--                                </div>--}}
                            </div>
                            <div class="bn-gift-sub-heading">
                                <h2>{{ __('job.' . $questions[7]['lang_key'] ) }}</h2>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="questions[7][0]" id="questions_7_0"
                                           placeholder="{{ $questions[7]['q'][0]['question'] }}">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="questions[7][1]" id="questions_7_1"
                                           placeholder="{{ $questions[7]['q'][1]['question'] }}">
                                </div>
                            </div>
                            <div class="row pt-2">
                                <div class="bn-check-box-order bn-form-equal-box">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            {{ $questions[7]['q'][2]['question'] }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="questions[7][2]"
                                               id="questions_7_2"
                                               value="Yes">
                                        <label class="form-check-label" for="questions_7_2">
                                            {{ __('global.yes') }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="questions[7][2]"
                                               id="questions_7_2_2"
                                               value="No">
                                        <label class="form-check-label" for="questions_7_2_2">
                                            {{ __('global.no') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="bn-check-box-order bn-form-equal-box">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            {{ $questions[7]['q'][3]['question'] }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="questions[7][3]"
                                               id="questions_7_3"
                                               value="Never" checked>
                                        <label class="form-check-label" for="questions_7_3">
                                            {{ $questions[7]['q'][3]['options'][0] }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        {{--                                <input class="form-check-input" type="radio" name="choose-point" id="questions_7_3_2" value="option1">--}}
                                        <label class="form-check-label" for="questions_7_3_2">
                                            <input type="date" class="bn-date-time date" name="questions[7][4]" disabled
                                                   required="required" id="questions_7_4"
                                                   min="{{ \Carbon\Carbon::today()->toDateString() }}">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="bn-gift-sub-heading">
                                <h2>Files</h2>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 position-relative">
                                    <span id="bn-job-file-attach-one" class="form-control">Attach File...</span>
                                    <input type="file" id="bn-file-attach-one" name="attachment[1]"
                                           class="form-control position-absolute top-0" placeholder="Attach File..."
                                           style="opacity: 0">
                                </div>
                                <div class="col-lg-6 position-relative">
                                    <span id="bn-job-file-attach-two" class="form-control">Attach File...</span>
                                    <input type="file" id="bn-file-attach-two" name="attachment[1]"
                                           class="form-control position-absolute top-0" placeholder="Attach File..."
                                           style="opacity: 0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <button class="btn bg-dark text-white">Submit Application</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!--check out box-->
@endsection

@section('js')
    {!! js('form') !!}
    {!! js('select2') !!}
    <script>
        $(function () {
            // $('#questions_6_6').select2({
            //     theme: "bootstrap-5",
            //     //containerCssClass: "select2--large", // For Select2 v4.0
            //     //dropdownParent: $("#form-select-lg").parent(), // Required for dropdown styling
            //     //selectionCssClass: "select2--large", // For Select2 v4.1
            //     dropdownParent: $("#questions_6_6").parent(), // Required for dropdown styling
            // });

            $(document)
                .on('change', '#questions_7_3', function () {
                    if ($(this).is(':checked')) {
                        $('#questions_7_4').attr('disabled', true);
                    } else {
                        $('#questions_7_4').attr('disabled', false).trigger('select');
                    }
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
                            hideLoader();
                            if (typeof data === 'object' && data.error) {
                                $('#' + data.id).trigger('focus');
                                setTimeout(function () {
                                    alert(data.error);
                                    $('#' + data.id).trigger('select');
                                }, 1000);
                            } else if (data.substr(0, 2) === 'OK') {
                                alert('Thank you for job application');
                                window.location.reload();
                            }
                        }
                    });
                });
        });
    </script>
@endsection
