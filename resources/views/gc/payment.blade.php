<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bindia GiftCard Payment</title>
    <style>
        /* CUSTOM.CSS CODES ARE HERE,
        * ========================================================
        */
        /* Absolute Center Spinner */
        #main_loader {
            display: none;
            position: fixed;
            z-index: 9999999;
            height: 2em;
            width: 2em;
            overflow: show;
            margin: auto;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
        }

        /* Transparent Overlay */
        #main_loader:before {
            content: '';
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.3);
        }

        /* :not(:required) hides these rules from IE9 and below */
        #main_loader:not(:required) {
            /* hide "loading..." text */
            font: 0/0 a;
            color: transparent;
            text-shadow: none;
            background-color: transparent;
            border: 0;
        }

        #main_loader:not(:required):after {
            content: '';
            display: block;
            font-size: 10px;
            width: 1em;
            height: 1em;
            margin-top: -0.5em;
            -webkit-animation: spinner 1500ms infinite linear;
            -moz-animation: spinner 1500ms infinite linear;
            -moz-animation-direction: alternate;
            -ms-animation-direction: alternate;
            -ms-animation: spinner 1500ms infinite linear;
            -o-animation: spinner 1500ms infinite linear;
            animation: spinner 1500ms infinite linear;
            border-radius: 0.5em;
            -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
            box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
        }

        /* Animation */
        @-webkit-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @-moz-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @-o-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body>
<div id="main_loader">Loading&#8230;</div>

<h3 style="text-align: center; background-color: #F58323; color: #fff; padding: 10px">Please don't close this
    window</h3>

<div id="dibs-complete-checkout"></div>
<script src="{{ $jsFile }}"></script>

<script>
    var checkoutKey = '{{  $checkoutKey }}';
    var paymentId = '{{ $giftCard->payment_id }}';
    var partnerMerchantNumber = '{{ $merchantID }}';
    var containerId = 'dibs-complete-checkout';
    var language = 'en-GB';
    //var orderID = 'A2';

    var checkoutOptions = {
        checkoutKey: checkoutKey, // [Required] Test or Live checkout key with dashes
        paymentId: paymentId, // [Required] Payment ID (GUID format) without dashes.
        containerId: containerId, // [Optional] Default: dibs-checkout-content
        language: language, // [Optional] Default value: en-GB
        theme: { // [Optional] as are all values within
            textColor: "", // any css color
            primaryColor: "", // any css color
            buttonRadius: "5px",
            buttonTextColor: "", // any css color
            linkColor: "", // any css color
            footerBackgroundColor: "", // any css color
            footerOutlineColor: "", // any css color
            footerTextColor: "", // any css color
            backgroundColor: "", // any css color
            panelColor: "", // any css color
            outlineColor: "", // any css color
            primaryOutlineColor: "", // any css color
            panelTextColor: "", // any css color
            panelLinkColor: "", // any css color
            fontFamily: "Roboto", // any google font
            buttonFontWeight: 500, //number or string
            buttonFontStyle: "italic", // oblique, italic, etc. any valid css value
            buttonTextTransform: "none", // any valid css text - transform
            placeholderColor: "", // any css color
            useLightIcons: false, // boolean
            useLightFooterIcons: false // boolean
        }
    };

    var checkout = new Dibs.Checkout(checkoutOptions);

    //this is the event that the merchant should listen to redirect to the “payment-is-ok” page
    checkout.on('payment-completed', function (response) {
        document.getElementById('main_loader').style.display = 'block';
        if (response.returnUrl) {
            window.location.href = response.returnUrl;
        } else {
            window.location.href = '{{ route('order.nets.cancel', request()->all()) }}';
        }
    });

</script>
</body>
</html>
