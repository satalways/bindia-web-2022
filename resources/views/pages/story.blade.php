@extends('layouts.app')

@section('content')
    <!--Main Breadcrumbs-->
    <div class="bn-breadcrumb-our-story bn-main-story">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-3">
                    <div class="bn-text-coma float-end">
                        <span>,,</span>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-7 col-9">
                    <div class="bn-breadcrumb-text">
                        <h1>{{ __('story.question') }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Main end Breadcrumbs-->

    <!--Our story-->
    <div class="bn-our-story bn-main-story">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-6">
                    <div class="bn-image-chef-box">
                        <img src="{{ asset('asstes/image/our-story/chef-sulman.jpg') }}"
                             data-src="{{ asset('asstes/image/our-story/chef-sulman.png') }}" class="lazy" alt="">
                        <div class="bn-image-title">
                            <p>Amer Sulman<br>{{ __('story.chef') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-7 col-12">
                    <div class="bn-heading-title">
                        <h2>{{ __('story.meet_the_chef') }}</h2>
                    </div>
                    <div class="bn-text-paragraph">
                        <p>
                            {!! __('story.chef_story_1') !!}
                        </p>
                        <p>
                            {!! __('story.chef_story_2') !!}
                        </p>
                        <p>
                            {!! __('story.chef_story_3') !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--banner image-->
    <div>
        <div>
            <img src="{{ asset('asstes/image/our-story/restaurant-story.jpg') }}"
                 data-src="{{ asset('asstes/image/our-story/restaurant-story.png') }}" class="lazy" alt="">
        </div>
    </div>
    <!--Binda History-->
    <div id="bindia-history" class="bn-history-box-content bn-main-story">
        <div class="container">
            <div class="row bn-history-box">
                <div class="col-12">
                    <div class="bn-history-header">
                        <h2>{{ __('story.history_bindia') }}</h2>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="bn-history-paragraph">
                        <p>
                            {!! __('story.history_1') !!}
                        </p>
                        <p>
                            {!! __('story.history_2') !!}
                        </p>
                        <p>
                            {!! __('story.history_3') !!}
                        </p>
                        <p>
                            {!! __('story.history_4') !!}
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="bn-history-paragraph">
                        <p>
                            {!! __('story.history_5') !!}
                        </p>
                        <p>
                            {!! __('story.history_6') !!}
                        </p>
                        <p>
                            {!! __('story.history_7') !!}
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
