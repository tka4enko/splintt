/* 
 Core
 Global
 cookieManager
 privacypolicy
 
 */
var debug = 1;
var $window, root, body, scrollTop;
var catpagenumber = 1;
var pagenumber = 2;
var fixedOffset;

var parentEl, currentEl, currentElpos, scrolltop;
var winHeight = window.innerHeight;
var winHalfHeight = winHeight / 2;
var winThirdHeight = winHeight / 3;

Number.isInteger = Number.isInteger || function (value) {
    return typeof value === "number" &&
            isFinite(value) &&
            Math.floor(value) === value;
};


function isEmail(email) {
    return /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test(email);
}

function logm($message) {
    if (debug == 1) {
        console.log($message);
    }
}

/* Core
 ----------------------------------------------------------------- */

var Core = {
    init: function () {
        $window = jQuery(window);
        root = jQuery('html, body');
        body = jQuery('body');
        $window.on('ready scroll', function () {
            scrollTop = $window.scrollTop();
        });
    }
};


var Global = {
    init: function () {
        cookieManager.init();
        this.overlaymenu();
        this.stickyMenu();
        this.footersticky();
        this.footerAnimation();
        this.referentieCarousel();
        checkClipSupport.init(".check-clippath");

        jQuery(window).on('resize load', function () {
            if (Modernizr.mq('only all and (min-width: 992px)')) {
                jQuery('.overlay-menu').css('display', 'none');
            }
            jQuery('.scroll_back_btns').fadeOut();
            jQuery(window).scroll(function () {
                if (jQuery(this).scrollTop() > 300) {
                    jQuery('.scroll_back_btns').fadeIn();
                } else {
                    jQuery('.scroll_back_btns').fadeOut();
                }
            });

            jQuery("#main-inner, .page-slide-wrapper").scroll(function () {
                if (jQuery(this).scrollTop() > 300) {
                    jQuery('.scroll_back_btns').fadeIn();
                } else {
                    jQuery('.scroll_back_btns').fadeOut();
                }
            });

            //Click event to scroll to top
            if (Modernizr.mq('only all and (min-width: 992px)')) {
                jQuery(document).on('click', '.scroll_back_btns .back-to-top', function () {
                    jQuery('html, body, .page-slide-wrapper').animate({scrollTop: 0}, 800);
                    return false;
                });
            } else {
                jQuery(document).on('click', '.scroll_back_btns .back-to-top', function () {
                    jQuery('#main-inner, .page-slide-wrapper').animate({scrollTop: 0}, 800);
                    return false;
                });
            }
        });
        jQuery('.language-select-a').click(function () {
            jQuery('.lang_switcher .ul-wrapper').slideToggle(100);
            jQuery(this).toggleClass("closed opened");
            return false;
        });
    },
    overlaymenu: function () {
        jQuery(".menu-strip").click(function () {
            jQuery(this).html() == '<span class="menu_title">Sluit </span><i class="iconc-close"></i>' ? jQuery(this).html('<span class="menu_title">Menu </span><i class="iconc-hamburger-menu"></i>') : jQuery(this).html('<span class="menu_title">Sluit </span><i class="iconc-close"></i>');
            jQuery(".overlay-menu").slideToggle(300);
            return false;
        });

        jQuery(".overlay-close").click(function () {
            jQuery(".overlay-menu").slideToggle(300);
            return false;
        });

        // jQuery(".overlay-menu .overlay-menulist a").click(function () {
        //     jQuery(".overlay-menu").slideToggle(300);
        // });

        var parentMenuSelector = " li.menu-item-has-children ";
        var parentMenu = jQuery(parentMenuSelector);
        // parentMenu.prepend('<i class=" mobile-icon iconc-arrow-down"></i>');
        if (Modernizr.mq('only all and (max-width: 1200px)')) {
            jQuery(document).on("click", "li.menu-item-has-children > a", function () {
                jQuery(this).parent().find("ul.sub-menu").slideToggle(200);
                return false;
            });
        }
    },
    stickyMenu: function () {
        // jQuery(".menu-item-has-children").addClass("iconc-arrow-down");
        var parentMenuSelector = " li.menu-item-has-children > a";
        var parentMenu = jQuery(parentMenuSelector);
        // parentMenu.append('<i class="desktop_icon iconc-arrow-down"></i>');
        var headerbar = jQuery("header");
        var navbarHeight = headerbar.height();
        var headerbarHeight = headerbar.outerHeight();
        var didScroll;
        var lastScrollTop = 0;
        var delta = 5;

        if (Modernizr.mq('only all and (min-width: 991px)')) {
            body.css("padding-top", navbarHeight);
            jQuery(window).resize(function () {
                body.css("padding-top", navbarHeight);
            });
        }

        jQuery(window).scroll(function (event) {
            didScroll = true;
        });

        setInterval(function () {
            if (didScroll) {
                hasScrolled();
                didScroll = false;
            }
        }, 100);

        function hasScrolled() {
            // if (Modernizr.mq('only all and (min-width: 1200px)')) {
            var st = jQuery(this).scrollTop();

            if (st > 200) {
                headerbar.addClass("box-distinct");
            } else {
                headerbar.removeClass("box-distinct");
            }

            // Make sure they scroll more than delta
            if (Math.abs(lastScrollTop - st) <= delta)
                return;

            // If they scrolled down and are past the headerbar, add class .nav-up.
            // This is necessary so you never see what is "behind" the headerbar.
            if (st > lastScrollTop && st > headerbarHeight) {
                // Scroll Down
                headerbar.css("top", -200);
            } else {
                // Scroll Up
                if (st + jQuery(window).height() < jQuery(document).height()) {
                    headerbar.css("top", "0");
                }
            }

            lastScrollTop = st;
            // } else {
            //     headerbar.css("top", "0");
            // }
        }

        function hasScrolledmobile() {
            st = jQuery('#main-inner').scrollTop();

            if (st > 200) {
                headerbar.addClass("box-distinct");
            } else {
                headerbar.removeClass("box-distinct");
            }

            // Make sure they scroll more than delta
            if (Math.abs(lastScrollTop - st) <= delta)
                return;

            // If they scrolled down and are past the headerbar, add class .nav-up.
            // This is necessary so you never see what is "behind" the headerbar.
            if (st > lastScrollTop && st > headerbarHeight) {
                // Scroll Down
                headerbar.css("top", -200);
            } else {
                // Scroll Up
                if (st < lastScrollTop && st > headerbarHeight) {
                    headerbar.css("top", "0");
                }
            }

            lastScrollTop = st;
        }

        jQuery('#main-inner').scroll(function () {
            hasScrolledmobile();
        });

        jQuery(window).load(function () {
            if (Modernizr.mq('only all and (min-width: 1200px)')) {
                var currentEl = jQuery(".header-menu > .current-menu-item");
                var jQueryt = jQuery(".header-menu .sub-menu");
                var submenuOverlay = jQuery("header .submenu-overlay");
                jQuery(document).on("click", "li.menu-item-has-children > a", function () {
                    var self = jQuery(this);
                    var jQueryct = jQuery(this).parent().find("ul.sub-menu");

                    var offsetParent = jQuery(this).parent().offset().left + (jQuery(this).parent().width() / 2);
                    var widthSubMenu = jQueryct.width() / 2;
                    var offsetSubMenu = offsetParent - widthSubMenu;
                    console.log(offsetSubMenu);
                    jQueryct.css('left', offsetSubMenu + 'px');

                    jQuery(".header-menu li").removeClass("current-menu-item");
                    if (jQueryct.is(':visible')) {
                        currentEl.addClass("current-menu-item");
                        jQueryct.slideUp('fast');
                        submenuOverlay.slideUp('fast');
                    } else if (jQueryt.is(':visible')) {
                        self.parent().addClass("current-menu-item");
                        jQueryt.hide();
                        jQueryct.show();
                    } else {
                        self.parent().addClass("current-menu-item");
                        jQueryct.slideDown('fast');
                        submenuOverlay.slideDown('fast');
                    }
                    return false;
                });

                jQuery(window).scroll(function () {
                    if (jQueryt.is(':visible')) {
                        jQuery(".header-menu li").removeClass("current-menu-item");
                        currentEl.addClass("current-menu-item");
                        jQueryt.slideUp('fast');
                        submenuOverlay.slideUp('fast');
                    }
                });
            }

        });
    },
//    menuFade: function () {
//        jQuery(window).load(function () {
//            jQuery('.site-menu').fadeIn(200);
//        })
//    },
    referentieCarousel: function () {
        jQuery(".referentieCt .right-part .naam").text(jQuery("#referentie-carousal").find(".item.active").data("naam")).show('slow');
        jQuery(".referentieCt .right-part .functie").text(jQuery("#referentie-carousal").find(".item.active").data("functie")).show('slow');

        // for (var i = 0; i < jQuery("#referentie-carousal").find(".item.active").data("star"); i++) {
        //     jQuery(".referentieCt .right-part .star").append('<i class="iconc-star"></i>').show('slow');
        // };

        jQuery('#referentie-carousal').bind('slide.bs.carousel', function (e) {
            // var self = jQuery(this);
            var index = jQuery(e.relatedTarget).index();
            var selector = jQuery('.item[data-index=' + index + ']');

            jQuery(".referentieCt .right-part .star").html('');
            jQuery(".referentieCt .right-part .naam").fadeOut(50, function () {
                jQuery(this).text(selector.data("naam"));
                jQuery(this).fadeIn('slow');
            });
            jQuery(".referentieCt .right-part .functie").fadeOut(50, function () {
                jQuery(this).text(selector.data("functie"));
                jQuery(this).fadeIn('slow');
            });

            // jQuery(".referentieCt .right-part .star").fadeOut('slow', function () {
            //     for (var i = 0; i < self.find(".item.active").data("star"); i++) {
            //         jQuery(".referentieCt .right-part .star").append('<i class="iconc-star"></i>');
            //         jQuery(".referentieCt .right-part .star").fadeIn('slow');
            //     };
            // });
        });
    },
    footersticky: function () {
        jQuery(window).scroll(function () {
            if (jQuery(window).scrollTop() + jQuery(window).height() > jQuery(document).height() - 100) {
                jQuery(".sticky_footer").fadeOut();
            } else {
                jQuery(".sticky_footer").fadeIn();
            }
        });
        jQuery('#main-inner').bind('scroll', function () {
            if (jQuery(this).scrollTop() + jQuery(this).innerHeight() >= jQuery(this)[0].scrollHeight) {
                jQuery(".sticky_footer").fadeOut();
            } else {
                jQuery(".sticky_footer").fadeIn();
            }
        });
    },
    footerAnimation: function () {
        jQuery(window).load(function () {
            if (jQuery(".EDGE-342676945").length > 0) {
                AdobeEdge.loadComposition(edge_url + 'eye-icon-v2', 'EDGE-342676945', {
                    scaleToFit: "height",
                    centerStage: "horizontal",
                    minW: "0px",
                    maxW: "undefined",
                    width: "50px",
                    height: "50px",
                    bScaleToParent: "true"
                }, {"dom": {}}, {"dom": {}});
            }
        });
    }

}

