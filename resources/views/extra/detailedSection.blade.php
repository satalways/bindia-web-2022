@extends('layouts.app')

@section('content')
    <!--Main Breadcrumbs-->
    <div class="bn-breadcrumbs-take-away position-relative bn-detailed-image-main">
        <div>
            <img src="{{ asset('asstes/image/faq/detailed.jpg') }}" class="d-none d-lg-block" alt="">
            <img src="{{ asset('asstes/image/faq/detailed-curries-mobile.jpg') }}" class="d-block d-lg-none" alt="">
            <span id="bn-take-away-price"></span>
        </div>
    </div>
    <!--End Main Banner-->
    <!--detailed section-->
    <div class="bn-take-away-item bn-detailed-new-item bn-main-story">
        <div class="container">
            <h1>Bindas mad</h1>
            <div class="row">
                <div class="col-lg-3">
                    <div class="bn-left-side-bar">
                        <ul class="list-unstyled">
                            @foreach(config('order.sections') as $section)
                                <li class="">
                                    <a href="{{ route('detailed.section', [\Str::slug($section['name'])]) }}"
                                       class="{{ $sectionSlug==\Str::slug($section['name'])?'active':'' }}">{{ $section['name'] }}</a>
                                    @if($sectionSlug==\Str::slug($section['name']) && !blank($subSection))
                                        <ul class="list-unstyled border-0">
                                            @foreach($subSection as $subSection1)
                                                <li><a href="{{ route('detailed.sub.section', [\Str::slug($section['name']), \Str::slug($subSection1)]) }}">{{ $subSection1 }}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 bn-right-side-bar-product">
                    <div class="bn-detailed-box-new">
                        <h2>{{ $currentSection['name'] ?? 'Curries' }}</h2>
                        <p>Ordet ???curry??? er faktisk et engelsk ord, der stammer Indiens tid som britisk koloni og
                            henviser til et utal af retter i det indiske k??kken, der bedst kan klassificeres som former
                            for sovse, gryderetter eller stuvninger.</p>
                        <p>I Sydindien finder man fx ofte meget st??rke curries som den tomat-baserede og chili-fyldte
                            Madras curry, mens man i det nordlige Indien omkring de bjergrige omr??der ved Himalaya ofte
                            laver meget mildere curries som fx den velkendte Korma.</p>
                        <p>Nordp?? er der ogs?? tradition for at bruge et mix af n??dder og fr?? som en central del af
                            curry-tilberedningen. Dette g??r ikke kun curryen cremet og s??dlig, men n??ddeblandingen udg??r
                            samtidigt n??dvendige og n??rende kalorier for befolkningen i disse koldere egne.</p>
                        <p>I Indien er lige s?? mange k??kkener og kulinariske traditioner, som der er regioner, men man
                            kan ikke forestille ???Indien??? uden ???curry???.</p>
                    </div>
                    <span class="bn-footer-stopper"></span>
                </div>
            </div>
        </div>
    </div>
@endsection
