@extends('layouts.app')

@section('content')
    <div class="bn-policy-content bn-main-story bn-product-page">
        <div class="container">

            <div class="bn-policy-header mb-lg-4">
                <div class="row">
                    <div class="col-12">
                        <h1 class="bn-product-page-heading text-center">{{ $item->name }}</h1>
                    </div>
                </div>

                <div class="bn-breadcrumb-terms bn-main-story d-sm-block d-none">
                    <div class="container">
                        <img src="{{ $item->image }}" alt="" class="">
                    </div>
                </div>
                <div class="bn-product-button-order text-center">
                    <a href="{{ route('takeaway', ['buy' =>  $item->id ]) }}"
                       class="btn bg-dark bn-btn-one w-100 text-white pl-3 text-center"
                       style="text-align: left;">
                        {{ __('global.order_now') }}
                    </a>
                </div>
            </div>

            <div class="row">
                @if(isset($ing['label']))
                    <div class="col-lg-4 col-12">
                        <div class="bn-product-text-list">
                            <div class="bn-product-head">
                                <h4>Ingredients</h4>
                            </div>
                            <hr style="margin-bottom: 8px;">
                            @foreach($ing['label'] as $key => $label)
                                <div class="bn-list-text">
                                    <div class="float-start">
                                        {{ $label }}:
                                    </div>
                                    <div class="float-end">
                                        {{ $ing['value'][$key] }}
                                    </div>
                                    <span class="clearfix"></span>
                                </div>
                            @endforeach
                            <hr style="margin-top: 8px;">
                        </div>
                    </div>
                @endif

                @if(isset($all['label']))
                    <div class="col-lg-4 col-12">
                        <div class="bn-product-text-list">
                            <div class="bn-product-head">
                                <h4>Allergies</h4>
                            </div>
                            <hr style="margin-bottom: 8px;">
                            @foreach($all['label'] as $key => $label)
                                <div class="bn-list-text">
                                    <div class="float-start">
                                        {{ $label }}:
                                    </div>
                                    <div class="float-end">
                                        {{ $all['value'][$key] }}
                                    </div>
                                    <span class="clearfix"></span>
                                </div>
                            @endforeach
                            <hr style="margin-top: 8px;">
                        </div>
                    </div>
                @endif

                @if(isset($nuts['label']))
                    <div class="col-lg-4 col-12">
                        <div class="bn-product-text-list">
                            <div class="bn-product-head">
                                <h4>Næringsindhold <small>pr. 100g</small></h4>
                            </div>
                            <hr style="margin-bottom: 8px;">
                            @foreach($nuts['label'] as $key => $label)
                                <div class="bn-list-text">
                                    <div class="float-start">
                                        {{ $label }}:
                                    </div>
                                    <div class="float-end">
                                        {{ $nuts['value'][$key] }}
                                    </div>
                                    <span class="clearfix"></span>
                                </div>
                            @endforeach
                            <hr style="margin-top: 8px;">
                        </div>
                    </div>
                @endif
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="bn-policy-text-item">
                        {!! $col1 !!}
                    </div>
                    {{--                        <div class="bn-policy-text-item">--}}
                    {{--                            <p>Bindias Lamb Madras er vores chefkoks stærke hyldest til Sydindien – og det sundeste på--}}
                    {{--                               menuen.</p>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="bn-policy-text-item">--}}
                    {{--                            <h2>Den sydindiske diæt </h2>--}}
                    {{--                            <p>Lamb Madras har sit navn fra sit oprindelsessted, nemlig den sydindiske millionby Madras,--}}
                    {{--                               i dag også kendt som Chennai. Ifølge sagnet fik retten sit navn, da engelske købmænd--}}
                    {{--                               ankom til byen i 1640.</p>--}}
                    {{--                            <p>I Sydind ien spiser man typisk meget stærkere mad end i Nordindien. Derfor er Lamb Madras--}}
                    {{--                               meget stærkere end vores nordindiske curries som vores Korma og Butter Curry. Faktisk er--}}
                    {{--                               Bindias Madras, det stærkeste vi har på menukortet.</p>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="bn-policy-text-item">--}}
                    {{--                            <h2>Den sydindiske diæt</h2>--}}
                    {{--                            <p>I flere sydindiske stater, er der mange religiøse og spirituelle fællesskaber og--}}
                    {{--                               traditioner, som ikke spiser kød. Den nok ’strengeste’ diæt finder man hos tilhørerne af--}}
                    {{--                               Jain-religionen. Her forbydes ikke kun kød, fisk, æg samt andre animalske produkter, men--}}
                    {{--                               også rodfrugter, hvilket derfor ekskluderer mange hyppigt anvendte ingredienser i det--}}
                    {{--                               indiske køkken som gurkemeje, ingefær, hvidløg og løg; sidstnævnte er noget nær et--}}
                    {{--                               grundelement i det nordindiske køkken.</p>--}}
                    {{--                            <p>Selvom det langt fra er flertallet, der tilhører denne religiøse minoritet, har deres--}}
                    {{--                               ældgamle forskrifter haft stor indflydelse på mange regionale køkkener. Derfor fokuserer--}}
                    {{--                               det sydindiske køkken på ingredienser som tomater, kokos, tamarind, sennepsfrø,--}}
                    {{--                               sennepsblade og, ikke mindst, karryblade, der, trods navnet, ikke har nogen direkte--}}
                    {{--                               forbindelse til karrypulver.</p>--}}
                    {{--                        </div>--}}
                    {{--                        <br>--}}
                    {{--                        <div class="bn-policy-text-item">--}}
                    {{--                            <h2>”Den søde Neem”</h2>--}}
                    {{--                            <p>Karryblade giver maden noter af noget, der minder om lime, basilikum og citrus, men de er--}}
                    {{--                               mindst lige så kendte for deres helbredende egenskaber. Disse blade er fx rige på en--}}
                    {{--                               række vitaminer samt jern og calcium. De bliver derfor brugt flittigt i Ayurveda til--}}
                    {{--                               behandling af en række lidelser. </p>--}}
                    {{--                            <p>Karrytræet bliver også kaldt ”den søde Neem” med reference til neemtræet, der har en hel--}}
                    {{--                               central – og nærmest hellig – rolle i Ayurveda. Alt lige fra træets blade, frugt, kerner,--}}
                    {{--                               blomster, rødder og bark bruges i Ayurveda til behandlingen af en lang række sygdomme. I--}}
                    {{--                               nyere tid, er dette træ derfor blevet et fokusområde indenfor moderne medicin, hvor mere--}}
                    {{--                               end 140 aktive stoffer er blevet isoleret fra alle steder på dette fantastiske træ. Men--}}
                    {{--                               selvom neemtræet har så mange fantastiske egenskaber, er dets blade generelt alt for--}}
                    {{--                               bitre til madlavning. Bladene fra karrytræet, derimod, kan både bruges i madlavning og--}}
                    {{--                               som forebyggende medicin – derfor navnet ”den søde Neem.”</p>--}}
                    {{--                            <p>Lamb Madras på Bindia-måden”Min morfar var Ayurveda-læge” fortæller Bindias grundlægger--}}
                    {{--                               og chefkok, Amer Suleman.</p>--}}
                    {{--                        </div>--}}

                </div>
                <div class="col-lg-6 col-12">
                    <div class="bn-policy-text-item">
                        {!! $col2 !!}
                    </div>

                    {{--                        <div class="bn-policy-text-item">--}}
                    {{--                            <p>--}}
                    {{--                                behandlinger var altid baseret på tilpasning af ens kost.” Bindias madfilosofi hviler--}}
                    {{--                                derfor på en dyb respekt og forståelse for Ayurveda og kostens betydning for vores--}}
                    {{--                                sundhed og velvære.--}}
                    {{--                            </p>--}}
                    {{--                            <p>”Jeg er meget inspireret af det Sydindiske køkken, dets vegetariske fokus og har meget--}}
                    {{--                               stor respekt for kulturen og særligt ingredienser som kokos, tomat, karryblade,--}}
                    {{--                               tamarind”, fortæller Amer Suleman. ”Smagen såvel som sundheden, der ligger i disse--}}
                    {{--                               ingredienser og retter er utroligt fascinerende. Min Madras er en hyldest til det--}}
                    {{--                               sydindiske køkken og det sundeste, vi har på menukort</p>--}}
                    {{--                            <p>Smagen såvel som sundheden skyldes især karrybladene, men også asafoetida, som er et--}}
                    {{--                               krydderi, der udvindes af planten Ferula Asafoetida (på dansk: Dyvelsdræk).</p>--}}
                    {{--                            <p>Asafoetida har en masses sunde egenskaber, er fyldt med antioxidanter og bliver især--}}
                    {{--                               brugt til at hjælpe med fordøjelsen. Det bruges ofte i dal-retter. Herudover fungerer--}}
                    {{--                               Asafoetida som smagsforstærker og er derfor en uundværlig del i de tempereringer, som--}}
                    {{--                               vores Lamb Madras gennemgår.</p>--}}
                    {{--                            <p>Temperering er en indiske krydrings-teknik, hvor knuste krydderier lynsteges ved--}}
                    {{--                               brandende varme temperaturer. Når krydderierne rammer det kogende fedtstof, udsættes de--}}
                    {{--                               for sådan et varme-chok at de straks udskiller deres essentielle olier og dermed masser--}}
                    {{--                               af smag.</p>--}}
                    {{--                            <p>Sammen med hele karryblade, bruger vi desuden hele stegte chilier i vores Lamb Madras,--}}
                    {{--                               som, sammen med mere substans, giver en mere afrundet smag end bare chilipulver.</p>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="bn-policy-text-item">--}}
                    {{--                            <h2>Mørt og lækkert </h2>--}}
                    {{--                            <p>--}}
                    {{--                                Da inderne hverken spiser svine- eller oksekød af hensyn til landets to største--}}
                    {{--                                religioner Hinduismen og Islam, er de i stedet blevet specialister i lammekød, med alt--}}
                    {{--                                hvad det indebærer af unikke traditioner og tekniker, for at udvælge det bedste kød og--}}
                    {{--                                tilberede det bedst muligt. Hos Bindia har vi derfor klare retningslinjer for hvordan--}}
                    {{--                                lammekødet udvælges og tilberedes.--}}
                    {{--                            </p>--}}
                    {{--                            <p>Vi bruger kun fritgående og græssende lam fra New Zealand i vores Lamb Madras, da dette--}}
                    {{--                               kød har den bedste lugt og smag og ikke indeholder for meget fedt. Vi går altid målrettet--}}
                    {{--                               efter ungt, og derfor mørt, kød, som vi selv skærer til efter alle kunstens regler, for--}}
                    {{--                               at sørge for at slutproduktet er konsistent med vores standarder. </p>--}}
                    {{--                            <p>Herefter steger vi lammet sammen med en temperering af bl.a. ingefær, nellikke og hvidløg--}}
                    {{--                               i en stor gryde. Dette fjerner både den karakteristiske lugt af lam og giver kødet smag,--}}
                    {{--                               varme og karakter. Alt sammen gjort efter traditionelle procedurer.</p>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="bn-policy-text-item">--}}
                    {{--                            <h2>Velbekomme!</h2>--}}
                    {{--                            <p>Smag vores Lamb Madras i din lokale Bindia på <u>Østerbro,</u> <u>Nørrebro,</u> <u>Frederiksberg,</u>--}}
                    {{--                                <u>Amager,</u> <u>Lyngby</u> og <u>Søborg</u> eller bestil den <u>her</u>.</p>--}}
                    {{--                        </div>--}}
                </div>
            </div>

            <div class="bn-product-button-order text-center">
                <a href="{{ route('takeaway', ['buy' =>  $item->id ]) }}"
                   class="btn bg-dark bn-btn-one w-100 text-white pl-3 text-center" style="text-align: left;">
                    {{ __('global.order_now') }}
                </a>
            </div>
        </div>
    </div>
@endsection