var cookieManager = {
    init: function () {
        var self = this;
        jQuery('#cookie-accordian li.active input').prop('checked', true);

        var cookiesavedid = Cookies.get('cookie_catid');
        if (cookiesavedid == '') {
            return false;
        } else if (cookiesavedid) {
            this.startUnsetTimer();
        } else {
            jQuery("#cookie-strip").fadeIn(500);
        }

        jQuery("#cookie-strip .popup-strip-btn, #cookie-strip .cookie-accept-btn").click(function () {
            Cookies.set('cookie_catid', '', {expires: 30});
            jQuery("#cookie-strip").fadeOut(500);
            return false;
        });

        jQuery("#popup-cookie-accept").click(function () {
            Cookies.set('cookie_catid', '', {expires: 30});
            jQuery("#cookie-strip").fadeOut(500);
        });

        jQuery("#cookie-strip .show-cookie-popup").click(function () {
            jQuery("#cookie-strip").fadeOut(500);
            jQuery("#cookie-popup").popup({
                color: 'rgb(0,0,0)',
                opacity: 0.8,
                escape: false,
                scrolllock: true,
                autoopen: true,
                transition: 'all 0.5s',
            });
            return false;
        });

        jQuery("#cookie-accordian label").click(function () {
            var self = jQuery(this);
            if (self.parent("li").hasClass("active")) {
                return false;
            }

            self.find("input").prop("checked", true);
            jQuery("#cookie-accordian .cookie-accordian-inner > li").removeClass("active");
            jQuery("#cookie-accordian .cookie-accordian-inner .slide").slideUp(400);
            self.parent("li").addClass("active").find(".slide").slideDown(400);
        });

        jQuery("#cookie-popup .cookies-btn-link").click(function () {
            var selectedcookie = jQuery(".cookie-accordian-inner .active input").val();
            // console.log(selectedcookie);
            Cookies.set('cookie_catid', selectedcookie, {expires: 30});
            self.startUnsetTimer();
            jQuery("#cookie-popup").popup('hide');
            return false;
        });
    },
    startUnsetTimer: function () {
        setInterval(this.checkAndUnset, 3000);
    },
    checkAndUnset: function () {
        var browsercookies = Cookies.get();
        var getcookiesaved = Cookies.get('cookie_catid');
        // console.log(Cookies.get());
        jQuery.each(browsercookies, function (key, data) {
            if (!cookiejsondata[getcookiesaved][key]) {
                if (!exceptionarray[key]) {
                    Cookies.remove(key, {path: "/"});
                }
            }
        });
    }
}

