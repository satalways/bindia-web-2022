jQuery(document).ready(function () {

    // Take Away show hidde img
    jQuery(".bn-toggle-content img.bn-thumbnail-img").click(function () {
        jQuery(this).parent().parent().toggleClass("bn-img-active").siblings().removeClass("bn-img-active");
        jQuery(this).closest('.bn-toggle-content').siblings().children().removeClass("bn-img-active");
    });
    // Take Away show hide mobile paragraph
    jQuery(".bn-toggle-content .row div:first-child, .bn-toggle-content .bn-border-right").click(function () {
        jQuery(this).parent().toggleClass("bn-text-active").siblings().removeClass("bn-text-active");
        jQuery(".bn-info-product-icon").toggle();
        jQuery(this).closest('.bn-toggle-content').siblings().children().removeClass("bn-text-active");
    });

    // Take Away mobile Email section hide
    jQuery(".bn-email-item img").click(function () {
        jQuery(".bn-email-item").hide();
    });

    // Show active menu
    jQuery("header.bn-top-header .bn-top-menu li a").each(function () {
        if (jQuery(this).attr("href") == window.location.href.split('/').pop()) {
            jQuery(this).addClass("active");
        }
    });


    jQuery("#bn-search-item").on("keyup", function () {
        var value = jQuery(this).val().toLowerCase();
        $(".bn-take-away-item .bn-toggle-content .row").filter(function () {
            jQuery(this).toggle(jQuery(this).text().toLowerCase().indexOf(value) > -1)
        });
        jQuery(document).find('i.fa-search').hide();
    });



    // Side bar scrolling add Active color take away page
    jQuery(window).scroll(function () {

        var scrollDistance = $(window).scrollTop() + 10;

        // Assign active class to nav links while scrolling
        jQuery('.bn-take-away-item .bn-toggle-content').each(function (i) {
            if (jQuery(this).position().top <= scrollDistance) {
                jQuery('.bn-take-away-item .bn-left-side-bar ul li.active').removeClass('active');
                jQuery('.bn-take-away-item .bn-left-side-bar ul li').eq(i).addClass('active');
            }
        });

    });



    jQuery(".bn-take-away-item .bn-left-side-bar ul li").click(function () {
        jQuery(document).find(".bn-toggle-content").css("padding-top", "71px");
    });
    jQuery(window).on('mousewheel keyup', function(e) {
        jQuery(document).find(".bn-toggle-content").css("padding-top", "0");
    });


    $(document).ready(function() {
        $.stickysidebarscroll(".bn-left-side-bar",{offset: {top: 73, bottom: 600}});
    });


    $('.bn-take-away-search .bn-search-tag button').click(function () {
        var sel = $(this).val();
        $('.bn-take-away-item .bn-toggle-content .row').hide();
        if (sel != "") {
            if ('div[data-' + sel + '="yes"]') {
                $('div[data-' + sel + '="yes"]').show();
            }
            if ('div[data-' + sel + '="no"]') {
                $('div[data-' + sel + '="no"]').show();
            }
        }
        else {
            $('.bn-take-away-item .bn-toggle-content .row').show();
        }

        jQuery(this).addClass("active").siblings().removeClass("active");
    });

    $("#bn-menu-banner img").attr('src', "asstes/image/catering-menu/nav-menu-four.png");
    $('div#nav-tab .nav-link').click(function (e) {
        e.preventDefault();
        var img_name = $(this).val();
        $("#bn-menu-banner img").attr('src', "asstes/image/catering-menu/" + img_name + '.png');
    });


    if (window.matchMedia('(min-width: 768px)').matches) {
        jQuery(window).scroll(function () {
            var scroll = $(window).scrollTop();
            var img_3d = (0 + scroll / 2);
            var img_3d_div = (0 - scroll);
            jQuery(".bn-animation-banner img").css({
                transform: "translate3d(0px, " + img_3d + "px, 0px) scale(1)",
            });
            jQuery(".bn-animation-banner .bn-slider-ds-img").css({
                transform: "translate3d(0px, " + img_3d_div + "px, 0px)",
            });
        });
    } else {
        jQuery(window).scroll(function () {
            var scroll = $(window).scrollTop();
            var img_3d = (0 + scroll / 2);
            var img_3d_div = (0 - scroll);
            jQuery(".bn-animation-banner img").css({
                transform: "translate3d(0px, " + img_3d + "px, 0px) scale(1)",
            });
            jQuery(".bn-animation-banner .bn-slider-ds-img").css({
                transform: "translate3d(0px, " + img_3d_div + "px, 0px)",
            });
        });
    }
    AOS.init();


//     function setWindowWH() {
//         alert("i am afmamf");
//         // get window width and height
//         var windowWidth = $(window).width(),
//             windowHeight = $(window).height();
//         // add to DOM
//         $(".bn-animation-banner img").html(windowWidth + "px");
//         $(".bn-animation-banner img").html(windowHeight + "px");
//     }
//
// // run function on window load and resize
//     $(window).on("load resize", function() {
//         setWindowWH();
//     });

    if (window.matchMedia('(min-width: 1070px)').matches) {
        jQuery(".bn-animation-banner .bn-image-desktop").css({
            width: "100%",
        });
    } else {
        jQuery(window).ready(function () {
            var bodywidth = jQuery(".bn-animation-banner .bn-slider-ds-img img").width();
            var fixbodywidth = (bodywidth + 292);
            jQuery(".bn-animation-banner .bn-image-desktop").css({
                width: fixbodywidth + "px",
            });
        });
    }

    jQuery(".bn-check-out-from .bn-col-lr-mobile input").focus(function () {
        jQuery(this).parent().find("label.bn-date-time").hide()

    });
    jQuery('.bn-check-out-from .bn-col-lr-mobile input').blur(function () {
        if (!jQuery(this).val()) {
            jQuery(this).parent().find("label.bn-date-time").show()
        }
    });


    //~~ Default colors
    jQuery('input[name="choose-payment"]').addClass('bn-checked-color-chnaged');
    jQuery('input[name="choose-point"]').addClass('bn-checked-color-chnaged');
    jQuery(document).find('.bn-selected-price .bn-price-item').addClass('bn-orange-color');

    //~~ chnaging checkbox colors
    if ((jQuery('input[name="choose-point"]').click(function () {
        if ((jQuery(this).val() === 'pickup') && (jQuery('input[name="choose-payment"]:checked').val() === 'online')) {
            jQuery(this).addClass('bn-checked-color-chnaged');
            jQuery('input[name="choose-payment"]').addClass('bn-checked-color-chnaged');
            jQuery(document).find('.bn-selected-price .bn-price-item').addClass('bn-orange-color');
            jQuery(document).find('.bn-orange-container').css('display','block');
        }else{
            jQuery(this).removeClass('bn-checked-color-chnaged');
            jQuery('input[name="choose-payment"]').removeClass('bn-checked-color-chnaged');
            jQuery(document).find('.bn-selected-price .bn-price-item').removeClass('bn-orange-color');
            jQuery(document).find('.bn-orange-container').css('display','none');
        }
    }))) ;
    if ((jQuery('input[name="choose-payment"]').click(function () {
        if ((jQuery(this).val() == 'online') && (jQuery('input[name="choose-point"]:checked').val() === 'pickup')) {
            jQuery('input[name="choose-point"]').addClass('bn-checked-color-chnaged');
            jQuery(this).addClass('bn-checked-color-chnaged');
            jQuery(document).find('.bn-selected-price .bn-price-item').addClass('bn-orange-color');
            jQuery(document).find('.bn-orange-container').css('display','block');
        }else{
            jQuery('input[name="choose-point"]').removeClass('bn-checked-color-chnaged');
            jQuery(this).removeClass('bn-checked-color-chnaged');
            jQuery(document).find('.bn-selected-price .bn-price-item').removeClass('bn-orange-color');
            jQuery(document).find('.bn-orange-container').css('display','none');
        }
    }))) ;

    //~~ index page learn more toggle
    jQuery(".bn-his-more").click(function () {
        jQuery(".bn-his-paragraph p").slideToggle();
        jQuery(".bn-his-more").toggle();
    });


    //~~ Pre Check Out Append html radio button

    $(document).ready(function() {
        var pre_chk_opt = ' <div class="bn-radio-order">' +
            '                            <div class="form-check">' +
            '                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>' +
            '                                <label class="form-check-label" for="exampleRadios1">' +
            '                                    Standard' +
            '                                </label>' +
            '                            </div>' +
            '                            <div class="form-check">' +
            '                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">' +
            '                                <label class="form-check-label" for="exampleRadios2">' +
            '                                    Hot' +
            '                                </label>' +
            '                            </div>' +
            '                            <div class="form-check">' +
            '                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">' +
            '                                <label class="form-check-label" for="exampleRadios3">' +
            '                                    X-Hot' +
            '                                </label>' +
            '                            </div>' +
            '                        </div>';
        $('.bn-add-radio-html').on('click', function() {
            $(".bn-body-radio-box").append(pre_chk_opt);
        });

        $('.bn-remove-radio-html').on('click', function() {
            $('.bn-radio-order:last').remove();
        });

    });


    // contact us Attach file field change

    $('#bn-file-attachment').bind('change', function () {
        var filename = $("#bn-file-attachment").val();
        if (/^\s*$/.test(filename)) {
            $("#bn-file-attachment-label").text("Attach File...");
        }
        else {
            $("#bn-file-attachment-label").text(filename.replace("C:\\fakepath\\", ""));
        }
    });
    // Job Attach file field change
    $('#bn-file-attach-one').bind('change', function () {
        var filename = $("#bn-file-attach-one").val();
        if (/^\s*$/.test(filename)) {
            $("#bn-job-file-attach-one").text("Attach File...");
        }
        else {
            $("#bn-job-file-attach-one").text(filename.replace("C:\\fakepath\\", ""));
        }
    });

    // ===========================================================

    $('#bn-file-attach-two').bind('change', function () {
        var filename = $("#bn-file-attach-two").val();
        if (/^\s*$/.test(filename)) {
            $("#bn-job-file-attach-two").text("Attach File...");
        }
        else {
            $("#bn-job-file-attach-two").text(filename.replace("C:\\fakepath\\", ""));
        }
    });

});