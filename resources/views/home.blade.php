@extends('layouts.app')

@section('content')
    <!--Main Banner-->
    <div class="bn-slider bg-transparent bn-animation-banner">
        <div class="d-sm-block d-none bn-slider-ds-img">
            <img class="bn-image-index bn-image-desktop lazy" src="{{ asset('asstes/image/item2.png') }}"
                 data-src="{{ asset('asstes/image/slider-image.png') }}" alt="">
        </div>
        <div class="d-sm-none d-block bn-slider-ds-img">
            <img class="bn-image-index lazy" src="{{ asset('asstes/image/item2.png') }}"
                 data-src="{{asset('asstes/image/slider-mobile.png')}}" alt="">
        </div>
    </div>
    <!--End Main Banner-->
    <!--reviwe Box-->
    <div class="bn-review-box">
        <div class="container">
            <div class="row text-center">
                <div class="col-xl-5 col-lg-4 col-md-4 col-sm-4 col-4" data-bs-toggle="modal"
                     data-bs-target="#bn-review-box">
                    <div class="bn-star-box">
                        <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                            class="fas fa-star"></i> <i class="fas fa-star"></i>
                        <small>{{ $feedbacks->first()->shortName() }}
                            , {{ $feedbacks->first()->time->format(config('app.date_format')) }}</small>
                    </div>
                    <div class="bn-text-review">
                        <i>
                            <span>&#10075;</span><span>&#10075;</span>
                            {{ $feedbacks->first()->limitedComment() }}
                            <span>&#10076;</span><span>&#10076;</span>
                        </i>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-5 col-sm-5 col-5 text-center">
                    <div class="bn-review-box-img">
                        <img class="bn-logo-discount" src="{{asset('asstes/image/Artwork%2020.svg')}}" alt=""
                             onclick="window.open('https://www.findsmiley.dk/573516')" style="cursor: pointer">
                        <a href='https://www.findsmiley.dk/Sider/Search.aspx?k=bindia#Default=%7B%22k%22%3A%22bindia%22%7D#e8e7d2d7-6d66-4e68-992b-9f5560ce8a0b=%7B%22k%22%3A%22bindia%22%2C%22r%22%3A%5B%7B%22n%22%3A%22FindSmileyItemType%22%2C%22t%22%3A%5B%22%5C%22%C7%82%C7%8244657461696c%5C%22%22%5D%2C%22o%22%3A%22OR%22%2C%22k%22%3Afalse%2C%22m%22%3A%7B%22%5C%22%C7%82%C7%8244657461696c%5C%22%22%3A%22Detail%22%7D%7D%5D%7D'
                           target="_blank">
                            <img class="bn-smile" src="{{asset('asstes/image/Smile-img.svg')}}" alt="">
                        </a>
                        {{--                        <img class="google-review" src="{{asset('asstes/image/rating-review.png')}}" alt="">--}}
                    </div>

                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 text-center">
                    <div class="bn-review-box-img text-center">
                        <a href="https://www.trustpilot.com/review/www.bindia.dk" target="_blank">
                            <img class="bn-trust-review-img" src="{{asset('asstes/image/trust-review.png')}}"
                                 alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End reviwe Box-->
    <!--button mobile -->
    <div class="bn-button-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="mt-4"><a href="{{ route('takeaway') }}" class="btn btn-dark d-block">Order Take Away</a>
                    </h2>
                </div>
            </div>

        </div>
    </div>
    <!--Portfolio-->
    <div class="bn-portfolio-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" data-aos="fade-up" data-aos-duration="3000">
                    <img src="{{ asset('asstes/image/item2.png') }}"
                         data-src="{{ asset('asstes/image/home-one-banner.png') }}" class="lazy" alt="">
                </div>
                <div class="col-lg-6 col-sm-6" data-aos="fade-up" data-aos-duration="3000">
                    <img src="{{ asset('asstes/image/item2.png') }}"
                         data-src="{{ asset('asstes/image/home-two-banner.png') }}" alt="" class="lazy">
                </div>
                <div class="col-lg-6 col-sm-6" data-aos="fade-up" data-aos-duration="3000">
                    <div class="bn-link-image-box">
                        <img src="{{ asset('asstes/image/item2.png') }}"
                             data-src="{{ asset('asstes/image/home-three-banner.png') }}" alt="" class="lazy">
                        <div class="bn-menu-b-box">
                            <ul class="list-unstyled">
                                @foreach(config('shops') as $shop=>$array)
                                    <li><a class="text-white"
                                           href="{{ route(strtolower($shop)) }}">{!! $array['long_name'] !!}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" data-aos="fade-up" data-aos-duration="3000">
                    <img src="{{ asset('asstes/image/item2.png') }}"
                         data-src="{{ asset('asstes/image/home-four-banner.png') }}" alt="" class="lazy">
                </div>
            </div>
        </div>
    </div>
    <!--End Portfolio-->

    <!-- My last Order popup -->
    <div class="modal fade" id="bn-review-box" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @foreach($feedbacks as $feedback)
                    <div class="container">
                        <div class="bn-left-review-box float-start">
                            @for($x=0; $x<=12; $x++)
                                @if(!blank($feedback->{'question_' . $x}) && !str_starts_with(trim($feedback->{'question_' . $x}), 'Tell us what') && !str_starts_with(trim($feedback->{'question_' . $x}), 'May we use'))
                                    <span
                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width:100%">{{ $feedback->{'question_' . $x} }}</span>
                                @endif
                            @endfor
                        </div>
                        <div class="bn-right-review-box float-end">
                            @for($x=0; $x<=12; $x++)
                                @if(!blank($feedback->{'question_' . $x}) && !str_starts_with(trim($feedback->{'question_' . $x}), 'Tell us what') && !str_starts_with(trim($feedback->{'question_' . $x}), 'May we use'))
                                    <span
                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width:100%">
                                        @if($feedback->{'question_' . $x . '_answer'} === '-1')
                                            N/A
                                        @elseif($feedback->{'question_' . $x . '_answer'} === 'rating_5')
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        @else
                                            {{ $feedback->{'question_' . $x . '_answer'} }}
                                        @endif
                                    </span>
                                @endif
                            @endfor
                        </div>
                        <div class="clearfix"></div>
                        <div class="bn-review-footer">
                            @for($x=0; $x<=12; $x++)
                                @if(str_starts_with(trim($feedback->{'question_' . $x}), 'Tell us what'))
                                    <span>{{ $feedback->{'question_' . $x . '_answer'} }}</span>
                                @endif
                            @endfor
                        </div>
                        <div class="bn-last-footer-review">
                            {{ $feedback->shortName() }}
                            , {{ $feedback->time->format(config('app.date_format')) }} {!! shop($feedback->shop)->long_name ?? '' !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