var Shared = {
    popupmessage: function (message) {
        var random = Math.round(new Date().getTime() + (Math.random() * 100));
        var popupid = "popup_" + random;
        var popupid_close = "." + popupid + '_close';

        var message_div = jQuery('<div class="uninstall_popup" id="' + popupid + '" ><a href="#" class="' + popupid + '_close popup_close_btn"><i class="fa fa-close"></i></a><div class="message">' + message + '</div></div>');

        var popup = jQuery(message_div).popup({
            color: 'rgb(0,0,0)',
            opacity: 0.8,
            scrolllock: true,
            autoopen: true,
            offsettop: 50,
            transition: 'all 0.5s',
        });

        jQuery(popupid_close).click(function () {
            var onclose = args['btnclose_onclick'] ? args['btnclose_onclick']() : function () {};
        })
        return popupid;
    },
}


var privacypolicy = {
    init: function () {
        this.stickyHeader();
    },
    stickyHeader: function () {
        jQuery(window).scroll(function () {
            if (jQuery(window).scrollTop() >= 10) {
                jQuery('.privacyPolicyCt-header-inner').addClass('sticky');
            } else {
                jQuery('.privacyPolicyCt-header-inner').removeClass('sticky');
            }
        });
        jQuery(".main").scroll(function () {
            if (jQuery(".main").scrollTop() >= 10) {
                jQuery('.privacyPolicyCt-header-inner').addClass('sticky');
            } else {
                jQuery('.privacyPolicyCt-header-inner').removeClass('sticky');
            }
        });
    }
}

var homePage = {
    init: function () {
        jQuery(window).load(function () {
            homePage.heightSet();
        });

        jQuery(window).resize(function () {
            homePage.heightSet();
        });
    },
    heightSet: function () {
        if (Modernizr.mq('only all and (min-width: 768px)')) {
            var elmaxHeight = Math.max.apply(null, jQuery(".matchHeight").map(function () {
                return jQuery(this).outerHeight();
            }).get());

            jQuery(".matchHeight").css("height", elmaxHeight);

            var imgmaxHeight = Math.max.apply(null, jQuery(".matchImage").map(function () {
                return jQuery(this).outerHeight();
            }).get());

            jQuery(".matchImage").css("height", imgmaxHeight);
        } else {
            jQuery(".matchHeight").css("height", "auto");
        }
    }
}

var pageblog = {
    init: function () {
        jQuery(".blog-overview .btn-loadmore").click(function () {
            pageblog.overviewblog_loadmore(pagenumber, 8, "", 0);
            pagenumber++;
            return false;
        });
    },
    overviewblog_loadmore: function (postpage, numberposts, excludepost, template) {
        var contentbox = jQuery(".blog-posts .content-block");
        Common.circleLoader('show');
        jQuery.ajax({
            type: "POST",
            url: admin_ajax_url,
            data: {
                action: "loadmoreblogs",
                page: postpage,
                postcount: numberposts,
                excludeid: excludepost,
                template: template,
            },
            success: function (data) {
                Common.circleLoader('hide');
                if (data) {
                    contentbox.fadeTo(300, 0, function () {
                        contentbox.append(data);
                        contentbox.fadeTo(300, 1, function () {
                            checkClipSupport.init(".check-clippath");
                        });
                    });
                } else {
                    jQuery(".blog-posts .loadmore-section").fadeOut(300);
                }
            }
        });
    }
}

var singleblog = {
    init: function () {
        jQuery(".blog-single .btn-loadmore").click(function () {
            var currentpost = jQuery(this).data("post");
            pageblog.overviewblog_loadmore(pagenumber, 4, currentpost, 0);
            pagenumber++;
            return false;
        });
    }
}

