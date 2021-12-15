@extends('layouts.app')

@section('content')
    <!--Main Breadcrumbs-->
    <div class="bn-breadcrumb-faq bn-main-story">
        <img src="{{ asset('asstes/image/faq/faq-banner.jpg') }}"
             data-src="{{ asset('asstes/image/faq/faq-banner.png') }}" alt="" class="d-sm-block d-none lazy">
        <img src="{{ asset('asstes/image/faq/faq-banner-mibile.jpg') }}"
             data-src="{{ asset('asstes/image/faq/faq-banner-mibile.png') }}" alt="" class="d-sm-none d-block lazy">
    </div>
    <!--Main end Breadcrumbs-->
    <!--faq content-->
    <div class="bn-faq-content bn-main-story">
        <div class="container">
            <div class="bn-faq-header">
                <h1>{{ __('footer.FAQ') }}</h1>
                <p class="bn-faq-text"> {!! __('faq.history', ['link'=>route('our_story') . '#bindia-history']) !!}</p>
                <p class="bn-faq-sub-heading">
                    {{ __('faq.our_cuisine') }}
                </p>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="bn-faq-text-item">
                        <h2>{{ __('faq.question_1') }}</h2>
                        <p>{{ __('faq.answer_1') }}</p>
                    </div>
                    <div class="bn-faq-text-item">
                        <h2>{{ __('faq.question_2') }}</h2>
                        <p>{{ __('faq.answer_2') }}</p>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="bn-faq-text-item">
                        <h2>{{ __('faq.question_3') }}</h2>
                        <p>{!! __('faq.answer_3') !!}</p>
                        <p>{{ __('faq.answer_3_I') }}</p>
                        <p>{{ __('faq.answer_3_II') }}</p>
                        <p>{{ __('faq.answer_3_III') }}</p>
                    </div>
                    {{--                    <div class="bn-faq-text-item">--}}
                    {{--                        <h2>{{ __('faq.question_4') }}</h2>--}}
                    {{--                        <p>{{ __('faq.answer_4') }}</p>--}}
                    {{--                    </div>--}}
                </div>
            </div>
            <div class="bn-faq-header bn-sub-header-faq">
                <p class="bn-faq-sub-heading">
                    {{ __('faq.our_kitchen_team') }}
                </p>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="bn-faq-text-item">
                        <h2>{{ __('faq.question_5') }}</h2>
                        <p>{{ __('faq.answer_5') }}</p>
                        <p>{{ __('faq.answer_5_I') }}</p>
                    </div>
                </div>
                {{--                <div class="col-lg-6 col-12">--}}
                {{--                    <div class="bn-faq-text-item">--}}
                {{--                        <h2>{{ __('faq.question_6') }}</h2>--}}
                {{--                        <p>{{ __('faq.answer_6') }}</p>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
            <div class="bn-faq-header bn-sub-header-faq">
                <p class="bn-faq-sub-heading">
                    {{ __('faq.our_food') }}
                </p>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="bn-faq-text-item">
                        <h2>{{ __('faq.question_7_i') }}</h2>
                        <p>{{ __('faq.answer_7_i') }}</p>
                    </div>
                    <div class="bn-faq-text-item">
                        <h2>{{ __('faq.question_7') }}</h2>
                        <p>{{ __('faq.answer_7') }}</p>
                    </div>
                    <div class="bn-faq-text-item">
                        <h2>{{ __('faq.question_8') }}</h2>
                        <p>{{ __('faq.answer_8') }}</p>
                    </div>
                    <div class="bn-faq-text-item">
                        <h2>{{ __('faq.question_9') }}</h2>
                        <p>{!! __('faq.answer_9') !!}</p>
                        {{--                        <p>{{ __('faq.answer_9_II') }}</p>--}}
                    </div>
                    <div class="bn-faq-text-item">
                        <h2>{{ __('faq.question_10') }}</h2>
                        <p>{{ __('faq.answer_10') }}</p>
                        <p>{{ __('faq.answer_10_I') }}</p>
                    </div>
                    <div class="bn-faq-text-item">
                        <h2>{{ __('faq.question_11') }}</h2>
                        <p>{{ __('faq.answer_11') }}</p>
                        <p>{{ __('faq.answer_11_I') }}</p>
                        <p>{{ __('faq.answer_11_II') }}</p>
                    </div>
                    <div class="bn-faq-text-item">
                        <h2>{{ __('faq.question_12') }}</h2>
                        <p>{{ __('faq.answer_12') }}</p>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="bn-faq-text-item">
                        <h2>{{ __('faq.question_13') }}</h2>
                        <p>{{ __('faq.answer_13') }}</p>
                    </div>
                    <div class="bn-faq-text-item">
                        <h2>{{ __('faq.question_14') }}</h2>
                        <p>{{ __('faq.answer_14') }}</p>
                    </div>
                    <div class="bn-faq-text-item">
                        <h2>{{ __('faq.question_15') }}</h2>
                        <p>{{ __('faq.answer_15') }}</p>
                    </div>
                    <div class="bn-faq-text-item">
                        <h2>{{ __('faq.question_16') }}</h2>
                        <p>{{ __('faq.answer_16') }}</p>
                        <p>{{ __('faq.answer_16_I') }}</p>
                    </div>
                    <div class="bn-faq-text-item">
                        <h2>{{ __('faq.question_17') }}</h2>
                        <p>{{ __('faq.answer_17') }}</p>
                    </div>
                    <div class="bn-faq-text-item">
                        <h2>{{ __('faq.question_18') }}</h2>
                        <p>{{ __('faq.answer_18') }}</p>
                        <p>{{ __('faq.answer_18_I') }}</p>
                    </div>
                    <div class="bn-faq-text-item">
                        <h2>{{ __('faq.question_19') }}</h2>
                        <p>{{ __('faq.answer_19') }}</p>
                    </div>
                    <div class="bn-faq-text-item">
                        <h2>{{ __('faq.question_20') }}</h2>
                        <p>{{ __('faq.answer_20') }}</p>
                    </div>

                </div>
            </div>
            <div class="bn-faq-header bn-sub-header-faq">
                <p class="bn-faq-sub-heading">
                    {{ __('faq.our_cooking') }}
                </p>
            </div>
            <div class="row">
                {{--                <div class="col-lg-6 col-12">--}}
                {{--                    <div class="bn-faq-text-item">--}}
                {{--                        <h2>{{ __('faq.question_21') }}</h2>--}}
                {{--                        <p>{{ __('faq.answer_21') }}</p>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <div class="col-lg-6 col-12">
                    <div class="bn-faq-text-item">
                        <h2>{{ __('faq.question_22') }}</h2>
                        <p>{{ __('faq.answer_22') }}</p>
                    </div>
                </div>
            </div>
            <div class="bn-faq-header bn-sub-header-faq">
                <p class="bn-faq-sub-heading">
                    {{ __('faq.packing_and_serving') }}
                </p>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="bn-faq-text-item">
                        {!! __('faq.new_section') !!}
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="bn-faq-text-item">
                        <h2>{!! __('faq.question_23') !!}</h2>
                        <p>{!! __('faq.answer_23', ['link' => route('order.food.reheat.pdf')]) !!}</p>
                    </div>

                    <div class="bn-faq-text-item">
                        <h2>{{ __('faq.question_24') }}</h2>
                        <p>{!! __('faq.answer_24') !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
