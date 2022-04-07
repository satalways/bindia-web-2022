<!DOCTYPE html>
<html lang="{{ getCurrentLang() }}">
<head>    <!-- Global site tag (gtag.js) - Google Analytics -->
    @if(isLiveServer())
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-58516958-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());
            gtag('config', 'UA-58516958-1');
        </script>
    @endif
    <meta name="ahrefs-site-verification" content="7f7540f4be12a33e5bc0c0f43d25e94552ca22a2b66bc8242653f148ace06102">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ isset($seo->title_en) ? $seo->getTitle() : ($title ?? 'Bindia Indisk Mad') }}</title>
    <!--Mobile Media-->
    <meta name="description" content="{{ isset($seo->description_en) ? $seo->getDesc() : ($description ?? '') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap min css File-->
    <!--    <link rel="stylesheet" href="asstes/css/bootstrap.min.css">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--Slick slider css File-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <!--FontAwesome File-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!--animations css file-->
{{--    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">--}}
<!--Parallax css file-->
    <link href="{{ asset('asstes/css/parallax.css') }}?v=3" rel="stylesheet">
    <!--Costume Style css file-->
    <link rel="stylesheet" href="{{ asset('asstes/css/style.css') }}?v=16.5">
    <link rel="stylesheet" href="{{ asset('custom.css') }}?v=16.7">
    <!--animation file-->
{{--    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>--}}
    <script src="{{ asset('asstes/js/float-panel.js') }}"></script>

    <meta property="og:description"
          content="{{ isset($seo->description_en) ? $seo->getDesc() : ($description ?? '') }}"/>
    <meta property="og:title"
          content="{{ isset($seo->title_en) ? $seo->getTitle() : ($title ?? 'Bindia Indisk Mad') }}"/>
    <meta property="og:site_name" content="Bindia"/>
    <meta property="og:type" content="website"/>
    <meta property="og:locale" content="DK"/>
    <meta property="og:url" content="{{ request()->url() }}"/>
    <meta property="article:publisher"
          content="https://www.facebook.com/Bindia-Indian-Restaurant-Take-Away-423997224656298"/>
    <meta property="og:image" content="{{ $social_image ?? 'https://www.bindia.dk/asstes/image/slider-image.png' }}"/>
    <meta property="og:image:width" content="806"/>
    <meta property="og:image:height" content="575"/>
    <meta name="og:email" content="office@bindia.dk"/>
    <meta name="og:phone_number" content="+45 30 25 88 38"/>

    <link href="{{ request()->url() }}" rel="canonical">
    <meta name='dmca-site-verification' content='cnpuVEdmL1VUZjJHVnZlQ3RkYklHdz090'/>

    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <style>
        @media only screen and (min-width: 1440px ) {
            .bn-shops-banner .bn-shop-contact {
                top: 39% !important;
            }
        }

        .form-control:disabled, .form-control[readonly] {
            background-color: #fff !important;
        }

        .noselect {
            -webkit-touch-callout: none; /* iOS Safari */
            -webkit-user-select: none; /* Safari */
            -khtml-user-select: none; /* Konqueror HTML */
            -moz-user-select: none; /* Old versions of Firefox */
            -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none;
            /* Non-prefixed version, currently
                                             supported by Chrome, Edge, Opera and Firefox */
        }

        span.error {
            color: #c00;
        }

        input.error, textarea.error {
            border: 1px solid #c00 !important;
        }

        .btn-group-xs > .btn, .btn-xs {
            padding: .25rem .4rem !important;
            font-size: .875rem !important;
            line-height: .5 !important;
            border-radius: .2rem !important;
        }

        label.error {
            color: #c00 !important;
            margin-top: -24px;
            position: absolute;
        }

        div.control-field {
            display: none;
        !important;
        }

        #cookiePopup {
            background: white;
            width: 25%;
            min-width: 300px;
            position: fixed;
            left: 10px;
            bottom: 20px;
            box-shadow: 0 0 15px #cccccc;
            padding: 20px 20px;
            z-index: 9999;
        }

        #cookiePopup p {
            text-align: left;
            font-size: 15px;
            color: #4e4e4e;
        }

        #cookiePopup button {
            width: 100%;
        }

        .btn.btn-black {
            color: #fff;
            background: black;
            font-size: 16px;
            border-radius: 0;
            border: none;
        }
    </style>