var pageNieuws = {
    init: function() {

        var portfolioContent = jQuery(".nieuwsCt .portfolio-content-list");
        
        jQuery(".btn-loadmore").click(function () {
            Common.circleLoader('show');
            jQuery.ajax({
                type: "POST",
                url: admin_ajax_url,
                data: {
                    action: "loadmorenieuws",
                    pagenum: pagenumber,
                },
                success: function (data) {
                    Common.circleLoader('hide');
                    if (data) {
                        portfolioContent.fadeTo(300, 0, function () {
                            portfolioContent.append(data);
                            portfolioContent.fadeTo(300, 1, function () {
                                pageportfolio.autoHeightSet();
                                // checkClipSupport.init(".check-clippath");
                            });
                        });
                        jQuery(".btn-loadmore").fadeIn(300);
                    } else {
                        jQuery(".btn-loadmore").fadeOut(300);
                    }
                }
            });

            pagenumber++;
            return false;
        });
    },
    loadmorenieuws: function() {
        var portfolioContent = jQuery(".nieuwsCt .portfolio-content-list");
        Common.circleLoader('show');
        jQuery.ajax({
            type: "POST",
            url: admin_ajax_url,
            data: {
                action: "loadmorenieuws",
                pagenum: pagenumber,
            },
            success: function (data) {
                Common.circleLoader('hide');
                if (data) {
                    portfolioContent.fadeTo(300, 0, function () {
                        portfolioContent.append(data);
                        portfolioContent.fadeTo(300, 1, function () {
                            pageportfolio.autoHeightSet();
                            // checkClipSupport.init(".check-clippath");
                        });
                    });
                    jQuery(".btn-loadmore").fadeIn(300);
                } else {
                    jQuery(".btn-loadmore").fadeOut(300);
                }
            }
        });
    }
}

var pageportfolio = {
    init: function () {

        pageportfolio.animateSingle();

        jQuery(window).load(function () {
            pageportfolio.autoHeightSet();
        });

        jQuery(window).resize(function () {
            pageportfolio.autoHeightSet();
        });

        var portfolioContent = jQuery(".portfolio-posts .container");
        jQuery(".btn-loadmore").click(function () {
            Common.circleLoader('show');
            jQuery.ajax({
                type: "POST",
                url: admin_ajax_url,
                data: {
                    action: "loadmoreportfolio",
                    pagenum: pagenumber,
                },
                success: function (data) {
                    Common.circleLoader('hide');
                    if (data) {
                        portfolioContent.fadeTo(300, 0, function () {
                            portfolioContent.append(data);
                            portfolioContent.fadeTo(300, 1, function () {
                                pageportfolio.autoHeightSet();
                                checkClipSupport.init(".check-clippath");
                            });
                        });
                        jQuery(".btn-loadmore").fadeIn(300);
                    } else {
                        jQuery(".btn-loadmore").fadeOut(300);
                    }
                }
            });

            pagenumber++;
            return false;
        });
        var links = jQuery('.bound');
        var divs = jQuery('.splintter-box');
        links.click(function (event) {
            jQuery(this).parent().addClass("active").siblings().removeClass("active");
            divs.hide();
            divs.filter('.' + event.target.id).show();
//            reposition();
        });

//        jQuery('.category-selector').on('change', function (event) {
//            var $item = jQuery(this),
//                    val = $item.val();
//
//            divs.hide();
//            divs.filter('.' + val).show();
//        });

        jQuery(function ($) {
            $(".category-selector").change(function () {
                var val = $(this).val();
                jQuery('.splintter-box').hide(200, function () {
                    jQuery('.splintter-box.' + val).show();
                });
            });
            // $("#arrow-up").hide();
            // $('#trigger').click(function () {
            //     $('#hide').toggleClass('expand')
            //     $(this).find("#arrow-up, #arrow-down").toggle();
            // })
        });

//        adjust();
//        function adjust() {
//            var heights = [];
//            jQuery('.matchHeight').each(function () {
//                var element = jQuery(this);
//                heights.push(element.height());
//            });
//            var height = Math.max.apply(Math, heights);
//
//            jQuery('.matchHeight').each(function () {
//                var element = jQuery(this);
//                element.height(height);
//            });
//        }
//        ;

//        function reposition() {
//            jQuery('.onze-plintters').find('.boxinfo:visible').each(function (i, el) {
//                var element = jQuery(this);
//                element.removeClass('float-right-medium');
//                if (i % 2 === 0) {
//                    element.addClass('float-right-medium');
//                }
//            })
//        }
    },
    autoHeightSet: function () {
        // var height = {
        //     set: function(){
        //         var heights = [],
        //             height = 'auto';

        //         jQuery('.wrapper-box').each(function () {
        //             var element = jQuery(this);
        //             heights.push( element.outerHeight() );
        //         });

        //         height = Math.max.apply( Math, heights );

        //         jQuery('.wrapper-box').each(function () {
        //             jQuery(this).height(height);
        //         });
        //     },
        //     clear: function(){
        //         jQuery('.wrapper-box').each(function () {
        //             jQuery(this).css('height', 'auto');
        //               var child = jQuery(this).find('.cut');
        //               child.removeClass('cut');

        //         });
        //     }
        // };

        // if( jQuery( window ).width() > 768 ){
        //     height.set();
        // }else{
        //     height.clear();
        // }

        // jQuery( window ).resize(function() {
        //     if( jQuery( window ).width() > 768 ){
        //         height.set();
        //     }
        //     else{
        //         height.clear();
        //     }
        // });

        if (Modernizr.mq('only all and (min-width: 768px)')) {
            var maxHeight = Math.max.apply(null, jQuery(".wrapper-box .heightset").map(function () {
                return jQuery(this).outerHeight();
            }).get());

            jQuery(".wrapper-box .heightset > div").addClass("cut");

            jQuery(".wrapper-box .heightget").each(function () {
                var elHeight = jQuery(this).outerHeight();
                jQuery(this).parents(".wrapper-box").find(".heightset").css("height", elHeight);
            });
        } else {
            jQuery(".wrapper-box .heightset > div").removeClass("cut");
            jQuery(".wrapper-box .heightset").css("height", "auto");
        }
    },

    animateSingle: function () {
        jQuery(document).on("click", "a.open_portfolio_single", function (event) {
            var targetID = jQuery(this).data("pageid");
            var historyurl = jQuery(this).data("href");
            var singleurl = jQuery(this).attr("href");
            Common.circleLoader('show');
            jQuery.ajax({
                type: "POST",
                url: admin_ajax_url,
                data: {
                    action: "portfolioajax",
                    selectedmenu: targetID,
                },
                success: function (data) {
                    Common.circleLoader('hide');
                    jQuery('body').append(data).addClass('ohidden');
                    if (Modernizr.mq('only all and (max-width: 767px)')) {
                        jQuery(".page-slide").hide();
                        jQuery(".singlepage_menu").hide();
                        jQuery(".page-slide").fadeIn(500, function () {
                            jQuery(".singlepage_menu").fadeIn();
                        });
                    } else {
                        jQuery(".page-slide").css("left", "100%");
                        jQuery(".singlepage_menu").hide();
                        jQuery(".page-slide").animate({left: '0%'}, 800, function () {
                            jQuery(".singlepage_menu").fadeIn();
                        });
                    }
                    commonleerpltform.init();
                    history.pushState(null, null, singleurl);
                }
            });
            return false;
        });
    }
}

