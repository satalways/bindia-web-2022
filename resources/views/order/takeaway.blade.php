@extends('layouts.app')

@section('content')
    <style>
        @media only screen and (max-width: 600px) {
            .bn-take-away-item .bn-right-side-bar-product .bn-bg-product.bn-border-right {
                border-bottom: none;
            }

            .noborder {
                padding-top: 1px !important;
            }

            .bn-take-away-item .bn-right-side-bar-product .bn-bg-product h2 {
                margin-bottom: 0 !important;
            }
        }

        @media only screen and (max-width: 1024px) {
            .noborder {

            }

            .noborder:after {
                content: ' ';
                background-color: #fff;
                display: block;
                width: 100%;
                height: 35px;
                border-bottom: 2px solid #8c8c8c;
            }
        }

        .bn-icon span img {
            cursor: default !important;
        }
    </style>

    @include('order.popups.copy_order')

    <!--Main Breadcrumbs-->
    <div class="bn-breadcrumbs-take-away d-none d-sm-block position-relative">
        <div>
            <img src="{{ asset('asstes/image/take-away/mask-group-2.png') }}" alt="">
            <span id="bn-take-away-price"></span>
        </div>
    </div>
    <!--End Main Banner-->



    <!--Email send box-->
    <form action="#">
        <div class="bn-email-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-3 col-2">
                        <p data-bs-toggle="modal" style="cursor: pointer" data-bs-target="#copy-order-modal">
                            {{ __('checkout.copy_my_last_order') }}?
                        </p>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-6">
                        <input type="email" class="form-control" placeholder="{{ __('global.email') }}" id="copy_email">
                    </div>
                    <div class="col-lg-2 col-sm-3 col-2">
                        <button type="button" class="bnt btn-dark d-block w-100" id="copyLastOrderButton">
                            {{ __('global.go') }}
                        </button>
                    </div>
                    <div class="col-2 d-sm-none d-block text-center">
                        <img src="{{ asset('asstes/image/take-away/close.svg') }}" alt="">
                    </div>

                </div>
            </div>
        </div>
        <!--Search box item-->
        <div class="bn-take-away-search bn-main-story">
            <div class="container">
                <div class="bn-history-for-index">
                    <h1 class="bn-his-header mb-lg-4 mb-3">
                        {{ __('takeaway.heading') }}
                    </h1>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <input type="search" id="bn-search-item" class="form-control"
                               placeholder="{{ __('global.search') }}">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="col-lg-8">
                        <div class="bn-search-tag">
                            <button type="button" class="active">{{ __('global.all') }}</button>
                            @foreach($item_filters as $key => $val)
                                <button type="button" value="{{ $key }}">{{ $val }}</button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--item Food box-->
        <div class="bn-take-away-item">
            <div class="container">
                <div class="row bn-orange-img-take-away">
                    <div class="col-12">
                        @if(getCurrentLang() === 'da')
                            <img
                                src="{{ asset('asstes/image/take-away/orange-price-order-dk.png') }}" alt=""
                                style="margin-bottom: 10px;" class="d-sm-block d-none">
                            <img
                                src="{{ asset('asstes/image/take-away/orange-mobile-pirce-dk.png') }}" alt=""
                                style="margin-bottom: 10px;" class="d-sm-none d-block">
                        @else
                            <img
                                src="{{ asset('asstes/image/take-away/orange-price-order.png') }}" alt=""
                                style="margin-bottom: 10px" class="d-sm-block d-none">
                            <img
                                src="{{ asset('asstes/image/take-away/orange-mobile-pirce.png') }}" alt=""
                                class="d-sm-none d-block" style="margin-bottom: 10px">
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="bn-left-side-bar">
                            <ul class="list-unstyled">
                                @foreach($sections as $slug => $array)
                                    <li class="{{ $loop->first ? 'active' : '' }}">
                                        <a href="#{{ $slug }}">
                                            {{ __('takeaway.' .\Str::slug($array['name'])) }}
                                            @if(isset($array['small']))
                                                <small class="d-none d-sm-inline-block">{{ $array['small'] }}</small>
                                            @endif
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn bg-dark w-100 text-white d-none d-sm-block"
                                    data-bs-toggle="modal" data-bs-target="#bn-check-last-order">
                                {{ __('global.continue') }}
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-9 bn-right-side-bar-product">
                        @foreach($items as $sectionSlug => $itemsArray)
                            <div class="bn-toggle-content" id="{{ $sectionSlug }}">
                                @foreach($itemsArray as $item)
                                    <div class="row"
                                         @if($sectionSlug === 'bn-drinks')
                                         data-veg="yes"
                                         @if($item->code!=='700')
                                         data-vegan="yes"
                                         @endif
                                         @endif
                                         @if(!$item->dairy)
                                         data-dairy="no"
                                         @endif
                                         @if($item->veg)
                                         data-veg="yes"
                                         @endif
                                         {{--                                         @if (!$item->gluten)--}}
                                         {{--                                         data-attr="no-gluten"--}}
                                         {{--                                         @endif--}}

                                         data-gluten="{{ $item->gluten?'Yes':'no' }}"

                                         @if($item->vegan)
                                         data-veg="yes"
                                         data-vegan="yes"
                                         @endif
                                         @if(!$item->nuts)
                                         data-nuts="no"
                                        @endif
                                    >
                                        <div class="col-md-4">
                                            <img class="bn-thumbnail-img" src="{{ $item->image }}?v=2"
                                                 data-src="{{ $item->image }}?v=5"
                                                 alt="">
                                        </div>
                                        <div class="col-md-5 bn-bg-product bn-border-right bn-orange-border-mobile">
                                            {{--                                            <a href="{{ route('item', ['slug' => $item->slug]) }}"--}}
                                            {{--                                               style="text-decoration: none !important;" target="_blank">--}}

                                            {{--                                                @if(in_array($item->section,['bn-curries','bn-veg']))--}}
                                            {{--                                                    <h2>--}}
                                            {{--                                                        {{ $item->name }}--}}
                                            {{--                                                        <small class="d-sm-inline-block"--}}
                                            {{--                                                               style="font-weight: normal !important; font-size: 65%">--}}
                                            {{--                                                            (no Sides)--}}
                                            {{--                                                        </small>--}}
                                            {{--                                                    </h2>--}}
                                            {{--                                                @else--}}
                                            <h2>{{ $item->name }}</h2>
                                            {{--                                                @endif--}}

                                            {{--                                            </a>--}}

                                            <p>{{ getCurrentLang()=='da'?$item->description_dk:$item->description_en }}</p>
                                            <div class="bn-icon">
                                                @if($item->dairy)
                                                    <span>
                                                        <img src="{{ asset('asstes/image/take-away/milk.png') }}?3"
                                                             alt="{{ getMilkToolTip() }}"
                                                             title="{{ getMilkToolTip() }}">
                                                    </span>
                                                @endif
                                                @if($item->nuts)
                                                    <span>
                                                        <img src="{{ asset('asstes/image/take-away/nut.png') }}?3"
                                                             alt="{{ getNutsToolTip() }}"
                                                             title="{{ getNutsToolTip() }}">
                                                    </span>
                                                @endif
                                                @if($item->gluten)
                                                    <span>
                                                        <img src="{{ asset('asstes/image/take-away/wheat.png') }}?3"
                                                             alt="{{ getWheatToolTip() }}"
                                                             title="{{ getWheatToolTip() }}">
                                                    </span>
                                                @endif
                                                @if($item->chili)
                                                    <span>
                                                        <img src="{{ asset('asstes/image/take-away/chili.png') }}?3"
                                                             alt="{{ getChiliToolTip() }}"
                                                             title="{{ getChiliToolTip() }}">
                                                    </span>
                                                @endif
                                                @if($item->double_chili)
                                                    <span>
                                                        <img
                                                            src="{{ asset('asstes/image/take-away/dubble-chili.png') }}?3"
                                                            alt="{{ getDoubleChiliToolTip() }}" title="{{ getDoubleChiliToolTip() }}">
                                                    </span>
                                                @endif
                                                @if($item->vegan)
                                                    <span>
                                                        <img src="{{ asset('asstes/image/take-away/vegan.png') }}?3"
                                                             alt="{{ getVeganToolTip() }}"
                                                             title="{{ getVeganToolTip() }}">
                                                    </span>
                                                @endif
                                                @if($item->veg)
                                                    <span>
                                                        <img src="{{ asset('asstes/image/take-away/veg.png') }}?3"
                                                             alt="{{ getVegToolTip() }}" title="{{ getVegToolTip() }}">
                                                    </span>
                                                @endif
                                                <span class="bn-text-icon">
                                                    <img alt="{{ getWeightToolTip() }}" title="{{ getWeightToolTip() }}"
                                                        src="{{ asset('asstes/image/take-away/' .  $item->portion_slug . '.png') }}?3">
                                                </span>
                                                @if(in_array($item->section,['bn-curries','bn-veg']))
                                                    <span>
                                                        <img
                                                            src="{{ asset('asstes/image/take-away/no-sides.png') }}?3"
                                                            alt="">
                                                    </span>
                                                @endif

                                                <img src="{{ asset('asstes/image/take-away/info-icon.png') }}?3"
                                                     alt=""
                                                     class="bn-info-product-icon">

                                            </div>
                                        </div>
                                        <div class="col-md-3 bn-bg-product bn-bg-orange-product">
                                            <div class="bn-price-item">
                                                @if($sectionSlug==='bn-single-meals' && $loop->index === 0)
                                                    <img src="{{ asset('asstes/image/take-away/discount-arrow.svg') }}"
                                                         alt="">
                                                @endif
                                                <span class="bh-current-price">{{ $item->price }} /</span> <span
                                                    class="bn-discount-price">{{ $item->price_orange }}</span>
                                            </div>
                                            <div class="bn-number-product" data-single="{{ $item->id }}">
                                                @include('order.ajax.takeaway_single_item', ['item' => $item])
                                            </div>
                                        </div>
                                        <div class="col-lg-12 bn-product-big-image">
                                            <div class="bn-broduct-big-img">
                                                <img src="{{ $item->image }}"
                                                     data-src="{{ $item->image }}?v=5" alt="" class="lazy2">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script>
        $(function () {
            getCart();

            if (window.location.hash === '#bn-check-last-order') {
                $('#bn-check-last-order').modal('show');
            }

            $(document)
                .on('keydown', '#copy_email', function (e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        $('#copyLastOrderButton').trigger('click');
                    }
                })
                .on('click', '#copyLastOrderButton', function (e) {
                    e.preventDefault();
                    showLoader();
                    $.ajax({
                        url: "{{ route('takeaway.post') }}",
                        method: "post",
                        data: {action: 'copyLastOrder', email: $('#copy_email').val()},
                        error: function (e1, e2, e3) {
                            hideLoader();
                            alert(e3);
                        }
                    }).done(function (data) {
                        hideLoader();
                        if (data.substr(0, 2) === 'OK') {
                            updateTopCart();
                            getCart();
                            $('#bn-check-last-order').modal('show');
                        } else {
                            alert(data);
                        }
                    });
                })
        });

        function getCart() {
            $.ajax({
                url: '{{ route('takeaway.post') }}',
                method: 'post',
                type: 'post',
                data: {action: 'getCart'},
                error: function (e1, e2, e3) {
                    console.error(e3);
                }
            }).done(function (data) {
                $('#bn-check-last-order .container').html(data.html)
            });
        }
    </script>
@endsection
