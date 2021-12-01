jQuery(document).ready(function () {

    // Take Away show hidde img
    jQuery(".bn-toggle-content img.bn-thumbnail-img").click(function () {
        jQuery(this).parent().parent().toggleClass("bn-img-active").siblings().removeClass("bn-img-active");
    });
    // Take Away show hide mobile paragraph
    jQuery(".bn-toggle-content .bn-border-right h2").click(function () {
        jQuery(this).parent().parent().toggleClass("bn-text-active").siblings().removeClass("bn-text-active");
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
        var scrollDistance = $(window).scrollTop() + 1;
        // Assign active class to nav links while scrolling
        jQuery('.bn-take-away-item .bn-toggle-content').each(function (i) {
            if (jQuery(this).position().top <= scrollDistance) {
                jQuery('.bn-take-away-item .bn-left-side-bar ul li.active').removeClass('active');
                jQuery('.bn-take-away-item .bn-left-side-bar ul li').eq(i).addClass('active');
            }
        });
    }).scroll();

    // side bar on scroll fixed take away page
    $(document).ready(function () {
        var $window = $(window);
        var $sidebar = $(".bn-left-side-bar");
        var $sidebarHeight = $sidebar.innerHeight();
        var $footerOffsetTop = $("footer.bn-footer").offset().top;
        var $sidebarOffset = $sidebar.offset();

        $window.scroll(function () {
            if (typeof $sidebarOffset !== 'undefined' && $window.scrollTop() > $sidebarOffset.top) {
                $sidebar.addClass("bn-sticky-left");
            } else {
                $sidebar.removeClass("bn-sticky-left");
            }
            if ($window.scrollTop() + $sidebarHeight > $footerOffsetTop) {
                // $sidebar.css({"top" : ($window.scrollTop() + $sidebarHeight - $footerOffsetTop)});
            } else {
                $sidebar.css({"top": "7%",});
            }
        });


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
        } else {
            $('.bn-take-away-item .bn-toggle-content .row').show();
        }

        jQuery(this).addClass("active").siblings().removeClass("active");
    });

    $("#bn-menu-banner img").attr('src', "/asstes/image/catering-menu/nav-menu-four.png");
    $('div#nav-tab .nav-link').click(function (e) {
        e.preventDefault();
        var img_name = $(this).val();
        $("#bn-menu-banner img").attr('src', "/asstes/image/catering-menu/" + img_name + '.png');
    });


    if (window.matchMedia('(min-width: 768px)').matches) {
        jQuery(window).scroll(function () {
            var scroll = $(window).scrollTop();
            var img_3d = (80 + scroll / 2);
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
});