var pagefaq = {
    init: function () {

//        pagefaq.animateSingle();

//        jQuery(window).load(function () {
//            pagefaq.autoHeightSet();
//        });
//
//        jQuery(window).resize(function () {
//            pagefaq.autoHeightSet();
//        });

        jQuery('.card').on('show.bs.collapse', function () {
            jQuery(this).addClass('white');
        });
        jQuery('.card').on('hidden.bs.collapse', function () {
            jQuery(this).removeClass('white');
        });

        var question = window.location.hash;
        if (question != '' && question != null && typeof (question) != 'undefined') {
            if (!jQuery(question).hasClass('white')) {
                jQuery('.card').find('.collapse').collapse('hide');
                jQuery(question).find('.collapse').collapse('show');
            }
            jQuery('html, body').animate({
                scrollTop: jQuery(question).parent().offset().top
            }, 1500);
        }

        var links = jQuery('.bound');
        var divs = jQuery('.faq-box');
        links.click(function (event) {
            jQuery(this).parent().addClass("active").siblings().removeClass("active");
            divs.hide();
            divs.filter('.' + event.target.id).show();
//            reposition();
        });

//        jQuery('.categorySelect').on('change', function (event) {
//            var $item = jQuery(this),
//                    val = $item.val();
//
//            divs.hide();
//            divs.filter('.' + val).show();
//        });

        jQuery(function ($) {
            $(".faq-filter .category-selector").change(function () {
                var val = $(this).val();
                jQuery('.faq-box').hide(200, function () {
                    jQuery('.faq-box.' + val).show();
                });
            });

            // $("#arrow-up").hide();
            // $('#trigger').click(function () {
            //     $('#hide').toggleClass('expand')
            //     $(this).find("#arrow-up, #arrow-down").toggle();
            // })
        });

//        adjust();
//        function adjust() {
//            var heights = [];
//            jQuery('.matchHeight').each(function () {
//                var element = jQuery(this);
//                heights.push(element.height());
//            });
//            var height = Math.max.apply(Math, heights);
//
//            jQuery('.matchHeight').each(function () {
//                var element = jQuery(this);
//                element.height(height);
//            });
//        }
//        ;

//        function reposition() {
//            jQuery('.onze-plintters').find('.boxinfo:visible').each(function (i, el) {
//                var element = jQuery(this);
//                element.removeClass('float-right-medium');
//                if (i % 2 === 0) {
//                    element.addClass('float-right-medium');
//                }
//            })
//        }

    },
}

var pagedemo = {
    init: function(){
		demoMatchHeight();

		jQuery( window ).resize(function(){
			demoMatchHeight();
		});

		function demoMatchHeight(){
			if( jQuery(window).width() >= 768 ){
				jQuery(".matchHeight").css("min-height", 'initial');

				var maxHeight = Math.max.apply(null, jQuery(".matchHeight").map(function () {
					return jQuery(this).outerHeight() + 5;
				}).get());

				jQuery(".matchHeight").css("min-height", maxHeight);
			}
			else{
				jQuery(".matchHeight").css("min-height", 'initial');
			}
		}
    }
//    init: function () {
//        jQuery(window).load(function () {
//            singlevacature.heightSet();
//        });
//    },
//    heightSet: function () {
//        var maxHeight = Math.max.apply(null, jQuery(".matchHeight").map(function () {
//            return jQuery(this).outerHeight();
//        }).get());
//
//        jQuery(".matchHeight").css("height", maxHeight);
//    }
}

var leer_elearning_overview_commom = {
    init: function () {
        if (Modernizr.mq('only all and (min-width: 768px)')) {
            var maxHeight = Math.max.apply(null, jQuery(".excerpt-data").map(function () {
                return jQuery(this).outerHeight() + 5;
            }).get());

            var maxtitleHeight = Math.max.apply(null, jQuery(".title-data").map(function () {
                return jQuery(this).outerHeight();
            }).get());

            jQuery(".excerpt-data").css("min-height", maxHeight);
            jQuery(".title-data").css("min-height", maxtitleHeight);
        } else {
            jQuery(".excerpt-data").css("min-height", "auto");
            jQuery(".title-data").css("min-height", "auto");
        }
    }
}

var pagecontact = {
    init: function () {
        console.log("pagecontact");
    },
}
var pagelandingspage = {
    init: function () {
        console.log("pagelandingspage");
    },
}

