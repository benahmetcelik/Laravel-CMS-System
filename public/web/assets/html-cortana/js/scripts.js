
(function($) {
    "use strict";
    /*==============================
        Is mobile
    ==============================*/
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    }

    /*==============================
        Main function
    ==============================*/

    /* SEARCHBAR CONTROL
    ************/
    function searchControl(){
        var searchBtn = $('.search-btn'),
            closeBtn = $('.btn-close');

        searchBtn.on('click', function(){
            if($(this).closest('.header').children('.searchbar').length != 0){
                $(this).closest('.header').toggleClass('active-search');
                $(this).closest('.header').children('.searchbar').toggleClass('active');
            }
        });

        closeBtn.on('click', function(){
            $(this).closest('.header').removeClass('active-search');
            $(this).closest('.searchbar').removeClass('active');
        });
    }

    function cartControl(){
        var cartBtn = $('.cart-btn'),
            pageWrap = $('#page-wrap');

        cartBtn.each(function() {
            $(this).on('click', function(){
                $(this).siblings('.menu-cart').toggleClass('open-cart');
            });
        });

        // Check if .header outside .page-wrap
        if(pageWrap.find('.header').length == 0){
            pageWrap.on('click', function(){
                $('.menu-cart').removeClass('open-cart');
            });
        }
    }

    function fnHeaderResize() {
        var header = $('.header'),
            windowWidth = window.innerWidth;
        header.each(function() {
            var mediascreen = $(this).find('.navigation').data('menu-type'),
                haschild = $(this).find('.menu-item-has-children'),
                numberMenu = $(this).find('.mobile-nav-menu').data('menu-number');

            if(windowWidth <= mediascreen){
                $('body').prepend('<div class="menu-mobile-' + numberMenu + '" data-number="' + numberMenu + '"></div>');

                var nav = $(this).find('.navigation');
                // Add Back Button to sub-menu mobile
                nav.find('ul.sub-menu').prepend('<li class="nav-back"><a href="#"><i class="fa fa-angle-left"></i>Back</a></li>');

                // Remove Mega Menu
                if(nav.find('.menu-item-has-children').hasClass('activeHover')){
                    nav.find('.activeHover').addClass('anchorHover').removeClass('activeHover');
                }
                if(nav.find('.menu-item-has-children').hasClass('megamenu')){
                    nav.find('.megamenu').removeClass('megamenu');
                }

                // Move Navigation to Menu Mobile
                nav.appendTo('.menu-mobile-' + numberMenu);

                // Remove navBar5
                if($(this).children('.navBar5').length != 0){
                    $('.navBar5').remove();
                }

                // Display Mobile Nav Button
                $(this).find('.mobile-nav-menu').addClass('il-bl');

                // Event click Back Button from sub-menu mobile
                $('.nav-back').on('click', function(e){
                    e.preventDefault();
                    $(this).closest('.menu-item-has-children').removeClass('active');
                });

                // add active to open sub-menu on mobile
                haschild.children('a:first-child').on('click', function(e){
                    e.preventDefault();
                    $(this).parent().closest('.menu-item-has-children').addClass('active');
                });
            }
        });

        var menuMobile = $('[class*="menu-mobile-"]');
        if(menuMobile.length != 0){
            // Check each menu-mobile
            menuMobile.each(function() {
                var mediascreenResponsive = $(this).find('.navigation').data('menu-type');
                if(windowWidth > mediascreenResponsive){
                    var number = $(this).data('number'),
                        pin = $(this);
                    pin.find('.nav-back').remove();
                    // Check each header
                    header.each(function() {
                        var numberMenu = $(this).find('.mobile-nav-menu').data('menu-number');
                        // If menuMobile number = Mobile-nav-menu number
                        if(number == numberMenu){
                            // Find from menu-mobile
                            var nav = pin.find('.navigation');
                            if($(this).children('.main-header').hasClass('main-header-5')){
                                $(this).append('<div class="navBar5"><div class="container"></div></div>');
                                nav.appendTo($(this).children('.navBar5').children('.container'));
                            } else if($(this).children('.main-header').hasClass('main-header-6')){
                                nav.prependTo($(this).children('.navBar6').children('.container'));
                            } else {
                                nav.appendTo($(this).children('.main-header').children('.container'));
                            }

                            pin.remove();
                            $(this).find('.mobile-nav-menu').removeClass('il-bl');

                            var new_nav = $(this).find('.navigation');
                            new_nav.find('[class*="mega-col-"]').addClass('megamenu');
                            new_nav.find('.anchorHover').addClass('activeHover').removeClass('anchorHover');
                        }
                    });
                }
            });
        }
    }

    function fnHeader(){
        var header = $('.header'),
            windowWidth = window.innerWidth,
            pageWrap = $('#page-wrap');

        // Toggle when click mobile-nav-menu
        $('.mobile-nav-menu').on('click', function(){
            var menuBtn = $(this).data('menu-number');
            var menuMobile = $('[class*="menu-mobile-"]');

            // Add mobile-active to mobile-nav
            if($(this).hasClass('mobile-active')){
                $(this).removeClass('mobile-active');
            } else {
                $('.mobile-nav-menu').removeClass('mobile-active');
                $(this).addClass('mobile-active');
            }

            menuMobile.each(function() {
                var menuNumber = $(this).data('number');
                if(menuBtn == menuNumber){
                    $(this).toggleClass('fixSfr');
                } else{
                    $(this).removeClass('fixSfr');
                }

                // Check menu-mobile active to translate page-wrap
                if($('body').find('.fixSfr').length != 0){
                    if($('#page-wrap').find('.header').length == 0){
                        pageWrap.addClass('toggle-translate active');
                    } else {
                        pageWrap.addClass('toggle-translate');
                    }
                    setTimeout(function(){
                        $('html, body').addClass('overflow-hidden');
                    }, 290);
                } else {
                    pageWrap.removeClass('toggle-translate active');
                    setTimeout(function(){
                        $('html, body').removeClass('overflow-hidden');
                    }, 290);
                }

                // Check if .header outside .page-wrap
                if(pageWrap.find('.header').length == 0){
                    $('.header').toggleClass('header-active');
                    // Click page-wrap to remove menu
                    pageWrap.on('click', function(){
                        $(this).removeClass('toggle-translate active');
                        $('.header').removeClass('header-active');
                        $('[class*="menu-mobile-"]').removeClass('fixSfr');
                        $('.mobile-nav-menu').removeClass('mobile-active');
                        $('html, body').removeClass('overflow-hidden');
                    });
                }
            });
        });

        // Disable href '#' from navigation link
        $(".navigation a").on("click", function(e){
            if($(this).attr('href') == '#'){
                e.preventDefault();
            }
        });
    }

    function headerFixedResize() {
        var header = $('.header');

        if(header.length == 1) {
            var mainHeader = header.children('.main-header'),
                mainHeight = mainHeader.outerHeight(),
                windowWidth = window.innerWidth;

            // Header has "top-header"
            if(header.children('.top-header').length != 0){
                var topHeight = header.children('.top-header').outerHeight();
            } else {
                var topHeight = 0;
            }

            // Get Header Height
            if(mainHeader.hasClass('main-header-5')){ // If Main header 5
                var navBar5 = header.children('.navBar5'),
                    navBar5Height = navBar5.outerHeight();

                var headerHeight = topHeight + mainHeight + navBar5Height;
            } else if(mainHeader.hasClass('main-header-6')) { //If Main header 6
                var navBar6 = header.children('.navBar6'),
                    navBar6Height = navBar6.outerHeight();

                var headerHeight = topHeight + mainHeight + navBar6Height;
            } else {
                headerHeight = topHeight + mainHeight;
            }

            /////////////
            // Add resized height '.fix-header'
            if((header.children().hasClass('main-header-1') == false) && (header.children().hasClass('main-header-2') == false) && (header.children().hasClass('main-header-4') == false)){
                $('.fix-header').css('height', headerHeight);
            }

            /////////////
            // Responsive
            var menuMobile = $('[class*="menu-mobile-"]');

            if(menuMobile.length != 0){
                var mediascreenResponsive = menuMobile.find('.navigation').data('menu-type');

                if(windowWidth <= mediascreenResponsive){
                    // If has main-header-2
                    if(header.children().hasClass('main-header-2') == true){
                        header.css('top', '0');
                        header.children('.main-header-2').css('background-color', 'rgba(255, 255, 255, 1)');
                        header.children('.searchbar').removeAttr('style');
                    }
                }

                // Add fix-header for main-header-1 or main-header-2 or main-header-4
                if((header.children().hasClass('main-header-1') == true) || (header.children().hasClass('main-header-2') == true) || (header.children().hasClass('main-header-4') == true)){
                    if(windowWidth <= 767){
                        // Append '.fix-header' width height = Header's height
                        if($('.fix-header').length == 0){
                            header.after('<div class="fix-header" style="height:' + headerHeight + 'px"></div>');
                        } else {
                            $('.fix-header').css('height', headerHeight);
                        }

                        // if main-header-1
                        if(header.children().hasClass('main-header-1')){
                            header.children('.main-header-1').css('background-color', 'rgba(0, 0, 0, 1)');
                        }
                    } else {
                        $('.fix-header').remove();
                        // if main-header-1
                        if(header.children().hasClass('main-header-1')){
                            header.children('.main-header-1').attr('style', '');
                        }
                    }
                }
            } else {
                var mediascreen = header.find('.navigation').data('menu-type');

                if(windowWidth > mediascreen){
                    // If has main-header-2
                    if(header.children().hasClass('main-header-2') == true){
                        header.css('top', '40px');
                        header.children('.main-header-2').removeAttr('style');
                        // searchbar
                        header.children('.searchbar').css({
                            'opacity': '0',
                            'visibility': 'hidden'
                        });
                    }
                }
            }
        }
    }

    function headerFixed(){
        var header = $('.header'),
            pageWrap = $('#page-wrap');

        // Page have 1 header
        if(header.length == 1){
            var mainHeader = header.children('.main-header'),
                mainHeight = mainHeader.outerHeight(),
                searchBar = header.children('.searchbar'),
                windowWidth = window.innerWidth;

                // Header has "top-header"
                if(header.children('.top-header').length != 0){
                    var topHeight = header.children('.top-header').outerHeight();
                } else {
                    var topHeight = 0;
                }

            header.removeClass('header-fixed');

            // Get Header Height
            if(mainHeader.hasClass('main-header-5')){ // If Main header 5
                var navBar5 = header.children('.navBar5'),
                    navBar5Height = navBar5.outerHeight();

                var headerHeight = topHeight + mainHeight + navBar5Height;
            } else if(mainHeader.hasClass('main-header-6')) { //If Main header 6
                var navBar6 = header.children('.navBar6'),
                    navBar6Height = navBar6.outerHeight();

                var headerHeight = topHeight + mainHeight + navBar6Height;
            } else {
                headerHeight = topHeight + mainHeight;
            }

            //////////////////
            // if header hasn't 'main-header-1', 'main-header-2', 'main-header-4'
            if((header.children().hasClass('main-header-1') == false) && (header.children().hasClass('main-header-2') == false) && (header.children().hasClass('main-header-4') == false)){
                // Append '.fix-header' width height = Header's height
                if($('.fix-header').length == 0){
                    header.after('<div class="fix-header" style="height:' + headerHeight + 'px"></div>');
                }
            } else { // if header has 'main-header-1', 'main-header-2', 'main-header-4'
                // header has 'main-header-2'
                if(header.children().hasClass('main-header-2') == true){
                    // Keep header from top by 40px
                    header.css('top', '40px');
                    header.children('.main-header-2').removeAttr('style');
                    // searchbar
                    header.children('.searchbar').css({
                        'opacity': '0',
                        'visibility': 'hidden'
                    });

                    var menuMobile = $('[class*="menu-mobile-"]'),
                        windowWidth = window.innerWidth;
                    // Displayed mobile's menu
                    if(menuMobile.length != 0){
                        // get data-menu-type from navigation
                        var mediascreenResponsive = menuMobile.find('.navigation').data('menu-type');

                        // if screen's width < data-menu-type
                        if(windowWidth <= mediascreenResponsive){
                            header.css('top', '0');
                            header.children('.main-header-2').css('background-color', 'rgba(255, 255, 255, 1)');
                            header.children('.searchbar').removeAttr('style');
                        }
                    }
                }

                if(windowWidth <= 767){
                    // Append '.fix-header' width height = Header's height
                    if($('.fix-header').length == 0){
                        header.after('<div class="fix-header" style="height:' + headerHeight + 'px"></div>');
                    } else {
                        $('.fix-header').css('height', headerHeight);
                    }

                    // if main-header-1
                    if(header.children().hasClass('main-header-1')){
                        header.children('.main-header-1').css('background-color', 'rgba(0, 0, 0, 1)');
                    }
                } else {
                    $('.fix-header').remove();
                    // if main-header-1
                    if(header.children().hasClass('main-header-1')){
                        header.children('.main-header-1').attr('style', '');
                    }
                }
            }

            //////////////////
            // Page Not Found

            if(pageWrap.find('.section').hasClass('page-not-found') == true){
                if(header.children('.main-header').hasClass('main-header-6')){
                    header.children('.main-header').css({
                        'opacity': '0',
                        'visibility': 'hidden'
                    });
                    searchBar.addClass('searchbar-fixed');
                }
                header.addClass('header-fixed header-fixed--unpin').removeClass('header-fixed--pin active-search');
                pageWrap.css('padding-top', 0);
                header.children('.top-header').remove();
                header.siblings('.fix-header').remove();
            }

            /////////////////
            //Scroll Fix Header
            var scrollPos = 0;
            $(window).scroll(function(event){
                //Sets the current scroll position
                var scrollCur = $(this).scrollTop();
                //Determines up-or-down scrolling

                if(scrollCur <= (topHeight + mainHeight) && mainHeader.hasClass('main-header-6')){
                    if(pageWrap.find('.section').hasClass('page-not-found') == true){
                        if(scrollCur == 0){
                            // header.children('.navBar6').addClass('navBar6-fixed navBar6-fixed--unpin').removeClass('navBar6-fixed--pin');
                            header.addClass('header-fixed header-fixed--unpin').removeClass('header-fixed--pin active-search');
                            header.children('.main-header').css({
                                'opacity': '0',
                                'visibility': 'hidden'
                            });
                            searchBar.addClass('searchbar-fixed').removeClass('active');
                        }
                    } else {
                        // navBar6.removeClass('navBar6-fixed navBar6-fixed--pin navBar6-fixed--unpin');
                        header.removeClass('header-fixed header-fixed--pin header-fixed--unpin');
                        searchBar.removeClass('searchbar-fixed');
                    }
                } else if(scrollCur <= topHeight && !mainHeader.hasClass('main-header-6')){
                    if(pageWrap.find('.section').hasClass('page-not-found') == true){
                        if(scrollCur == 0){
                            // header.children('.main-header').addClass('main-header-fixed main-header-fixed--unpin').removeClass('main-header-fixed--pin');
                            header.addClass('header-fixed header-fixed--unpin').removeClass('header-fixed--pin active-search');
                            pageWrap.css('padding-top', 0);
                            header.children('.top-header').remove();
                            header.siblings('.fix-header').remove();
                            searchBar.removeClass('active');
                        }
                    } else {
                        // mainHeader.removeClass("main-header-fixed main-header-fixed--pin main-header-fixed--unpin");
                        header.removeClass('header-fixed header-fixed--pin header-fixed--unpin');
                        searchBar.removeClass('searchbar-fixed');
                        if(mainHeader.hasClass('main-header-1')){
                            mainHeader.removeClass('black');
                            if(mainHeader.hasClass('bd-anchor')){
                                mainHeader.addClass('bd-b-alpha').removeClass('bd-anchor');
                            }
                        }
                    }

                } else if (scrollCur > scrollPos && scrollCur > 300){
                    //Scroll Down
                    header.removeClass('header-fixed--pin').addClass('header-fixed--unpin');
                    if(mainHeader.hasClass('main-header-1')){
                        mainHeader.addClass('black');
                        if(mainHeader.hasClass('bd-b-alpha')){
                            mainHeader.addClass('bd-anchor').removeClass('bd-b-alpha');
                        }
                    }
                } else {
                    //Scroll Up
                    if(scrollCur > 300){
                        header.removeClass('header-fixed--unpin').addClass('header-fixed header-fixed--pin');
                        searchBar.addClass('searchbar-fixed');
                    }
                }
                //Updates scroll position
                scrollPos = scrollCur;
            });

        }
    }

    /* HOME MEDIA
    ************/
    function homeSlider() {
        // Demo REVOLUTION SLIDER
        var homeMedia = $('#home-media'),
            homeHeight = homeMedia.data('home-media');

        if($('.tp-banner').length){
          jQuery('.tp-banner').show().revolution(
          {
            dottedOverlay:"none",
            delay:16000,
            startwidth:1170,
            startheight:homeHeight,
            hideThumbs:200,
            hideTimerBar:"on",

            thumbWidth:100,
            thumbHeight:50,
            thumbAmount:5,

            navigationType:"none",
            navigationArrows:"solo",
            navigationStyle:"",

            touchenabled:"on",
            onHoverStop:"on",

            swipe_velocity: 0.7,
            swipe_min_touches: 1,
            swipe_max_touches: 1,
            drag_block_vertical: false,

            hideBulletsOnMobile:"on",
            hideArrowsOnMobile:"on",

            parallax:"mouse",
            parallaxBgFreeze:"on",
            parallaxLevels:[7,4,3,2,5,4,3,2,1,0],

            keyboardNavigation:"off",

            navigationHAlign:"center",
            navigationVAlign:"bottom",
            navigationHOffset:0,
            navigationVOffset:20,

            soloArrowLeftHalign:"left",
            soloArrowLeftValign:"center",
            soloArrowLeftHOffset:0,
            soloArrowLeftVOffset:0,

            soloArrowRightHalign:"right",
            soloArrowRightValign:"center",
            soloArrowRightHOffset:0,
            soloArrowRightVOffset:0,

            shadow:0,
            fullWidth:"on",
            fullScreen:"off",

            spinner:"spinner1",

            stopLoop:"off",
            stopAfterLoops:-1,
            stopAtSlide:-1,

            shuffle:"off",

            autoHeight:"off",
            forceFullWidth:"off",



            hideThumbsOnMobile:"off",
            hideNavDelayOnMobile:1500,
            // hideBulletsOnMobile:"off",
            // hideArrowsOnMobile:"off",
            hideThumbsUnderResolution:0,

            hideSliderAtLimit:0,
            hideCaptionAtLimit:0,
            hideAllCaptionAtLilmit:0,
            startWithSlide:0,
            videoJsPath:"rs-plugin/videojs/",
            fullScreenOffsetContainer: ""
          });
        } //if
    }

    /* OWL CAROUSEL
    ************/
    function owlCarouselSlider(){
        // Note: Just 1 Slider of kind in one page

        if ($('.client-slider').length > 0){
            $('.client-slider').owlCarousel({
                margin: 30,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                loop: true,
                nav: false,
                navText: ['<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>'],
                dots: false,
                responsive:{
                    0:{
                        items: 1
                    },
                    641:{
                        items: 3
                    },
                    992:{
                        items: 4
                    },
                    1200:{
                        items: 6
                    }
                }
            });
        }

        if ($('.testimonial-slider').length > 0){
            var numberSlide = $('.testimonial-slider').data('number-slide');
            $('.testimonial-slider').owlCarousel({
                margin: 30,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                loop: true,
                nav: false,
                navText: ['<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>'],
                dots: false,
                responsive:{
                    0:{
                        items: 1
                    },
                    768:{
                        items: 1
                    },
                    992:{
                        items: numberSlide
                    },
                    1200:{
                        items: numberSlide
                    }
                }
            });
        }

        if ($('.portfolio-slider').length > 0){
            $('.portfolio-slider').owlCarousel({
                margin: 30,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                loop: true,
                nav: true,
                navText: ['<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>'],
                dots: false,
                responsive:{
                    0:{
                        items: 1
                    },
                    641:{
                        items: 2
                    },
                    768:{
                        items: 3
                    },
                    1200:{
                        items: 4
                    },
                    1600:{
                        items: 6
                    }
                }
            });
        }

        if ($('.product-thumb-list-slider').length > 0){
            $('.product-thumb-list-slider').owlCarousel({
                margin: 8,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                loop: true,
                nav: false,
                navText: ['<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>'],
                dots: false,
                responsive:{
                    0:{
                        items: 2
                    },
                    481:{
                        items: 4
                    },
                }
            });
        }

        // SYNC SLIDER
        // Work Slider
        var owlItem = $('.work-slider'),
            owlThumb = $('.work-item-slider'),
            flag = false,
            duration = 300;

        if (owlItem.length > 0){
            owlItem.owlCarousel({
                autoplay: false,
                loop: false,
                nav: true,
                navText: ['<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>'],
                dots: false,
                responsive:{
                    0:{
                        items: 1
                    }
                },
            }).on('changed.owl.carousel', function(e) {
              if (!flag) {
                flag = true;
                owlThumb.trigger('to.owl.carousel', [e.item.index, duration, true]);
                owlThumb.find('.owl-item').removeClass('current');
                owlThumb.find('.owl-item').eq(e.item.index).addClass('current');
                flag = false;
              }
            });
        }

        // Work Item Slider
        if (owlThumb.length > 0){
            owlThumb.owlCarousel({
                margin: 30,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                loop: false,
                nav: false,
                navText: ['<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>'],
                dots: false,
                responsive:{
                    0:{
                        items: 1
                    },
                    481:{
                        items: 2
                    },
                    768:{
                        items: 3
                    },
                    1200:{
                        items: 4
                    },
                },
            }).on('click', '.owl-item', function(e) {
              owlItem.trigger('to.owl.carousel', [$(this).index(), duration, true]);
              $(this).siblings().removeClass('current');
              $(this).addClass('current');
              e.preventDefault();
            }).on('changed.owl.carousel', function(e) {
              if (!flag) {
                flag = true;
                owlItem.trigger('to.owl.carousel', [e.item.index, duration, true]);
                flag = false;
              }
            });
        }

    }

    function portfolioIsotope() {
        $('.isotope-grid-wrapper').each(function() {
            var el = $(this),
                workItem = el.find('.portfolio-item, .grid-sizer'),
                columnGap = el.data('column-gap'),
                columnGapHorizotal = el.data('column-gap-horizotal'),
                columnGapVertical = el.data('column-gap-vertical');
            if (el.attr('data-column-gap-horizotal') !== 'undefined') {
                el.find('.isotope-grid-row').css({
                    'margin-left': -columnGapHorizotal/2,
                    'margin-right': -columnGapHorizotal/2
                });
                el.find('.portfolio-item').css({
                    'padding-left': columnGapHorizotal/2,
                    'padding-right': columnGapHorizotal/2
                });
            }
            if (el.attr('data-column-gap-vertical') !== 'undefined') {
                el.find('.isotope-grid-row').css({
                    'margin-top': -columnGapVertical/2,
                    'margin-bottom': -columnGapVertical/2
                });
                el.find('.portfolio-item').css({
                    'padding-left': columnGapVertical/2,
                    'padding-right': columnGapVertical/2
                });
            }
            if (el.attr('data-column-gap') !== 'undefined') {
                el.find('.isotope-grid-row').css({
                    'margin': -columnGap/2
                });
                el.find('.portfolio-item').css({
                    'padding': columnGap/2
                });
            }
            // Change hover link when data-column-gap = 0
            if (el.attr('data-column-gap') == 0){
                workItem.each(function() {
                    if($(this).find('h5').length != 0){
                        var text = $(this).find('h5 > a').html();
                        $(this).find('a.overlay').append('<span class="h5 text-uppercase">' + text + '</span>');
                        $(this).find('.portfolio-media').css('margin-bottom', '-5px');
                        $(this).find('h5').remove();
                    }
                });
            }

            var portfolioContainer = el.find('.isotope-grid'),
                filters = el.siblings('.filters');
            filters.on('click', 'a', function() {
                var selector = $(this).attr('data-filter');
                $('.current', filters).removeClass('current');
                $(this).addClass('current');
                portfolioContainer.isotope({
                    layoutMode: 'masonry',
                    itemSelector: '.portfolio-item',
                    filter: selector
                });

                return false;
            });


        });
    }

    function portfolioIsotopeResize() {
        $('.isotope-grid-wrapper').each(function() {
            var el = $(this),
                windowWidth = window.innerWidth,
                mediumDevices = 1200,
                smallDevices = 992,
                extrasmallDevices = 768,
                tinyDevices = 480,
                responsiveMd = el.data('column-md'),
                responsiveSm = el.data('column-sm'),
                responsiveXs = el.data('column-xs'),
                responsiveTn = el.data('column-tn'),
                isotopeColumn = el.data('isotope-column'),
                workItem = el.find('.portfolio-item, .grid-sizer');
            if (windowWidth < tinyDevices) {
                workItem.css('width', 100/responsiveTn + '%');
            } else if (windowWidth < extrasmallDevices) {
                workItem.css('width', 100/responsiveXs + '%');
            } else if(windowWidth < smallDevices) {
                workItem.css('width', 100/responsiveSm + '%');
            } else if(windowWidth < mediumDevices) {
                workItem.css('width', 100/responsiveMd + '%');
            } else {
                workItem.css('width', 100/isotopeColumn + '%');
            }

            var portfolioContainer = el.find('.isotope-grid'),
                ratio = 1,
                windowWidth    = Math.max($(window).width(), window.innerWidth),
                itemWidth      = el.find('.grid-sizer').width(),
                itemHeight     = Math.floor(itemWidth * ratio),
                itemTallHeight = itemHeight * 2;

            portfolioContainer.imagesLoaded(function() {
                portfolioContainer.isotope({
                    layoutMode: 'masonry',
                    itemSelector: '.portfolio-item',
                    transitionDuration: '0.5s',
                });
            });
        });
    }

    /* SELECT TO DIV
    ************/
    function select2div(){
        if ($('select').length) {
            $('select').select2({
                minimumResultsForSearch: Infinity,
            });
        }
    }

    function scrollParallax(){
        $('.bg-parallax').each(function() {
            if(isMobile.any()){
                $(this).css('background-attachment', 'scroll');
            } else{
                $(this).parallax("50%", 0.2);
            }
        });
    }

    function countUp(){
        var number = $('.count-number');

        number.each(function() {
            // Set data-to attribute to '.count-number'
            if($(this).attr('data-to') == undefined){
                var value = $(this).html().match(/\d+/);
                $(this).attr('data-to', value);

                // reset text default
                $(this).text('0');
            }

            $(this).waypoint(function(direction) {
                $(this).countTo({
                    speed: '1500',
                    refreshInterval: 50
                });
            },{
              triggerOnce: true,
              offset: function(){
                return $.waypoints('viewportHeight') - $(this).outerHeight() - 150;
              }
            });
        });
    }


    function progressBar(){
        var progress = $('.progress');

        progress.each(function() {
            $(this).waypoint(function(direction){
                var progressBar = $(this).children('.progress-bar');
                var getPercent = (progressBar.data('progress-percent'));

                progressBar.css('width', getPercent + '%');
            },{
                triggerOnce: true,
                offset: function(){
                    return $.waypoints('viewportHeight') - $(this).outerHeight() - 150;
                }
            });
        });

    }

    $.fn.switchTabs = function(){
        $(this).each(function() {
            var el = $(this).children('.switch-tabs-nav'),
                switchBody = el.siblings('.switch-tabs-body');

            // Click switch tab
            switchBody.children('.switch-content:not(:first)').hide();
            el.on('click', 'a', function(){
                el.children().removeClass('active');
                $(this).parent().addClass('active');
                switchBody.children('.switch-content').hide();

                var activeTab = $(this).attr('href');
                $(activeTab).show();
                return false;
            });

            var totalWidth = 0;
            el.children().each( function() {
                var width = $(this).outerWidth();
                totalWidth += width;
            });
            $(window).resize( function () {
                var widthWrap = el.outerWidth();
                if (widthWrap <= totalWidth) {
                    el.addClass('responsive');
                } else {
                    el.removeClass('responsive');
                }
            }).trigger('resize');
        });
    }


    function galleryThumbBox(){
        var gallery = $('.gallery');

        if(gallery.length) {
            if(gallery.children().length == 1) {
                gallery.magnificPopup({
                    type: 'image',
                    delegate: 'a',
                    closeOnContentClick: true,
                    closeBtnInside: false,
                    fixedContentPos: true,
                    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
                    image: {
                        verticalFit: true
                    },
                    zoom: {
                        enabled: true,
                        duration: 300 // don't foget to change the duration also in CSS
                    }
                });
            } else {
                gallery.magnificPopup({
                    gallery: {
                      enabled:true,
                      preload: [0,1]
                    },
                    delegate: 'a',
                    type: 'image',
                    removalDelay: 500, //delay removal by X to allow out-animation
                    callbacks: {
                        beforeOpen: function() {
                          // just a hack that adds mfp-anim class to markup
                           this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                           this.st.mainClass = this.st.el.attr('data-effect');
                        },
                        buildControls: function() {
                            // re-appends controls inside the main container
                            this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
                        }
                    },
                    image: {
                        verticalFit: true,
                    },
                    closeOnContentClick: false,
                    showCloseBtn: false,
                    midClick: false, // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
                });
            }
        }
    }

    function widgetModify(){
        var widgetSidebar = $('#sidebar').find('.widget'),
            widgetFooter = $('#footer').find('.widget'),
            sidebar = $('#sidebar'),
            footer = $('#footer');

        if(widgetSidebar.hasClass('widget_about')){
            sidebar.find('.widget_about').each(function() {
                $(this).children('.social-list').addClass('black');
            });
        }

        if(widgetSidebar.hasClass('widget_subscribe')){
            sidebar.find('.widget_subscribe').each(function() {
                $(this).find('input').removeClass('black');
            });
        }

        if(widgetFooter.hasClass('widget_linklist') || widgetFooter.hasClass('widget_download')){
            footer.find('.widget_linklist').each(function(){
                $(this).find('a.btn').removeClass('btn-gray').addClass('btn-black');
            });
            footer.find('.widget_download').each(function(){
                $(this).find('a.btn').removeClass('btn-download').addClass('btn-black');
            });
        }
    }

    function bootstrapTouchSpin() {
        var input = $('.input_quantity');

        if($('input').hasClass('input_quantity')){
            input.each(function() {
                $(this).TouchSpin({
                    verticalbuttons: true,
                    verticalupclass: 'fa fa-angle-up',
                    verticaldownclass: 'fa fa-angle-down',
                    initval: 1,
                });
            });
        }
    }

    function singleShop() {
        var mainThumb = $('.product-image').children('.product-thumb'),
            viceThumb = $('.product-image').children('.product-thumb-list-slider');

        viceThumb.find('a.overlay').on('click', function(e){
            e.preventDefault();
            var newSrc = $(this).attr('data-image');

            // Remove active product-thumb, add active this
            viceThumb.find('.product-thumb').removeClass('active');
            $(this).parent().addClass('active');

            // Add newSrc to main Thumbnail Image
            mainThumb.children('img').attr('src', newSrc);
            mainThumb.children('a.overlay').attr('data-image', newSrc);

            e.preventDefault();
        });

        // Remove active product-thumb-list when click main Thumb
        mainThumb.find('a.overlay').on('click', function(e){
            viceThumb.removeClass('active');
            e.preventDefault();
        });
    }

    function sectionCenter(){
        var secHead = $('.section-header');

        secHead.each(function() {
            var scr = $(this).data('section-center'),
                windowWidth = window.innerWidth;

            if($(this).attr('data-section-center')){
                if(windowWidth <= scr){
                    $(this).addClass('center');
                } else {
                    $(this).removeClass('center');
                }
            }
        });
    }

    function backgroundImage() {
        var databackground = $('[data-background]');
        databackground.each(function() {
            if ($(this).attr('data-background')) {
                var bg = $(this).attr('data-background');
                $(this).css('background-image', 'url(' + bg + ')');
            }
        });
    }

    // Ready, call function
    searchControl();        // Searchbar
    cartControl();          // Cart
    fnHeader();             // Header
    headerFixed();          // Header fixed scroll
    homeSlider();           // Home Slider
    countUp();              // Counter
    progressBar();          // Progress Bar
    select2div();           // Change Select tag into Div
    owlCarouselSlider();    // Owl Carousel
    galleryThumbBox();      // Gallery
    portfolioIsotope();     // Isotope
    widgetModify();         // Widget Modify
    bootstrapTouchSpin();   // Bootstrap TouchSpin
    singleShop();           // Image Detail
    backgroundImage();


    $(window).on('load', function() {
        $('#preload').addClass('completed');

        $('.switch-tabs').switchTabs();
    });

    $(window).on('resize', function() {
        headerFixedResize();
    });

    $(window).on('resize', function() {
        portfolioIsotopeResize();
        fnHeaderResize();
        scrollParallax();       // Parallax
        sectionCenter();        // Align Center for Section Header Responsive
    }).trigger('resize');


})(jQuery);