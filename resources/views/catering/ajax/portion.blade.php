<form action="{{ route('catering.post') }}" method="post" id="form1">
    <input type="hidden" name="action" value="portionStep2">
    <input type="hidden" name="type" value="portion">
    <!--item Food box-->
    <div class="bn-take-away-item bn-catering-drink bn-portion-item">
        <div class="container">
            <div class="bn-drink-heading">
                <p>
                    <b>{{ __('catering.select_dishes', ['dishes' => config('catering.min_people')]) }}</b>
                    {{ config('catering.portion.price') }}
                    ,- {{ __('catering.per_person') }}
                </p>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="bn-left-side-bar sticky-sm-top">
                        <button type="button" class="btn bg-dark w-100 text-white mb-1"
                                onclick="window.location.href='{{ $back_link }}'">
                            {{ __('global.back') }}
                        </button>
                        <button type="button" class="btn bg-dark w-100 text-white" id="continueBtn">
                            {{ __('global.continue') }}
                        </button>
                    </div>
                </div>
                <div class="col-lg-9 bn-right-side-bar-product">
                    <div class="bn-toggle-content">
                        @foreach($curries as $item)
                            <div class="row">
                                <div class="col-md-4">
                                    <img class="bn-thumbnail-img" src="{{ $item->image_thumbnail }}" alt="">
                                </div>
                                <div class="col-md-5 bn-bg-product bn-border-right">
                                    <h2>{{ $item->name }}</h2>
                                    <p>{{ getCurrentLang()=='da'?$item->description_dk:$item->description_en }}</p>
                                    <div class="bn-icon">
                                        @if($item->dairy)
                                            <span>
                                                    <img src="{{ asset('asstes/image/take-away/milk.svg') }}" alt="">
                                                </span>
                                        @endif
                                        @if($item->gluten)
                                            <span>
                                                    <img src="{{ asset('asstes/image/take-away/Wheat.svg') }}" alt="">
                                                </span>
                                        @endif
                                        @if($item->nuts)
                                            <span>
                                                    <img src="{{ asset('asstes/image/take-away/Nut.svg') }}" alt="">
                                                </span>
                                        @endif
                                        @if($item->chili)
                                            <span>
                                                    <img src="{{ asset('asstes/image/take-away/Chili.svg') }}" alt="">
                                                </span>
                                        @endif
                                        @if($item->double_chili)
                                            <span>
                                                    <img src="{{ asset('asstes/image/take-away/Chili2.svg') }}" alt="">
                                                </span>
                                        @endif
                                        <span class="bn-text-icon">{{ $item->portion }}</span>
                                        @if($item->veg)
                                            <span class="bn-text-icon bn-text-green">Veg.</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3 bn-bg-product">
                                    {{--                                        <div class="bn-price-item">60,-</div>--}}
                                    <div class="bn-number-product">
                                        <img src="{{ asset('asstes/image/take-away/min.svg') }}" alt="" data-add="-1"
                                             data-code="{{ $item->code }}" class="addItemInCart">
                                        <span>x{{ $session['portion']['items'][$item->code] ?? 0 }}</span>
                                        <img src="{{ asset('asstes/image/take-away/max.svg') }}" alt="" data-add="1"
                                             data-code="{{ $item->code }}" class="addItemInCart">
                                    </div>

                                </div>
                                <div class="col-lg-12 bn-product-big-image">
                                    <div class="bn-broduct-big-img">
                                        <img src="{{ $item->image }}" alt="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