var pageoverzichtleerplatform = {
    init: function () {
        jQuery(".header-menu .page-elearning").addClass("current-menu-item");

        jQuery(window).load(function () {
            leer_elearning_overview_commom.init();
        });

        jQuery(window).resize(function () {
            leer_elearning_overview_commom.init();
        });

        jQuery("a.open_popup_single_leerplatform").click(function () {
            var targetID = jQuery(this).data("pageid");
            var hashdata = jQuery(this).data("hash");
            var singleurl = jQuery(this).attr("href");
            Common.circleLoader('show');
            jQuery.ajax({
                type: "POST",
                url: admin_ajax_url,
                data: {
                    action: "leerplatformajax",
                    selectedmenu: targetID,
                },
                success: function (data) {
                    Common.circleLoader('hide');
                    jQuery('body').append(data).addClass('ohidden');
                    if (Modernizr.mq('only all and (max-width: 767px)')) {
                        jQuery(".page-slide").hide();
                        jQuery(".singlepage_menu").hide();
                        jQuery(".page-slide").fadeIn(500, function () {
                            jQuery(".singlepage_menu").fadeIn();
                            jQuery('.page-slide-wrapper').animate({
                                scrollTop: jQuery("#" + hashdata).position().top - 100
                            }, 1000);
                        });
                    } else {
                        jQuery(".page-slide").css("left", "100%");
                        jQuery(".singlepage_menu").hide();
                        jQuery(".page-slide").animate({left: '0%'}, 800, function () {
                            jQuery(".singlepage_menu").fadeIn();
                            jQuery('.page-slide-wrapper').animate({
                                scrollTop: jQuery("#" + hashdata).position().top - 100
                            }, 1000);
                        });
                    }

                    commonleerpltform.init();
                    history.pushState(null, null, singleurl);
                }
            });
            return false;
        });

        jQuery("a.open_popup_single_andere").click(function () {
            var targetID = jQuery(this).data("pageid");
            var hashdata = jQuery(this).data("hash");
            var singleurl = jQuery(this).attr("href");
            Common.circleLoader('show');
            jQuery.ajax({
                type: "POST",
                url: admin_ajax_url,
                data: {
                    action: "andereajax",
                    selectedmenu: targetID,
                },
                success: function (data) {
                    Common.circleLoader('hide');
                    jQuery('body').append(data).addClass('ohidden');
                    if (Modernizr.mq('only all and (max-width: 767px)')) {
                        jQuery(".page-slide").hide();
                        jQuery(".singlepage_menu").hide();
                        jQuery(".page-slide").fadeIn(500, function () {
                            jQuery(".singlepage_menu").fadeIn();
                            jQuery('.page-slide-wrapper').animate({
                                scrollTop: jQuery("#" + hashdata).position().top - 100
                            }, 1000);
                        });
                    } else {
                        jQuery(".page-slide").css("left", "100%");
                        jQuery(".singlepage_menu").hide();
                        jQuery(".page-slide").animate({left: '0%'}, 800, function () {
                            jQuery(".singlepage_menu").fadeIn();
                            jQuery('.page-slide-wrapper').animate({
                                scrollTop: jQuery("#" + hashdata).position().top - 100
                            }, 1000);
                        });
                    }
                    commonleerpltform.init();
                    history.pushState(null, null, singleurl);
                }
            });
            return false;
        });
    }
}

var pagepartners = {
    init: function () {
        console.log("pagepartners");
    },
}
var pagewerkenbij = {
    init: function () {
        // To make parent active
        jQuery(".header-menu .page-splintt").addClass("current-menu-item");

        jQuery(".werken-overview .btn-loadmore").click(function () {
            pageblog.overviewblog_loadmore(pagenumber, 2, "", 0);
            pagenumber++;
            return false;
        });

        jQuery(".werken-collega-overview .btn-loadmorecollega").click(function () {
            pagewerkenbij.collega_loadmore(pagenumber, 2);
            pagenumber++;
            return false;
        });

        jQuery(document).on("click", ".collega-post .werken-haspopup", function () {
            var popupEl = jQuery(this).data("popupid");
            jQuery("#" + popupEl).popup({
                color: 'rgb(0,0,0)',
                opacity: 0.8,
                escape: false,
                scrolllock: true,
                autoopen: true,
                transition: 'all 0.5s',
            });
            return false;
        });
    },

    collega_loadmore: function (postpage, numberposts) {
        var contentbox = jQuery(".werken-bijCt .collega-post");
        Common.circleLoader('show');
        jQuery.ajax({
            type: "POST",
            url: admin_ajax_url,
            data: {
                action: "loadmorecollegas",
                page: postpage,
                postcount: numberposts,
            },
            success: function (data) {
                Common.circleLoader('hide');
                if (data) {
                    contentbox.fadeTo(300, 0, function () {
                        contentbox.append(data);
                        contentbox.fadeTo(300, 1, function () {
                            checkClipSupport.init(".check-clippath");
                        });
                    });
                } else {
                    jQuery(".werken-bijCt .loadmore-collega-section").fadeOut(300);
                }
            }
        });
    }
}
var pagewijzijnsplinters = {
    init: function () {
        // To make parent active
        jQuery(".header-menu .page-splintt").addClass("current-menu-item");

        pagewijzijnsplinters.owlcarousel();

        //console.log("pagewijzijnsplinters");
        var links = jQuery('.bound');
        var divs = jQuery('.splintter-box');
        links.click(function (event) {
            jQuery(this).parent().addClass("active").siblings().removeClass("active");
            divs.hide();
            divs.filter('.' + event.target.id).show();
            reposition();
        });

        jQuery(function ($) {
            $(".onze-plintters select.category-selector").change(function () {
                var val = $(this).val();
                jQuery('.splintter-box').hide(200, function () {
                    jQuery('.splintter-box.' + val).show();
                });
            });
        });

        adjust();
        function adjust() {
            var heights = [];
            jQuery('.matchHeight').each(function () {
                var element = jQuery(this);
                heights.push(element.height());
            });
            var height = Math.max.apply(Math, heights);

            jQuery('.matchHeight').each(function () {
                var element = jQuery(this);
                element.height(height);
            });
        }
        ;

        function reposition() {
            jQuery('.onze-plintters').find('.boxinfo:visible').each(function (i, el) {
                var element = jQuery(this);
                element.removeClass('float-right-medium');
                if (i % 2 === 0) {
                    element.addClass('float-right-medium');
                }
            })
        }

        jQuery(".onze-plintters .desktop-splintters .boxinfo").mouseenter(function () {
            var container = jQuery(this);
            var main = container.find('.image-visible');
            var secondary = container.find('.image-not-visible');

            main.removeClass('image-visible').addClass('image-not-visible').hide();
            secondary.removeClass('image-not-visible').addClass('image-visible').show();
        }).mouseleave(function () {
            console.log('leave');
            var container = jQuery(this);
            var secondary = container.find('.image-visible');
            var main = container.find('.image-not-visible');

            secondary.removeClass('image-visible').addClass('image-not-visible').hide();
            main.removeClass('image-not-visible').addClass('image-visible').show();
        });
    },

    owlcarousel: function () {
        var owl = jQuery(".owl-common");

        owl.owlCarousel({
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    stagePadding: 0,
                    margin: 0,
                }
            },

            nav: false,
            autoPlay: true,
            slideSpeed: 200,
            paginationSpeed: 800,
            rewindSpeed: 1000,
            loop: true,

            navText: [
                '<i class="iconc-chevron-light-left"></i>',
                '<i class="iconc-chevron-light-right"></i>'
            ],
        });
    }
}

