@extends('layouts.app')

@section('content')
    <div class="bn-breadcrumb-terms bn-main-story bn-product-top-content d-sm-block d-none">
        <div class="container">
            <img src="https://www.bindia.dk/asstes/image/take-away/butter-chicken.jpg" alt="" class="">
        </div>
    </div>

    <div class="bn-policy-content bn-main-story bn-product-page">
        <div class="container">
            <div class="bn-policy-header">
                <div class="row">
                    <div class="col-12">
                        <div class="float-end">
                            <a href="#" class="btn bg-dark bn-btn-one w-100 text-white pl-3" style="text-align: left;">
                                {{ __('global.order_now') }}
                            </a>
                        </div>

                        <h1 class="bn-product-page-heading">Butter Chicken <small>(500g)</small></h1>
                    </div>
                </div>
            </div>

            @if(testServer() || localhost())
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="bn-product-text-list">
                            <div class="bn-product-head">
                                <h4>Ingredients</h4>
                            </div>
                            <hr style="margin-bottom: 8px;">
                            <div class="bn-list-text">
                                <div class="float-start">
                                    Energi:
                                </div>
                                <div class="float-end">
                                    1247 kJ / 298 kcal
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <div class="bn-list-text">
                                <div class="float-start">
                                    Fedt:
                                </div>
                                <div class="float-end">
                                    9,9 g
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <div class="bn-list-text">
                                <div class="float-start">
                                    heraf m??ttede fedtsyrer:
                                </div>
                                <div class="float-end">
                                    1,1 g
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <div class="bn-list-text">
                                <div class="float-start">
                                    Kulhydrat:
                                </div>
                                <div class="float-end">
                                    41 g
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <div class="bn-list-text">
                                <div class="float-start">
                                    heraf sukkerarter:
                                </div>
                                <div class="float-end">
                                    1,6 g
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <div class="bn-list-text">
                                <div class="float-start">
                                    Kostfibre:
                                </div>
                                <div class="float-end">
                                    5,8 g
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <div class="bn-list-text">
                                <div class="float-start">
                                    Protein:
                                </div>
                                <div class="float-end">
                                    8,5 g
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <div class="bn-list-text">
                                <div class="float-start">
                                    Salt:
                                </div>
                                <div class="float-end">
                                    1,25 g
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <hr style="margin-top: 8px;">
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="bn-product-text-list">
                            <div class="bn-product-head">
                                <h4>Allergies</h4>
                            </div>
                            <hr style="margin-bottom: 8px;">
                            <div class="bn-list-text">
                                <div class="float-start">
                                    Energi:
                                </div>
                                <div class="float-end">
                                    1247 kJ / 298 kcal
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <div class="bn-list-text">
                                <div class="float-start">
                                    Fedt:
                                </div>
                                <div class="float-end">
                                    9,9 g
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <div class="bn-list-text">
                                <div class="float-start">
                                    heraf m??ttede fedtsyrer:
                                </div>
                                <div class="float-end">
                                    1,1 g
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <div class="bn-list-text">
                                <div class="float-start">
                                    Kulhydrat:
                                </div>
                                <div class="float-end">
                                    41 g
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <div class="bn-list-text">
                                <div class="float-start">
                                    heraf sukkerarter:
                                </div>
                                <div class="float-end">
                                    1,6 g
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <div class="bn-list-text">
                                <div class="float-start">
                                    Kostfibre:
                                </div>
                                <div class="float-end">
                                    5,8 g
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <div class="bn-list-text">
                                <div class="float-start">
                                    Protein:
                                </div>
                                <div class="float-end">
                                    8,5 g
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <div class="bn-list-text">
                                <div class="float-start">
                                    Salt:
                                </div>
                                <div class="float-end">
                                    1,25 g
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <hr style="margin-top: 8px;">
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="bn-product-text-list">
                            <div class="bn-product-head">
                                <h4>N??ringsindhold <small>pr. 100g</small></h4>
                            </div>
                            <hr style="margin-bottom: 8px;">
                            <div class="bn-list-text">
                                <div class="float-start">
                                    Energi:
                                </div>
                                <div class="float-end">
                                    1247 kJ / 298 kcal
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <div class="bn-list-text">
                                <div class="float-start">
                                    Fedt:
                                </div>
                                <div class="float-end">
                                    9,9 g
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <div class="bn-list-text">
                                <div class="float-start">
                                    heraf m??ttede fedtsyrer:
                                </div>
                                <div class="float-end">
                                    1,1 g
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <div class="bn-list-text">
                                <div class="float-start">
                                    Kulhydrat:
                                </div>
                                <div class="float-end">
                                    41 g
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <div class="bn-list-text">
                                <div class="float-start">
                                    heraf sukkerarter:
                                </div>
                                <div class="float-end">
                                    1,6 g
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <div class="bn-list-text">
                                <div class="float-start">
                                    Kostfibre:
                                </div>
                                <div class="float-end">
                                    5,8 g
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <div class="bn-list-text">
                                <div class="float-start">
                                    Protein:
                                </div>
                                <div class="float-end">
                                    8,5 g
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <div class="bn-list-text">
                                <div class="float-start">
                                    Salt:
                                </div>
                                <div class="float-end">
                                    1,25 g
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <hr style="margin-top: 8px;">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="bn-policy-text-item">
                            <p>Bindias Lamb Madras er vores chefkoks st??rke hyldest til Sydindien ??? og det sundeste p??
                               menuen.</p>
                        </div>
                        <div class="bn-policy-text-item">
                            <h2>Den sydindiske di??t </h2>
                            <p>Lamb Madras har sit navn fra sit oprindelsessted, nemlig den sydindiske millionby Madras,
                               i dag ogs?? kendt som Chennai. If??lge sagnet fik retten sit navn, da engelske k??bm??nd
                               ankom til byen i 1640.</p>
                            <p>I Sydind ien spiser man typisk meget st??rkere mad end i Nordindien. Derfor er Lamb Madras
                               meget st??rkere end vores nordindiske curries som vores Korma og Butter Curry. Faktisk er
                               Bindias Madras, det st??rkeste vi har p?? menukortet.</p>
                        </div>
                        <div class="bn-policy-text-item">
                            <h2>Den sydindiske di??t</h2>
                            <p>I flere sydindiske stater, er der mange religi??se og spirituelle f??llesskaber og
                               traditioner, som ikke spiser k??d. Den nok ???strengeste??? di??t finder man hos tilh??rerne af
                               Jain-religionen. Her forbydes ikke kun k??d, fisk, ??g samt andre animalske produkter, men
                               ogs?? rodfrugter, hvilket derfor ekskluderer mange hyppigt anvendte ingredienser i det
                               indiske k??kken som gurkemeje, ingef??r, hvidl??g og l??g; sidstn??vnte er noget n??r et
                               grundelement i det nordindiske k??kken.</p>
                            <p>Selvom det langt fra er flertallet, der tilh??rer denne religi??se minoritet, har deres
                               ??ldgamle forskrifter haft stor indflydelse p?? mange regionale k??kkener. Derfor fokuserer
                               det sydindiske k??kken p?? ingredienser som tomater, kokos, tamarind, sennepsfr??,
                               sennepsblade og, ikke mindst, karryblade, der, trods navnet, ikke har nogen direkte
                               forbindelse til karrypulver.</p>
                        </div>
                        <br>
                        <div class="bn-policy-text-item">
                            <h2>???Den s??de Neem???</h2>
                            <p>Karryblade giver maden noter af noget, der minder om lime, basilikum og citrus, men de er
                               mindst lige s?? kendte for deres helbredende egenskaber. Disse blade er fx rige p?? en
                               r??kke vitaminer samt jern og calcium. De bliver derfor brugt flittigt i Ayurveda til
                               behandling af en r??kke lidelser. </p>
                            <p>Karrytr??et bliver ogs?? kaldt ???den s??de Neem??? med reference til neemtr??et, der har en hel
                               central ??? og n??rmest hellig ??? rolle i Ayurveda. Alt lige fra tr??ets blade, frugt, kerner,
                               blomster, r??dder og bark bruges i Ayurveda til behandlingen af en lang r??kke sygdomme. I
                               nyere tid, er dette tr?? derfor blevet et fokusomr??de indenfor moderne medicin, hvor mere
                               end 140 aktive stoffer er blevet isoleret fra alle steder p?? dette fantastiske tr??. Men
                               selvom neemtr??et har s?? mange fantastiske egenskaber, er dets blade generelt alt for
                               bitre til madlavning. Bladene fra karrytr??et, derimod, kan b??de bruges i madlavning og
                               som forebyggende medicin ??? derfor navnet ???den s??de Neem.???</p>
                            <p>Lamb Madras p?? Bindia-m??den???Min morfar var Ayurveda-l??ge??? fort??ller Bindias grundl??gger
                               og chefkok, Amer Suleman.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="bn-policy-text-item">
                            <p>
                                behandlinger var altid baseret p?? tilpasning af ens kost.??? Bindias madfilosofi hviler
                                derfor p?? en dyb respekt og forst??else for Ayurveda og kostens betydning for vores
                                sundhed og velv??re.
                            </p>
                            <p>???Jeg er meget inspireret af det Sydindiske k??kken, dets vegetariske fokus og har meget
                               stor respekt for kulturen og s??rligt ingredienser som kokos, tomat, karryblade,
                               tamarind???, fort??ller Amer Suleman. ???Smagen s??vel som sundheden, der ligger i disse
                               ingredienser og retter er utroligt fascinerende. Min Madras er en hyldest til det
                               sydindiske k??kken og det sundeste, vi har p?? menukort</p>
                            <p>Smagen s??vel som sundheden skyldes is??r karrybladene, men ogs?? asafoetida, som er et
                               krydderi, der udvindes af planten Ferula Asafoetida (p?? dansk: Dyvelsdr??k).</p>
                            <p>Asafoetida har en masses sunde egenskaber, er fyldt med antioxidanter og bliver is??r
                               brugt til at hj??lpe med ford??jelsen. Det bruges ofte i dal-retter. Herudover fungerer
                               Asafoetida som smagsforst??rker og er derfor en uundv??rlig del i de tempereringer, som
                               vores Lamb Madras gennemg??r.</p>
                            <p>Temperering er en indiske krydrings-teknik, hvor knuste krydderier lynsteges ved
                               brandende varme temperaturer. N??r krydderierne rammer det kogende fedtstof, uds??ttes de
                               for s??dan et varme-chok at de straks udskiller deres essentielle olier og dermed masser
                               af smag.</p>
                            <p>Sammen med hele karryblade, bruger vi desuden hele stegte chilier i vores Lamb Madras,
                               som, sammen med mere substans, giver en mere afrundet smag end bare chilipulver.</p>
                        </div>
                        <div class="bn-policy-text-item">
                            <h2>M??rt og l??kkert </h2>
                            <p>
                                Da inderne hverken spiser svine- eller oksek??d af hensyn til landets to st??rste
                                religioner Hinduismen og Islam, er de i stedet blevet specialister i lammek??d, med alt
                                hvad det indeb??rer af unikke traditioner og tekniker, for at udv??lge det bedste k??d og
                                tilberede det bedst muligt. Hos Bindia har vi derfor klare retningslinjer for hvordan
                                lammek??det udv??lges og tilberedes.
                            </p>
                            <p>Vi bruger kun fritg??ende og gr??ssende lam fra New Zealand i vores Lamb Madras, da dette
                               k??d har den bedste lugt og smag og ikke indeholder for meget fedt. Vi g??r altid m??lrettet
                               efter ungt, og derfor m??rt, k??d, som vi selv sk??rer til efter alle kunstens regler, for
                               at s??rge for at slutproduktet er konsistent med vores standarder. </p>
                            <p>Herefter steger vi lammet sammen med en temperering af bl.a. ingef??r, nellikke og hvidl??g
                               i en stor gryde. Dette fjerner b??de den karakteristiske lugt af lam og giver k??det smag,
                               varme og karakter. Alt sammen gjort efter traditionelle procedurer.</p>
                        </div>
                        <div class="bn-policy-text-item">
                            <h2>Velbekomme!</h2>
                            <p>Smag vores Lamb Madras i din lokale Bindia p?? <u>??sterbro,</u> <u>N??rrebro,</u> <u>Frederiksberg,</u>
                                <u>Amager,</u> <u>Lyngby</u> og <u>S??borg</u> eller bestil den <u>her</u>.</p>
                        </div>
                    </div>
                </div>

                <div class="bn-product-button-order text-center">
                    <a href="#" class="btn bg-dark bn-btn-one w-100 text-white pl-3 text-center" style="text-align: left;">
                        {{ __('global.order_now') }}
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