@yield('styles')

<!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-55HW7TK');
    </script>
    <!-- End Google Tag Manager -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->

<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-55HW7TK" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

@if (!request()->cookie('CookieConsent'))
    <div id="cookiePopup">
        <h4>Cookie Policy</h4>
        <p>
            Når du besøger vores hjemmeside, indsamles der oplysninger om dig med henblik på at optimere
            brugeroplevelsen af hjemmesiden.
            Ved at bruge denne hjemmeside, giver du automatisk samtykke til vores <a
                href="{{ LaravelLocalization::localizeUrl(route('privacy_policy', [], false), 'da') }}#cp">cookiepolitik</a>.
        </p>
        <br>
        <p>
            When you visit our website, specific data are collected to optimize the user experience of the website.
            By using our website, you automatically consent to our <a
                href="{{ LaravelLocalization::localizeUrl(route('privacy_policy', [], false), 'en') }}#cp">cookie
                policy</a>.
        </p>
        <br>
        <button type="button" class="btn btn-lg btn-black" id="acceptCookie2">OK</button>
    </div>
@endif

<!--Header start-->
<header class="bn-top-header">
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand p-0" href="{{ route('home') }}">
                <img class="logo" src="{{ asset('asstes/image/logo.svg') }}" alt="">
            </a>
            <div class="w-100 justify-content-center bn-top-menu d-lg-block d-none">
                <ul class="navbar-nav justify-content-center me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white {{ $routeName=='takeaway'?'active':'' }}" aria-current="page"
                           href="{{ route('takeaway') }}#bn-take-away-price">{{ __('global.takeaway') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ $routeName=='dinein'?'active':'' }}"
                           href="{{ route('dinein') }}">{{ __('header.dinein') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ in_array($routeName, ['catering', 'catering.drinks', 'catering.portion', 'catering.checkout'])?'active':'' }}"
                           href="{{ route('catering') }}">{{ __('header.catering') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Right Side Menu-->
    <nav class="bn-right-side-menu">
        <div id="menuToggle">
            <input type="checkbox">
            <span></span>
            <span></span>
            <span></span>
            <ul id="menu" class="justify-content-center me-auto mb-2 mb-lg-0">
                <li class="nav-item text-white bn-language-item">
                    <a href="{{ LaravelLocalization::getLocalizedURL('da') }}"
                       class="float-end {{ LaravelLocalization::getCurrentLocale()=='da'?'active':'' }}">DK</a>
                    <a href="{{ LaravelLocalization::getLocalizedURL('en') }}"
                       class="float-end {{ LaravelLocalization::getCurrentLocale()=='en'?'active':'' }}">EN</a>
                    <div class="clearfix"></div>
                </li>
                <li class="nav-item" style="border-bottom: 1px solid #ffffff85 !important;">
                    <a class="nav-link text-white"
                       href="{{ route('takeaway') }}#bn-take-away-price">{{ __('header.takeaway') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('catering') }}">{{ __('header.catering') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('dinein') }}">{{ __('header.dinein') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('giftcard') }}">{{ __('header.giftcard') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('footer.locations') }}
                    </a>
                    <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-white" href="{{ route('amg') }}">{{ shop('amg')->name }}</a>
                        </li>
                        <li><a class="dropdown-item text-white" href="{{ route('gkv') }}">{{ shop('gkv')->name }}</a>
                        </li>
                        <li><a class="dropdown-item text-white" href="{{ route('lhg') }}">{{ shop('lhg')->name }}</a>
                        </li>
                        <li><a class="dropdown-item text-white" href="{{ route('elm') }}">{{ shop('elm')->name }}</a>
                        </li>
                        <li><a class="dropdown-item text-white" href="{{ route('shg') }}">{{ shop('shg')->name }}</a>
                        </li>
                        <li><a class="dropdown-item text-white" href="{{ route('bdv') }}">{{ shop('bdv')->name }}</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown-2" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('footer.about') }}
                    </a>
                    <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown-2">
                        <li><a class="dropdown-item text-white"
                               href="{{ route('our_story') }}">{{ __('footer.our_story') }}</a></li>
                        <li><a class="dropdown-item text-white"
                               href="{{ route('our_values') }}">{{ __('footer.our_values') }}</a></li>
                        <li><a class="dropdown-item text-white"
                               href="{{ route('our_team') }}">{{ __('footer.our_team') }}</a></li>
                        <li><a class="dropdown-item text-white" href="{{ route('faq') }}">{{ __('footer.FAQ') }}</a>
                        </li>
                        <li>
                            <a class="dropdown-item text-white"
                               href="{{ route('glossary') }}">{{ __('footer.glossary') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown-3" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('footer.legal') }}
                    </a>
                    <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown-3">
                        <li><a class="dropdown-item text-white"
                               href="{{ route('privacy_policy') }}">{{ __('footer.privacy_policy') }}</a>
                        </li>
                        <li>
                            <a class="dropdown-item text-white" href="{{ route('terms_and_conditions') }}">
                                {{ __('footer.terms_condition') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('jobs') }}">{{ __('footer.jobs')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('contact') }}">{{ __('footer.contact_us') }}</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Cart box-->
    @if ($routeName === 'checkout')
        <div class="bn-card-price" style="display: none">
            <a href="{{ route('takeaway') }}#bn-check-last-order" class="text-white text-decoration-none"
               2data-bs-toggle2="modal"
               data-bs-target2="#bn-check-last-order">
                <i class="fas fa-shopping-basket"></i>
                <span class="bn-item-card"></span>
                <span class="bh-current-price">135/</span>
                <span class="bn-discount-price">110</span>
                {{--                <span class="bn-item-card">0x</span>--}}
                {{--                <span class="bn-price-card">0,-</span>--}}
            </a>
        </div>
    @else
        <div class="bn-card-price" style="display: none">
            <a href="#bn-check-last-order" class="text-white text-decoration-none" data-bs-toggle="modal"
               data-bs-target="#bn-check-last-order">
                <i class="fas fa-shopping-basket"></i>
                <span class="bn-item-card"></span>
                <span class="bh-current-price">135/</span>
                <span class="bn-discount-price">110</span>
                {{--                <span class="bn-item-card">0x</span>--}}
                {{--                <span class="bn-price-card">0,-</span>--}}
            </a>
        </div>
    @endif
</header>
<!--Header End-->

@yield('content')

<footer class="bn-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-3">
                <h4 class="bn-footer-header">{{ __('footer.locations') }}</h4>
                <ul class="list-unstyled">
                    <li><a class="text-dark" href="{{ route('amg') }}">{!! shop('amg')->name !!}</a></li>
                    <li><a class="text-dark" href="{{ route('gkv') }}">{!! shop('gkv')->name !!}</a></li>
                    <li><a class="text-dark" href="{{ route('lhg') }}">{!! shop('lhg')->name !!}</a></li>
                    <li><a class="text-dark" href="{{ route('elm') }}">{!! shop('elm')->name !!}</a></li>
                    <li><a class="text-dark" href="{{ route('shg') }}">{!! shop('shg')->name !!}</a></li>
                    <li><a class="text-dark" href="{{ route('bdv') }}">{!! shop('bdv')->name !!}</a></li>
                    {{--                    @foreach(config('shops') as $shop => $arr)--}}
                    {{--                        <li>--}}
                    {{--                            <a class="text-dark" href="{{ route(strtolower($shop)) }}">{!! $arr['long_name'] !!}</a>--}}
                    {{--                        </li>--}}
                    {{--                    @endforeach--}}
                </ul>
            </div>
            <div class="col-lg-3 col-3">
                <h4 class="bn-footer-header">{{ __('footer.about') }}</h4>
                <ul class="list-unstyled">
                    <li><a class="text-dark" href="{{ route('our_story') }}">{{ __('footer.our_story') }}</a></li>
                    <li><a class="text-dark" href="{{ route('our_values') }}">{{ __('footer.our_values') }}</a></li>
                    <li><a class="text-dark" href="{{ route('our_team') }}">{{ __('footer.our_team') }}</a></li>
                    <li><a class="text-dark" href="{{ route('faq') }}">{{ __('footer.FAQ') }}</a></li>
                    <li><a class="text-dark" href="{{ route('glossary') }}">{{ __('footer.glossary') }}</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-3">
                <h4 class="bn-footer-header">{{ __('footer.legal') }}</h4>
                <ul class="list-unstyled" style="margin-bottom: 0.2rem;">
                    <li><a class="text-dark" href="{{ route('privacy_policy') }}">{{ __('footer.privacy_policy') }}</a>
                    </li>
                    <li>
                        <a class="text-dark"
                           href="{{ route('terms_and_conditions') }}">{{ __('footer.terms_condition') }}</a>
                    </li>
                </ul>

                <a href="{{ route('jobs') }}" class="text-decoration-none">
                    <h4 class="bn-footer-header mb-0 mt-4">
                        {{ __('footer.jobs') }}
                    </h4>
                </a>
                <ul class="list-unstyled">
                    <li><a class="text-dark"
                           href="{{ route('contact') }}"><strong>{{ __('footer.contact_us') }}</strong></a></li>
                    <li><a class="text-dark" href="{{ route('giftcard') }}"><strong>{{ __('header.giftcard') }}</strong></a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-2 col-3">
                <div class="mt-5" style="margin-top: 102px !important;">&nbsp;</div>
                <ul class="list-unstyled">
                    {{--                    <li><a target="_blank" href="https://staff.bindia.dk/attendance">Attendance</a></li>--}}
                    {{--                    <li><a target="_blank" href="https://staff.bindia.dk/">Admin</a></li>--}}
                </ul>
            </div>
        </div>
        <div class="bn-footer-last">
            <div class="float-start">
                <a target="_blank" href="https://www.facebook.com/bindiadenmark"><i class="fab fa-facebook-square"></i></a>
                <a target="_blank" href="https://www.trustpilot.com/review/www.bindia.dk"><img
                        src="{{ asset('asstes/image/trustpilot.svg') }}" alt=""></a>
                <a target="_blank" href="https://www.instagram.com/bindia.dk/"><i
                        class="fab fa-instagram-square"></i></a>
            </div>
            <div class="float-end">Ⓒ Bindia 2003 - {{ date('Y') }}</div>
            <div class="clearfix"></div>
        </div>
    </div>
</footer>
<!--End Footer-->

<!-- My last Order popup -->
<div class="modal fade bn-check-out-last-order-box" id="bn-check-last-order" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="container">
                @if ($O)
                    @include('order.ajax.takeaway_cart', [
                        'items' => $O->getSessionCartData(),
                        'cartItems' => $O->getSessionCart(),
                        'spice' => $O->getSessionSpice()
                    ])
                @endif
            </div>
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>

<!--jQuery file-->
<script src="{{ asset('asstes/js/jQuery.3.6.0.js') }}"></script>
<!--Bootstrab popper file-->
<script src="//cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<!--Bootstrab min js file-->
<script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<!--slick slider min js file-->
<script src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="{{ asset('asstes/js/sticky-sidebar-scroll.min.js') }}"></script>
<script src="{{ asset('asstes/js/rellax.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-loading-overlay/2.1.7/loadingoverlay.min.js"
        integrity="sha512-hktawXAt9BdIaDoaO9DlLp6LYhbHMi5A36LcXQeHgVKUH6kJMOQsAtIw2kmQ9RERDpnSTlafajo6USh9JUXckw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--Custom js file-->
<script src="{{ asset('asstes/js/script.js') }}?16.2"></script>
{!! js('lazyload') !!}
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function () {
        $(document)
            .on('click', '.addItem', function (e) {
                var ID = $(this).attr('data-id');
                var Inc = $(this).attr('data-inc');

                var qtyObject = $('span.span_qty[data-id=' + ID + ']');
                var currentQty = qtyObject.text();
                showLoader('.....');

                $.ajax({
                    url: "{{ route('takeaway.post') }}",
                    method: 'post',
                    type: 'post',
                    data: {action: 'setValueCart', id: ID, what: Inc},
                    error: function (e1, e2, e3) {
                        hideLoader();
                        console.error(e3);
                    }
                }).done(function (data) {
                    hideLoader();
                    updateTopCart();
                    $('#bn-check-last-order .container').html(data.html)
                    $('[data-single=' + ID + ']').html(data.single_html);
                })
            })
            .on('click', 'input.spiceCheck', function (e) {
                $.ajax({
                    url: '{{ route('takeaway.post') }}',
                    data: $('.form-check-input').serialize() + '&action=updateSpice',
                    method: 'post',
                    error: function (e1, e2, e3) {
                        alert(e3);
                    }
                }).done(function (data) {

                });
            })
    });

    function showLoader(text = '') {
        if (text === '') {
            $.LoadingOverlay('show', {
                'text': '{{ __('global.loading') }}'
            });
        } else {
            $.LoadingOverlay('show', {
                'text': text
            });
        }
    }

    function hideLoader() {
        $.LoadingOverlay('hide');
    }

    function updateTopCart() {
        $.ajax({
            url: '{{ route('app.ajax') }}',
            method: 'post',
            data: {action: 'getCart'},
            error: function (e1, e2, e3) {
                console.error(e3);
            }
        }).done(function (data) {
            if (data.qty > 0) {
                $('div.bn-card-price span.bn-item-card').text(data.qty);
                $('div.bn-card-price span.bh-current-price').text(data.amount + '/');
                $('div.bn-card-price span.bn-discount-price').text(data.discount_amount);
                $('div.bn-card-price').show();
            } else {
                $('div.bn-card-price').hide();
            }
        });
    }

    $(function () {
        updateTopCart();

        $.extend($.lazyLoadXT, {
            edgeY: 200,
            srcAttr: 'data-src'
        });
        $('.lazy').lazyLoadXT();

        $(document)
            .on('click', '#acceptCookie2', function (e) {
                e.preventDefault();

                $.ajax({
                    url: '{{ route('general.post') }}',
                    method: 'post',
                    data: {action: 'saveCookieConsent'}
                });

                $('#cookiePopup').slideUp('slow');
            })

    });
</script>

@yield('js')

@if(isLiveServer())
    {{--    <!--Start of Tawk.to Script-->--}}
    {{--    <script type="text/javascript">--}}
    {{--        var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();--}}
    {{--        (function () {--}}
    {{--            var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];--}}
    {{--            s1.async = true;--}}
    {{--            s1.src = 'https://embed.tawk.to/5c813d3e101df77a8be16ae6/default';--}}
    {{--            s1.charset = 'UTF-8';--}}
    {{--            s1.setAttribute('crossorigin', '*');--}}
    {{--            s0.parentNode.insertBefore(s1, s0);--}}
    {{--        })();--}}
    {{--    </script>--}}
    {{--    <!--End of Tawk.to Script-->--}}

    @if( !(isMobile() && (getRouteName() === 'takeaway' || getRouteName() === 'checkout')) )
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
            (function () {
                var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = 'https://embed.tawk.to/5c813d3e101df77a8be16ae6/default';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
    @endif
@endif

</body>
</html>