var singleportfolio = {
    init: function () {
        jQuery("body").css("overflow", "hidden");
        commonleerpltform.init();
    },
}


var singlevacature = {
    init: function () {
        jQuery(window).load(function () {
            singlevacature.heightSet();
        });
    },
    heightSet: function () {
        var maxHeight = Math.max.apply(null, jQuery(".matchHeight").map(function () {
            return jQuery(this).outerHeight();
        }).get());
        jQuery(".matchHeight").css("height", maxHeight);
    }
}


var pageoverzichtlearning = {
    init: function () {
        jQuery(".header-menu .page-elearning").addClass("current-menu-item");

        jQuery(window).load(function () {
            leer_elearning_overview_commom.init();
        });

        jQuery(window).resize(function () {
            leer_elearning_overview_commom.init();
        });

        jQuery("a.open_popup_single_elarning").click(function () {
            var targetID = jQuery(this).data("pageid");
            var hashdata = jQuery(this).data("hash");
            var singleurl = jQuery(this).attr("href");
            Common.circleLoader('show');
            jQuery.ajax({
                type: "POST",
                url: admin_ajax_url,
                data: {
                    action: "elearningajax",
                    selectedmenu: targetID,
                },
                success: function (data) {
                    Common.circleLoader('hide');
                    jQuery('body').append(data).addClass('ohidden');
                    if (Modernizr.mq('only all and (max-width: 767px)')) {
                        jQuery(".page-slide").hide();
                        jQuery(".singlepage_menu").hide();
                        jQuery(".page-slide").fadeIn(500, function () {
                            jQuery(".singlepage_menu").fadeIn();
                            jQuery('.page-slide-wrapper').animate({
                                scrollTop: jQuery("#" + hashdata).position().top - 100
                            }, 1000);
                        });
                    } else {
                        jQuery(".page-slide").css("left", "100%");
                        jQuery(".singlepage_menu").hide();
                        jQuery(".page-slide").animate({left: '0%'}, 800, function () {
                            jQuery(".singlepage_menu").fadeIn();
                            jQuery('.page-slide-wrapper').animate({
                                scrollTop: jQuery("#" + hashdata).position().top - 100
                            }, 1000);
                        });
                    }
                    commonleerpltform.init();
                    history.pushState(null, null, singleurl);
                }
            });
            return false;
        });
    }
}

var singleandere = {
    init: function () {
        jQuery("body").css("overflow", "hidden");
        var hashdata = jQuery(".singlepage_menu .close_singlepage_menu").data("sectionhash");
        if (hashdata) {
            jQuery('.page-slide-wrapper').animate({
                scrollTop: jQuery("#" + hashdata).position().top - 100
            }, 1000);
        }
        commonleerpltform.init();
    }
}

var singleleraning = {
    init: function () {
        jQuery("body").css("overflow", "hidden");
        var hashdata = jQuery(".singlepage_menu .close_singlepage_menu").data("sectionhash");
        if (hashdata) {
            jQuery('.page-slide-wrapper').animate({
                scrollTop: jQuery("#" + hashdata).position().top - 100
            }, 1000);
        }
        commonleerpltform.init();
    }
}

var singleleerplatform = {
    init: function () {
        jQuery("body").css("overflow", "hidden");
        var hashdata = jQuery(".singlepage_menu .close_singlepage_menu").data("sectionhash");
        if (hashdata) {
            jQuery('.page-slide-wrapper').animate({
                scrollTop: jQuery("#" + hashdata).position().top - 100
            }, 1000);
        }
        commonleerpltform.init();
    }
}

