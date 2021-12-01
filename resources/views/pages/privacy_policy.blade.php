@extends('layouts.app')

@section('content')
    <!--Main Breadcrumbs-->
    <div class="bn-breadcrumb-policy bn-main-story">
        <img src="{{ asset('asstes/image/faq/privacy-polaicy-banner.jpg') }}"
             data-src="{{ asset('asstes/image/faq/privacy-polaicy-banner.png') }}" alt=""
             class="d-sm-block d-none lazy">
        <img src="{{ asset('asstes/image/faq/privacy-banner-mobile.jpg') }}"
             data-src="{{ asset('asstes/image/faq/privacy-banner-mobile.png') }}" alt="" class="d-sm-none d-block lazy">
    </div>
    <!--Main end Breadcrumbs-->
    <!--faq content-->
    <div class="bn-policy-content bn-main-story">
        <div class="container">
            <div class="bn-policy-header">
                <h1>{{ __('privacy_policy.h1') }}</h1>
                <p class="bn-policy-text">{{ __('privacy_policy.h1_description_1') }}</p>
            </div>

            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="bn-policy-text-item">
                        <h2>{{ __('privacy_policy.in_general') }}</h2>
                        <p>{{ __('privacy_policy.in_general_p_1') }}</p>
                        <p>{{ __('privacy_policy.in_general_p_2') }}</p>
                        <p>{{ __('privacy_policy.in_general_p_3') }}</p>
                        <ul>
                            <li>{{ __('privacy_policy.in_general_li_1') }}</li>
                            <li>{{ __('privacy_policy.in_general_li_2') }}</li>
                            <li>{{ __('privacy_policy.in_general_li_3') }}</li>
                            {{--                            <li>{{ __('privacy_policy.in_general_li_4') }}</li>--}}
                        </ul>
                        <p>{{ __('privacy_policy.in_general_p_4') }}</p>
                        <p>{{ __('privacy_policy.in_general_p_5') }}</p>
                    </div>
                    <div class="bn-policy-text-item">
                        <h2>{{ __('privacy_policy.data_controller') }}</h2>
                        <p>{{ __('privacy_policy.data_controller_description') }}</p>
                        <p>
                            <span>{{ __('privacy_policy.contact_info') }}</span>
                            <span>Bindia Holding ApS</span>
                            <span>Hvidovrevej 80E</span>
                            <span>2650 Hvidovre</span>
                            <span>Phone: (+45) 30 25 88 38</span>
                            <span><a href="mailto:bindia@bindia.dk">bindia@bindia.dk</a></span>
                        </p>

                    </div>
                    <div class="bn-policy-text-item">
                        <h2>{{ __('privacy_policy.processing_personal_data') }}</h2>
                        <p>{{ __('privacy_policy.personal_data_p_1') }}</p>
{{--                        <p>--}}
{{--                            <span>{{ __('privacy_policy.personal_data_p_2') }}</span>--}}
{{--                            {{ __('privacy_policy.point1_description') }}--}}
{{--                        </p>--}}
                        <ul>
                            <li>{{ __('privacy_policy.description_point_1_li_1') }}</li>
                            <li>{{ __('privacy_policy.description_point_1_li_2') }}</li>
{{--                            <li>{{ __('privacy_policy.description_point_1_li_3') }}</li>--}}
                        </ul>
                        <p>{{ __('privacy_policy.personal_data_p_3') }}</p>
                        <p>{{ __('privacy_policy.personal_data_p_4') }}</p>
                        <p>{{ __('privacy_policy.personal_data_p_5') }}</p>
                        <p>{{ __('privacy_policy.personal_data_p_6') }}</p>

                        <h2 id="cp">{{ __('privacy_policy.cookie_heading') }}</h2>
                        <p>{!! __('privacy_policy.cookie_heading_p1') !!}</p>
                        <p>{!! __('privacy_policy.cookie_heading_p2') !!}</p>

{{--                        <p>--}}
{{--                            <span>{{ __('privacy_policy.personal_data_p_7') }}</span>--}}
{{--                            {{ __('privacy_policy.point2_description') }}--}}
{{--                        </p>--}}
                        <ul>
                            <li>{{ __('privacy_policy.description_point2_li_1') }}</li>
                            <li>{{ __('privacy_policy.description_point2_li_2') }}</li>
                            <li>{{ __('privacy_policy.description_point2_li_3') }}</li>
                        </ul>
                        <p>{{ __('privacy_policy.description_point2_p_1') }}</p>
                    </div>

                </div>
                <div class="col-lg-6 col-12">
                    <div class="bn-policy-text-item">
                        <h2>{{ __('privacy_policy.job_applications') }}</h2>
                        <p>{{ __('privacy_policy.job_applications_p') }}</p>
                        <ul>
                            <li>{{ __('privacy_policy.job_applications_li_1') }}</li>
                        </ul>
                        <p>{{ __('privacy_policy.job_applications_li_2') }}</p>
                        <p>{{ __('privacy_policy.job_applications_li_3') }}</p>
                        <p>{{ __('privacy_policy.job_applications_li_4') }}</p>
                    </div>
                    <div class="bn-policy-text-item">
                        <h2>{{ __('privacy_policy.your_rights') }}</h2>
                        <p>{{ __('privacy_policy.your_rights_p_1') }}</p>
                        <p>{{ __('privacy_policy.your_rights_p_2') }}</p>
                        <p>{{ __('privacy_policy.your_rights_p_3') }}</p>
                        <p>{{ __('privacy_policy.your_rights_p_4') }}</p>
                    </div>
                    <div class="bn-policy-text-item">
                        <h2>{{ __('privacy_policy.security') }}</h2>
                        <p>{{ __('privacy_policy.security_p') }}</p>
                    </div>
                    <div class="bn-policy-text-item">
                        <h2>{{ __('privacy_policy.appeal') }}</h2>
                        <p>{{ __('privacy_policy.appeal_p_1') }}</p>
                        <p>{!!  __('privacy_policy.appeal_p_2', ['link' => route('contact')]) !!}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
