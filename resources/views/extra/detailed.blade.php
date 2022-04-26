@extends('layouts.app')

@section('content')
    <div class="bn-breadcrumbs-take-away position-relative bn-detailed-image-main">
        <div>
            <img src="{{ asset('asstes/image/faq/detailed.jpg') }}" class="d-none d-lg-block" alt="">
            <img src="{{ asset('asstes/image/faq/detailed-curries-mobile.jpg') }}" class="d-block d-lg-none" alt="">
            <span id="bn-take-away-price"></span>
        </div>
    </div>

    <div class="bn-take-away-item bn-detailed-new-item bn-main-story">
        <div class="container">
            <h1>Bindas mad</h1>
            <div class="row">
                <div class="col-lg-3">
                    <div class="bn-left-side-bar">
                        <ul class="list-unstyled">
                            @foreach(config('order.sections') as $section)
                            <li class="">
                                <a href="{{ route('detailed.section', [\Str::slug($section['name'])]) }}">{{ $section['name'] }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 bn-right-side-bar-product">
                    <div class="bn-detailed-box-new">
                        <p>Inspireret af en familiebaggrund i simpelt landbrug og jord-til-bord-principper samt Ayurvedisk medicin, åbnede vi den første Bindia ved Trianglen i København i 2003. Vi har lige siden simplificeret og struktureret det indiske køkken og fået det ind i danskernes hverdag. Simpelt, åbent, tilgængeligt.</p>
                        <p>Med udgangspunkt i Punjab-køkkenet og med en back-to-basics-tilgang, fokuserer vi på gode råvarer og traditionelle madlavningsteknikker. Dette er blandt andet en medvirkende årsag til, at Bindia intet madspild har.</p>
                        <p>Blandt de indiske madlavningsteknikker, finder man den helt essentielle ’temperering’, som er en krydrings-teknik fra Indien, hvor knuste krydderier lynsteges separat ved brandende varme temperaturer. Når krydderierne rammer det kogende fedtstof, udsættes de for sådan et varme-chok, at de straks udskiller deres essentielle olier og dermed masser af smag. Samtlige af Bindias retter gennemgår en eller flere tempereringer, der er med til at få den særegne smag til at træde frem i hver en ret. </p>
                        <p>Herudover bruger vi hverken konserveringsmidler, tilsætningsstoffer, farvestoffer eller friture i vores madlavning. I 2015 blev den første take-away-kæde med Det Økologiske Spisemærke.</p>
                    </div>
                    <span class="bn-footer-stopper"></span>
                </div>
            </div>
        </div>
    </div>
@endsection