var commonleerpltform = {
    init: function () {
        commonleerpltform.scrollToSection();
        commonleerpltform.responsiveToggleImageElement();

        jQuery(window).resize(function () {
            commonleerpltform.responsiveToggleImageElement();
        });
    },
    scrollToSection: function () {
        var elSlide = jQuery('.page-slide');
        var elSlider = jQuery('.page-slide-wrapper');
        jQuery('.page-slide-wrapper').scroll(function () {
            scrolltop = jQuery(this).scrollTop();
            commonleerpltform.setActive(scrolltop);
        });

        var elClick = '.singlepage_menu li a';
        jQuery(document).on('click', elClick, function (event) {
            currentEl = jQuery(this).attr("href");
            scrolltop = elSlider.scrollTop();
            elSlider.animate({
                scrollTop: jQuery(currentEl).position().top + scrolltop - 100
            }, 1000);
            return false;
        });


        jQuery(document).on('change', '.select-anchor', function () {
            currentEl = jQuery(this).val();
            scrolltop = elSlider.scrollTop();
            elSlider.animate({
                scrollTop: jQuery(currentEl).position().top + scrolltop - 100
            }, 1000);
        });

        jQuery(".close_singlepage_menu a").click(function () {
            var thishref = jQuery(this).attr("href");
            var dataoverview = jQuery(this).data("overview");
            if (thishref == "#") {
                elSlide.fadeOut("slow", function () {
                    jQuery(this).remove();
                    jQuery("body").removeClass("ohidden");
                    history.pushState(null, null, dataoverview);
                });
            } else {
                window.location.href = thishref;
            }
            return false;
        });
    },
    responsiveToggleImageElement: function () {
        if (Modernizr.mq('only all and (min-width: 992px)')) {
            jQuery(".section_data:odd").each(function () {
                jQuery(this).find('.section_data_left').append(jQuery(this).find('.image-wrapper'));
                jQuery(this).find('.section_data_right').append(jQuery(this).find('.content-wrapper'));
            });
        } else {
            jQuery(".section_data:odd").each(function () {
                jQuery(this).find('.section_data_left').append(jQuery(this).find('.content-wrapper'));
                jQuery(this).find('.section_data_right').append(jQuery(this).find('.image-wrapper'));
            });
        }
    },
    setActive: function (scrolltop) {
        var winHeight = window.innerHeight;
        var winHalfHeight = winHeight / 2;
        var winThirdHeight = winHeight / 3;

        jQuery(".singlepage_menu li a").each(function () {
            parentEl = jQuery(this);
            currentEl = parentEl.attr("href");
             currentElpos = jQuery(currentEl).position().top + scrolltop - jQuery(currentEl).height();
            if (scrolltop > currentElpos) {
                jQuery(".singlepage_menu li a").removeClass("active");
                parentEl.addClass("active");

            }
        });
    },
}

var checkClipSupport = {
    init: function (elClass) {
        if (checkClipSupport.fn_checkSupport()) {
            jQuery(elClass).addClass('has-clippath');
        } else {
            jQuery(elClass).addClass('has-gradient');
        }
    },

    fn_checkSupport: function () {
        var base = 'clipPath',
                prefixes = ['webkit', 'moz', 'ms', 'o'],
                properties = [base],
                testElement = document.createElement('testelement'),
                attribute = 'polygon(50% 0%, 0% 100%, 100% 100%)';

        // Push the prefixed properties into the array of properties.
        for (var i = 0, l = prefixes.length; i < l; i++) {
            var prefixedProperty = prefixes[i] + base.charAt(0).toUpperCase() + base.slice(1); // remember to capitalize!
            properties.push(prefixedProperty);
        }

        // Interate over the properties and see if they pass two tests.
        for (var i = 0, l = properties.length; i < l; i++) {
            var property = properties[i];

            // First, they need to even support clip-path (IE <= 11 does not)...
            if (testElement.style[property] === '') {

                // Second, we need to see what happens when we try to create a CSS shape...
                testElement.style[property] = attribute;
                if (testElement.style[property] !== '') {
                    return true;
                }
            }
        }

        return false;
    }
};

/* Start ------------------------------------- */

jQuery(function () {
    Core.init();
    Global.init();

    if (body.hasClass("page-template-page-legal")) {
        privacypolicy.init();
    }
    if (body.hasClass("page-template-page-home")) {
        homePage.init();
    }
    if (body.hasClass("page-template-page-landingspage")) {
        singlevacature.init();
    }
    if (body.hasClass("page-template-page-blog")) {
        pageblog.init();
    }
    if (body.hasClass("single-post")) {
        singleblog.init();
    }
    if (body.hasClass("page-template-page-contact")) {
        pagecontact.init();
    }
    if (body.hasClass("page-template-page-landingspage")) {
        pagelandingspage.init();
    }
    if (body.hasClass("page-template-page-overzicht-e-learning")) {
        pageoverzichtlearning.init();
    }
    if (body.hasClass("page-template-page-overzicht-leerplatform")) {
        pageoverzichtleerplatform.init();
    }
    if (body.hasClass("page-template-page-partners")) {
        pagepartners.init();
    }
    if (body.hasClass("page-template-page-werken-bij")) {
        pagewerkenbij.init();
    }
    if (body.hasClass("page-template-page-wij-zijn-de-splinters")) {
        pagewijzijnsplinters.init();
    }
    if (body.hasClass("single-elearning")) {
        singleleraning.init();
    }
    if (body.hasClass("single-leerplatform")) {
        singleleerplatform.init();
    }
    if (body.hasClass("single-andere_system")) {
        singleandere.init();
    }
    if (body.hasClass("page-template-page-portfolio")) {
        pageportfolio.init();
    }
    if (body.hasClass("page-template-page-faq")) {
        pagefaq.init();
    }
    if (body.hasClass("single-portfolio")) {
        singleportfolio.init();
    }
    if (body.hasClass("single-vacature")) {
        singlevacature.init();
    }
    if (body.hasClass("page-template-page-demo")){
        pagedemo.init();
    }

    if (body.hasClass("page-template-page-nieuws")){
        pageNieuws.init();
    }

    jQuery(window).on('resize', function () {
        if (Modernizr.mq('only all and (max-width: 991px)')) {
            body.css("padding-top", 0);
            if (scrollTop > 0) {
                jQuery('#main-inner').animate({scrollTop: scrollTop}, 100);
            }
        }
    });

	if( jQuery( '[data-toggle="jquery-nice-select"]' ).length > 0 ){
		jQuery( '[data-toggle="jquery-nice-select"]' ).each( function(){
			var $item = jQuery( this );

			$item.niceSelect();
		});
	}
});
