@extends('layouts.app')

@section('content')
    <!--Main Breadcrumbs-->
    <div class="bn-breadcrumb-terms bn-main-story">
        <img src="{{ asset('asstes/image/faq/terms-banner.png') }}" alt="" class="d-sm-block d-none">
        <img src="{{ asset('asstes/image/faq/trems-mobile.png') }}" alt="" class="d-sm-none d-block">
    </div>
    <!--Main end Breadcrumbs-->
    <!--faq content-->
    <div class="bn-policy-content bn-main-story">
        <div class="container">
            <div class="bn-policy-header">
                <h1>{{ __('terms.term_sale_delivery') }}</h1>
                <p class="bn-policy-text">{{ __('terms.term_online_ordering') }}</p>
            </div>

            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="bn-policy-text-item">
                        <h2>{{ __('terms.using_online_ordering') }}</h2>
                        <p>{{ __('terms.online_ordering_description') }}</p>
                    </div>
                    <div class="bn-policy-text-item">
                        <h2>{{ __('terms.payment') }} </h2>
                        <p>{{ __('terms.payment_description_1') }}</p>
                        <p>{{ __('terms.payment_description_2') }}</p>
                    </div>
                    <div class="bn-policy-text-item">
                        <h2>{{ __('terms.security_privacy') }} </h2>
                        <p>{{ __('terms.sec_priv_description_1') }}
                            <br> {{ __('terms.sec_priv_description_2') }}
                            <br> {{ __('terms.sec_priv_description_3') }}</p>
                    </div>
                    <div class="bn-policy-text-item">
                        <h2>{{ __('terms.pick_up_orders') }}</h2>
                        <p>{{ __('terms.pick_up_order_description_1') }}
                            <br>
                            {{ __('terms.pick_up_order_description_2') }}
                            <br>
                            {{ __('terms.pick_up_order_description_3') }}
                        </p>
                    </div>
                    <div class="bn-policy-text-item">
                        <h2>{{ __('terms.delivery_orders') }}</h2>
                        <p>
                            {!! __('terms.delivery_order_description_1') !!}
                            <br>
                            {{ __('terms.delivery_order_description_2') }}
                            <br>
                            {!! __('terms.delivery_order_description_3') !!}
                            <br>
                            {!! __('terms.delivery_order_description_4') !!}
                            <br>
                            {!! __('terms.delivery_order_description_5') !!}
                            <br>
                            {!! __('terms.delivery_order_description_6') !!}
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="bn-policy-text-item">
                        <h2>{{ __('terms.cancellation_returns') }} </h2>
                        <p>
                            {{ __('terms.cancel_return_description_1') }}
                        </p>
                    </div>
                    <div class="bn-policy-text-item bn-policy-text-ex">
                        <h2>{{ __('terms.portion_sizes') }} </h2>
                        <p>
                            {{ __('terms.portion_size_description_1') }}
                        </p>
                        <p>{{ __('terms.portion_size_description_2') }}</p>
                        <br>
                        <ul>
                            <li>Tandoori Chicken: {{ __('global.approx') }} 300 g.</li>
                            <li>Biryanies: {{ __('global.approx') }} 500 g.</li>
                            <li>Platters: {{ __('global.approx') }} 500 g.</li>
                            <li>Curries: {{ __('global.approx') }} 400 g.</li>
                            <li>{{ __('terms.veg') }}: {{ __('global.approx') }} 400 g.</li>
                            <li>{{ __('terms.pilao_rice') }}: {{ __('global.approx') }} 225 g.</li>
                            <li>Raita: {{ __('global.approx') }} 150 g.</li>
                            <li>Mango Chutney: {{ __('global.approx') }} 150 g.</li>
                            <li>Chopped Salad: {{ __('global.approx') }} 150 g.</li>
                        </ul>
                        <br>
                        <p>{{ __('terms.portion_size_description_3') }}</p>
                    </div>
                    <div class="bn-policy-text-item">
                        <h2>{{ __('terms.spiciness_level:') }} </h2>
                        <p>
                            {{ __('terms.spiciness_description_1') }}
                            <br>
                            {{ __('terms.spiciness_description_2') }}
                        </p>
                    </div>
                    <div class="bn-policy-text-item">
                        <h2>{{ __('terms.reheating_the_food:') }} </h2>
                        <p>
                            {!! __('terms.reheating_food_description', ['link' => route('order.food.reheat.pdf')]) !!}
                        </p>
                    </div>
                    <div class="bn-policy-text-item">
                        <h2>{{ __('terms.feedback_complaints') }}</h2>
                        <p>
                            {{ __('terms.feedback_complaints_description_1') }}
                            <br>
                            {{ __('terms.feedback_complaints_description_2') }}
                            <br>
                            {{ __('terms.feedback_complaints_description_3') }}
                            <br>
                            {!! __('terms.feedback_complaints_description_4') !!}
                            <br>
                            {!! __('terms.feedback_complaints_description_5') !!}
                            <br>
                            {!! __('terms.feedback_complaints_description_6') !!}
                        </p>
                    </div>
                    <div class="bn-policy-text-item">
                        <h2>{{ __('terms.disclaimer') }}</h2>
                        <p>{{ __('terms.disclaimer_description') }}</p>
                    </div>
                    <div class="bn-policy-text-item">
                        <h2>{{ __('terms.abuse') }}</h2>
                        <p>
                            {{ __('terms.abuse_description_1') }}
                            <br>
                            {{ __('terms.abuse_description_2') }}
                        </p>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
