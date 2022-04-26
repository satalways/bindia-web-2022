@extends('layouts.app')

@section('content')

    <!--Main Breadcrumbs-->
    <div class="bn-breadcrumbs-take-away position-relative">
        <div>
            <img src="{{ asset('asstes/image/faq/deatailed-curries-butter.png') }}" class=" d-none d-sm-block" alt="">
            <img src="{{ asset('asstes/image/faq/deatailed-curries-butter.jpg') }}" class=" d-block d-sm-none" alt=""
                 style="margin-top: 62px;">
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
                            @foreach($orderSections as $orderSection)
                                <li>
                                    <a href="{{ route('detailed.section', [\Str::slug($orderSection['name'])]) }}">{{ $orderSection['name'] }}</a>
                                    @if($Section['name']==$orderSection['name'] && !blank($subSection))
                                        <ul class="list-unstyled border-0">
                                            @foreach($subSection as $subSection1)
                                                <li>
                                                    <a class="{{ \Str::slug($subSection1)==$subSectionSlug?'active':'' }}"
                                                       href="{{ route('detailed.sub.section', [$sectionSlug, \Str::slug($subSection1)]) }}">{{ $subSection1 }}</a>
                                                </li>
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
                        <h2>{{ $Section['name'] }}</h2>
                        <p>Butter Curryen (eller Makhani) fra Nordindien er efterhånden mere kendt i Vesten, end hvor
                            den faktisk stammer fra. Hos Bindia er den nok mest kendt fra vores Butter Chicken, som har
                            været en anmelder-darling og publikumsfavorit siden dag 1.</p>
                        <p>”Himmelsk” skrev Jyllandspostens anmelder om Bindias Butter Chicken, mens AOKs anmelder mente
                            at vores Butter Chicken ”burde være på listen over ulovlige, vanedannende stoffer”.</p>
                        <p>I vores Butter Curry har vi et helt særligt fokus på nødder; især cashew. Ligesom i vores
                            Korma Curry, har vi udviklet det helt rigtige mix af nødder og frø til vores Butter Curry,
                            som ikke kun tilføjer retten sunde kalorier, men samtidigt giver en lækker, cremet
                            konsistens. Sammen med de syrlige tomater og honningen, er nøddemixet ydermere med til at
                            give vores Butter Curry den helt særlige sødme med de subtile nøddeagtige nuancer.</p>
                        <p>I tilberedningen af Bindias Butter findes der dog flere medvirkende faktorer til dens
                            popularitet - bl.a. i den sofistikerede og opmærksomme tilgang til opvarmningen af
                            Curryen.</p>
                        <p>På den helt rigtige temperatur, sker der nemlig en kemisk reaktion mellem fedstoffet og
                            tomaterne, der får smagen til at gå op i en højere enhed. Rammer man aldrig denne
                            temperatur, opnår man slet ikke samme smag, mens man risikerer at ruinere retten totalt,
                            hvis man går over, advarer Bindias chefkok. </p>
                        <p>Bindias Butter Curry gennemgår hele fire forskellige tempererings-faser i løbet af dens
                            tilblivelse og vi bruger tilmed en masser krydderier, som man ikke finder i en Butter Curry
                            andre steder.</p>
                        <P>I alt anvender vi 23 forskellige ingredienser i denne publikumsfavorit; lige fra curryens
                            base af tomater, ingefær og hvidløg til mere overraskende indhold som birkes og
                            lakridsrod.</P>
                        <P>”Resultatet er vanedannende lækkert!” mente Berlingske Tidenes anmelder i hvert fald, men vi
                            synes du skal prøve den selv.</P>
                    </div>
                    <span class="bn-footer-detailed">
                        <a href="#" class="btn bg-dark bn-btn-one text-white pl-3">
                            Order Now
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
