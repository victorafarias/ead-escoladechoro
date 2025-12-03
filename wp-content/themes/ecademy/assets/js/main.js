(function($){
	"use strict";
	jQuery(document).on('ready', function () {

        // Header Sticky
		$(window).on('scroll',function() {
            if ($(this).scrollTop() > 120){
                $('.navbar-area').addClass("is-sticky");
                $('.cw-top-header').addClass("d-none");
            }
            else{
                $('.navbar-area').removeClass("is-sticky");
                $('.cw-top-header').removeClass("d-none");
            }
        });

        $(window).on('scroll',function() {
            if ($(this).scrollTop() > 120){
                $('.navbar-areas').addClass("is-sticky");
                $('.cw-top-header').addClass("d-none");
            }
            else{
                $('.navbar-areas').removeClass("is-sticky");
                $('.cw-top-header').removeClass("d-none");
            }
        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

        // Newsletter Modal JS
        if (jQuery(".newsletter-modal")[0]) {
            var popDisplayed = $.cookie('popDisplayed');
            if(popDisplayed == '1'){
                console.log('');
            }else{
                setTimeout(function(){
                    $("body").addClass('modal-open');
                    $("#newsletter-modal").fadeIn(500);
                }, 3000);
                $.cookie('popDisplayed', '1', { expires: 1 });

                $(".btn-yes").on('click', function () {
                    $("#newsletter-modal").fadeOut(500);
                    $("body").removeClass('modal-open');
                });
            }
        }

        // Button has no icon
        $('.default-btn').each(function() {
            if ($(this).find('i').hasClass('no-icon')) {
                $(this).addClass('btn-no-icon'); 
            }
        });
        
        // Odometer JS
        $('.odometer').appears(function(e) {
			var odo = $(".odometer");
			odo.each(function() {
				var countNumber = $(this).attr("data-count");
				$(this).html(countNumber);
			});
        });


        $(".search-submit, .blog_widget #bbp_search_submit").val('');

        // Bbpress Breadcrumbs
        if ($('.bbp-breadcrumb').length > 0) {
            $( '.bbp-breadcrumb' ).appendTo( $(".bbpress-breadcrumbs"));
        }

        // Others Option Responsive JS
        $(".others-option-for-responsive .dot-menu").on("click", function(){
            $(".others-option-for-responsive .container .container").toggleClass("active");
        });

        // Button Hover JS
        $(function() {
            $('.default-btn')
            .on('mouseenter', function(e) {
                var parentOffset = $(this).offset(),
                relX = e.pageX - parentOffset.left,
                relY = e.pageY - parentOffset.top;
                $(this).find('span').css({top:relY, left:relX})
            })
            .on('mouseout', function(e) {
                var parentOffset = $(this).offset(),
                relX = e.pageX - parentOffset.left,
                relY = e.pageY - parentOffset.top;
                $(this).find('span').css({top:relY, left:relX})
            });
        });

        // FAQ Accordion
        $(function() {
            $('.accordion').find('.accordion-title').on('click', function(){
                // Adds Active Class
                $(this).toggleClass('active');
                // Expand or Collapse This Panel
                $(this).next().slideToggle('fast');
                // Hide The Other Panels
                $('.accordion-content').not($(this).next()).slideUp('fast');
                // Removes Active Class From Other Titles
                $('.accordion-title').not($(this)).removeClass('active');
            });
        });

        // Mean Menu
		$('.mean-menu').meanmenu({
			meanScreenWidth: "1199"
        });

        $(".learnpress .become-teacher-form .form-fields .form-field label").first().append("<span>*</span>");
        $(".learnpress .become-teacher-form .form-fields .form-field:nth-child(2) label").append("<span>*</span>");

        // Banner Animation
        window.onload = function() {
            var timeline = new TimelineMax();
            timeline.from(".main-banner-content, .main-banner-courses-list, .banner-wrapper-content, .banner-wrapper-image, .banner-content, .banner-image", 1, {y:60},0)
        }

         // Banner Animation
        window.onload = function() {
            var timeline = new TimelineMax();
            timeline.from(".online-art-banner-image, .online-art-banner-content, .online-art-banner-wrap-image, .instructor-banner-content, .instructor-banner-image", 1, {y:60},0)
        }

        // TweenMax JS
        $('.oa-video-box').mousemove(function(e){
            var wx = $(window).width();
            var wy = $(window).height();
            var x = e.pageX - this.offsetLeft;
            var y = e.pageY - this.offsetTop;
            var newx = x - wx/2;
            var newy = y - wy/2;
            $('.oa-video-shape-1, .oa-video-shape-2, .oa-video-shape-3').each(function(){
                var speed = $(this).attr('data-speed');
                if($(this).attr('data-revert')) speed *= -1;
                TweenMax.to($(this), 1, {x: (1 - newx*speed), y: (1 - newy*speed)});
            });
        });

        // Isotop Js
        var $grid = $('.blog-items, .courses-items').isotope({
            itemSelector: '.grid-item',
            percentPosition: true,
            masonry: {
                // Use outer width of grid-sizer for columnWidth
                columnWidth: '.grid-item'
            }
        });

        // Isotop Js
        var $grid = $('.op-gallery-items').isotope({
            itemSelector: '.grid-item',
            percentPosition: true,
            masonry: {
                // Use outer width of grid-sizer for columnWidth
                columnWidth: '.grid-item'
            }
        });

        $('.op-gallery-items').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function(item) {
                    return item.el.attr('title');
                }
            }
        });

        // Popup Image
		$('.popup-btn').magnificPopup({
            type: 'image',
            gallery: {
                enabled:true
            }
        });

        // Tabs
        (function ($) {
            $('.tab ul.tabs').addClass('active').find('> li:eq(0)').addClass('current');
            $('.tab ul.tabs li a').on('click', function (g) {
                var tab = $(this).closest('.tab'),
                index = $(this).closest('li').index();
                tab.find('ul.tabs > li').removeClass('current');
                $(this).closest('li').addClass('current');
                tab.find('.tab-content').find('div.tabs-item').not('div.tabs-item:eq(' + index + ')').slideUp();
                tab.find('.tab-content').find('div.tabs-item:eq(' + index + ')').slideDown();
                g.preventDefault();
            });
        })(jQuery);

        // Price Range Slider JS
        $(".js-range-of-price").ionRangeSlider({
            type: "double",
            drag_interval: true,
            min_interval: null,
            max_interval: null,
        });

        // Input Plus & Minus Number JS
        $('.input-counter').each(function() {
            var spinner = jQuery(this),
            input = spinner.find('input[type="text"]'),
            btnUp = spinner.find('.plus-btn'),
            btnDown = spinner.find('.minus-btn'),
            min = input.attr('min'),
            max = input.attr('max');

            btnUp.on('click', function() {
                var oldValue = parseFloat(input.val());
                if (oldValue >= max) {
                    var newVal = oldValue;
                } else {
                    var newVal = oldValue + 1;
                }
                spinner.find("input").val(newVal);
                spinner.find("input").trigger("change");
            });
            btnDown.on('click', function() {
                var oldValue = parseFloat(input.val());
                if (oldValue <= min) {
                    var newVal = oldValue;
                } else {
                    var newVal = oldValue - 1;
                }
                spinner.find("input").val(newVal);
                spinner.find("input").trigger("change");
            });
        });

        // Nice Select JS
        $('select').niceSelect();

        // Popup Video
		$('.popup-youtube').magnificPopup({
			disableOn: 320,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false
        });

        // Check if elements with the class "search-toggler" exist
        const searchTogglers = document.querySelectorAll(".search-toggler");
        if (searchTogglers.length > 0) {
            // Attach a click event listener to each "search-toggler" element
            searchTogglers.forEach((searchToggler) => {
                searchToggler.addEventListener("click", function (e) {
                e.preventDefault();
                
                // Toggle the class "active" on elements with the class "search-popup"
                const searchPopup = document.querySelector(".search-popup");
                if (searchPopup) {
                    searchPopup.classList.toggle("active");
                }

                // Remove the class "expanded" from elements with the class "mobile-nav__wrapper"
                const mobileNavWrapper = document.querySelector(".mobile-nav-wrapper");
                if (mobileNavWrapper) {
                    mobileNavWrapper.classList.remove("expanded");
                }
                });
            });
        }

        // Go to Top
        $(function(){
            // Scroll Event
            $(window).on('scroll', function(){
                var scrolled = $(window).scrollTop();
                if (scrolled > 300) $('.go-top').addClass('active');
                if (scrolled < 300) $('.go-top').removeClass('active');
            });
            // Click Event
            $('.go-top').on('click', function() {
                $("html, body").animate({ scrollTop: "0" },  500);
            });
        });
    });

	// WoW JS
	$(window).on ('load', function (){
        if ($(".wow").length) {
            var wow = new WOW ({
                boxClass:     'wow',      // Animated element css class (default is wow)
                animateClass: 'animated', // Animation css class (default is animated)
                offset:       20,         // Distance to the element when triggering the animation (default is 0)
                mobile:       true,       // Trigger animations on mobile devices (default is true)
                live:         true,       // Act on asynchronously loaded content (default is true)
            });
            wow.init();
        }
    });

    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/widget', function( $scope ) {
            // Blog Slides
            $('.blog-slides').owlCarousel({
                loop: true,
                nav: true,
                dots: true,
                autoplayHoverPause: true,
                autoplay: true,
                margin: 30,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ],
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 3,
                    }
                }
            });

            // Feedback Slides
            $('.feedback-slides').owlCarousel({
                loop: true,
                nav: false,
                dots: true,
                autoplayHoverPause: true,
                autoplay: true,
                animateOut: 'fadeOut',
                autoHeight: true,
                items: 1,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ],
            });
            // Sidebar Sticky
            $('.courses-sidebar-sticky').stickySidebar({
                topSpacing: 90,
                bottomSpacing: 90
            });

            // Testimonials Slides
            $('.testimonials-slides').owlCarousel({
                loop: true,
                nav: false,
                dots: true,
                autoplayHoverPause: true,
                autoplay: true,
                animateOut: 'fadeOut',
                autoHeight: true,
                items: 1,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ],
            });

            // Feedback Slides Two
            $('.feedback-slides-two').owlCarousel({
                loop: true,
                nav: false,
                dots: true,
                autoplayHoverPause: true,
                autoplay: true,
                margin: 30,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ],
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },
                    1200: {
                        items: 2,
                    }
                }
            });

            // Article Image Slides
            $('.article-image-slides').owlCarousel({
                loop: true,
                nav: true,
                dots: false,
                autoplayHoverPause: true,
                autoplay: true,
                animateOut: 'fadeOut',
                items: 1,
                navText: [
                    "<i class='flaticon-chevron'></i>",
                    "<i class='flaticon-right-arrow'></i>"
                ],
            });

            // Courses Slides
            $('.courses-slides').owlCarousel({
                loop: true,
                nav: true,
                dots: true,
                autoplayHoverPause: true,
                autoplay: true,
                margin: 30,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ],
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 3,
                    }
                }
            });

            // Advisor Slides Two
            $('.advisor-slides-two').owlCarousel({
                loop: true,
                nav: false,
                dots: true,
                autoplayHoverPause: true,
                autoplay: true,
                margin: 30,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ],
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 2,
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 3,
                    }
                }
            });

            // Advisor Slides
            $('.advisor-slides').owlCarousel({
                loop: true,
                nav: false,
                dots: true,
                autoplayHoverPause: true,
                autoplay: true,
                margin: 30,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ],
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 2,
                    },
                    768: {
                        items: 1,
                    },
                    992: {
                        items: 2,
                    }
                }
            });

            // Coach Partners Slides
            $('.coach-partners-slides').owlCarousel({
                loop:true,
                margin:100,
                dots:false,
                nav:false,
                items:6,
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 1
                    },
                    768: {
                        margin:20,
                        items: 2
                    },
                    992: {
                        items: 4
                    },
                    1200: {
                        items: 6
                    }
                }
            });

            // Coach Testimonial Slider
            $('.coach-testimonial-slider').owlCarousel({
                loop: false,
                margin: 24,
                nav: true,
                dots: true,
                autoplayHoverPause: true,
                autoplay: true,
                items: 1
            })

            // MixItUp Shorting
            $(function(){
                $('.shorting').mixItUp();
            });

            // Uy-Hero-slides
            $('.uy-hero-slides').owlCarousel({
                loop:true,
                margin:0,
                dots:true,
                nav:false,
                autoplayTimeout: 2000,
                smartSpeed: 1000,
                animateOut: 'slideOutUp',
                items:1
            });

            // Coach Sales Slides
            $('.coach-sales-slides').owlCarousel({
                loop: true,
                nav: true,
                dots: false,
                autoplayHoverPause: true,
                margin: 30,
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 1
                    },
                    768: {
                        items: 1
                    },
                    992: {
                        items: 2
                    },
                    1200: {
                        items: 3
                    }
                }
            });

            // TweenMax JS
            $('.main-banner, .banner-section, .banner-wrapper-area, .banner-wrapper').mousemove(function(e){
                var wx = $(window).width();
                var wy = $(window).height();
                var x = e.pageX - this.offsetLeft;
                var y = e.pageY - this.offsetTop;
                var newx = x - wx/2;
                var newy = y - wy/2;
                $('.banner-shape1, .banner-shape2, .banner-shape3, .banner-shape4, .banner-shape5, .banner-shape6, .banner-shape7, .banner-shape8, .banner-shape9, .banner-shape10, .banner-shape11, .banner-shape12, .banner-shape13').each(function(){
                    var speed = $(this).attr('data-speed');
                    if($(this).attr('data-revert')) speed *= -1;
                    TweenMax.to($(this), 1, {x: (1 - newx*speed), y: (1 - newy*speed)});
                });
            });
            $('.about-area, .about-area-two, .about-area-three').mousemove(function(e){
                var wx = $(window).width();
                var wy = $(window).height();
                var x = e.pageX - this.offsetLeft;
                var y = e.pageY - this.offsetTop;
                var newx = x - wx/2;
                var newy = y - wy/2;
                $('.shape1, .shape2, .shape3, .shape4, .shape6, .shape7, .shape8, .shape9, .shape10, .shape11, .shape12, .shape13, .shape14, .shape15, .shape16, .shape17, .shape18, .shape19, .shape20, .shape21, .shape22, .shape23').each(function(){
                    var speed = $(this).attr('data-speed');
                    if($(this).attr('data-revert')) speed *= -1;
                    TweenMax.to($(this), 1, {x: (1 - newx*speed), y: (1 - newy*speed)});
                });
            });
            $('.funfacts-and-feedback-area').mousemove(function(e){
                var wx = $(window).width();
                var wy = $(window).height();
                var x = e.pageX - this.offsetLeft;
                var y = e.pageY - this.offsetTop;
                var newx = x - wx/2;
                var newy = y - wy/2;
                $('.shape1, .shape2, .shape3, .shape4, .shape6, .shape7, .shape8, .shape9, .shape10, .shape11, .shape12, .shape13, .shape14, .shape15, .shape16, .shape17, .shape18, .shape19, .shape20, .shape21, .shape22, .shape23').each(function(){
                    var speed = $(this).attr('data-speed');
                    if($(this).attr('data-revert')) speed *= -1;
                    TweenMax.to($(this), 1, {x: (1 - newx*speed), y: (1 - newy*speed)});
                });
            });
            $('.get-instant-courses-area').mousemove(function(e){
                var wx = $(window).width();
                var wy = $(window).height();
                var x = e.pageX - this.offsetLeft;
                var y = e.pageY - this.offsetTop;
                var newx = x - wx/2;
                var newy = y - wy/2;
                $('.shape1, .shape2, .shape3, .shape4, .shape6, .shape7, .shape8, .shape9, .shape10, .shape11, .shape12, .shape13, .shape14, .shape15, .shape16, .shape17, .shape18, .shape19, .shape20, .shape21, .shape22, .shape23').each(function(){
                    var speed = $(this).attr('data-speed');
                    if($(this).attr('data-revert')) speed *= -1;
                    TweenMax.to($(this), 1, {x: (1 - newx*speed), y: (1 - newy*speed)});
                });
            });
            $('.view-all-courses-area, .view-all-courses-area-two').mousemove(function(e){
                var wx = $(window).width();
                var wy = $(window).height();
                var x = e.pageX - this.offsetLeft;
                var y = e.pageY - this.offsetTop;
                var newx = x - wx/2;
                var newy = y - wy/2;
                $('.shape1, .shape2, .shape3, .shape4, .shape6, .shape7, .shape8, .shape9, .shape10, .shape11, .shape12, .shape13, .shape14, .shape15, .shape16, .shape17, .shape18, .shape19, .shape20, .shape21, .shape22, .shape23').each(function(){
                    var speed = $(this).attr('data-speed');
                    if($(this).attr('data-revert')) speed *= -1;
                    TweenMax.to($(this), 1, {x: (1 - newx*speed), y: (1 - newy*speed)});
                });
            });
            $('.premium-access-area').mousemove(function(e){
                var wx = $(window).width();
                var wy = $(window).height();
                var x = e.pageX - this.offsetLeft;
                var y = e.pageY - this.offsetTop;
                var newx = x - wx/2;
                var newy = y - wy/2;
                $('.shape1, .shape2, .shape3, .shape4, .shape6, .shape7, .shape8, .shape9, .shape10, .shape11, .shape12, .shape13, .shape14, .shape15, .shape16, .shape17, .shape18, .shape19, .shape20, .shape21, .shape22, .shape23').each(function(){
                    var speed = $(this).attr('data-speed');
                    if($(this).attr('data-revert')) speed *= -1;
                    TweenMax.to($(this), 1, {x: (1 - newx*speed), y: (1 - newy*speed)});
                });
            });
            $('.slogan-area').mousemove(function(e){
                var wx = $(window).width();
                var wy = $(window).height();
                var x = e.pageX - this.offsetLeft;
                var y = e.pageY - this.offsetTop;
                var newx = x - wx/2;
                var newy = y - wy/2;
                $('.shape1, .shape2, .shape3, .shape4, .shape6, .shape7, .shape8, .shape9, .shape10, .shape11, .shape12, .shape13, .shape14, .shape15, .shape16, .shape17, .shape18, .shape19, .shape20, .shape21, .shape22, .shape23').each(function(){
                    var speed = $(this).attr('data-speed');
                    if($(this).attr('data-revert')) speed *= -1;
                    TweenMax.to($(this), 1, {x: (1 - newx*speed), y: (1 - newy*speed)});
                });
            });
            $('.subscribe-area').mousemove(function(e){
                var wx = $(window).width();
                var wy = $(window).height();
                var x = e.pageX - this.offsetLeft;
                var y = e.pageY - this.offsetTop;
                var newx = x - wx/2;
                var newy = y - wy/2;
                $('.shape1, .shape2, .shape3, .shape4, .shape6, .shape7, .shape8, .shape9, .shape10, .shape11, .shape12, .shape13, .shape14, .shape15, .shape16, .shape17, .shape18, .shape19, .shape20, .shape21, .shape22, .shape23').each(function(){
                    var speed = $(this).attr('data-speed');
                    if($(this).attr('data-revert')) speed *= -1;
                    TweenMax.to($(this), 1, {x: (1 - newx*speed), y: (1 - newy*speed)});
                });
            });
            $('.feedback-area').mousemove(function(e){
                var wx = $(window).width();
                var wy = $(window).height();
                var x = e.pageX - this.offsetLeft;
                var y = e.pageY - this.offsetTop;
                var newx = x - wx/2;
                var newy = y - wy/2;
                $('.shape1, .shape2, .shape3, .shape4, .shape6, .shape7, .shape8, .shape9, .shape10, .shape11, .shape12, .shape13, .shape14, .shape15, .shape16, .shape17, .shape18, .shape19, .shape20, .shape21, .shape22, .shape23').each(function(){
                    var speed = $(this).attr('data-speed');
                    if($(this).attr('data-revert')) speed *= -1;
                    TweenMax.to($(this), 1, {x: (1 - newx*speed), y: (1 - newy*speed)});
                });
            });
            $('.success-story-area').mousemove(function(e){
                var wx = $(window).width();
                var wy = $(window).height();
                var x = e.pageX - this.offsetLeft;
                var y = e.pageY - this.offsetTop;
                var newx = x - wx/2;
                var newy = y - wy/2;
                $('.shape1, .shape2, .shape3, .shape4, .shape6, .shape7, .shape8, .shape9, .shape10, .shape11, .shape12, .shape13, .shape14, .shape15, .shape16, .shape17, .shape18, .shape19, .shape20, .shape21, .shape22, .shape23').each(function(){
                    var speed = $(this).attr('data-speed');
                    if($(this).attr('data-revert')) speed *= -1;
                    TweenMax.to($(this), 1, {x: (1 - newx*speed), y: (1 - newy*speed)});
                });
            });

            $('.health-coaching-banner-area').mousemove(function(e){
                var wx = $(window).width();
                var wy = $(window).height();
                var x = e.pageX - this.offsetLeft;
                var y = e.pageY - this.offsetTop;
                var newx = x - wx/2;
                var newy = y - wy/2;
                $('.health-coaching-shape2, .health-coaching-shape4, .health-coaching-shape5, .health-coaching-shape6, .health-coaching-shape7').each(function(){
                    var speed = $(this).attr('data-speed');
                    if($(this).attr('data-revert')) speed *= -1;
                    TweenMax.to($(this), 1, {x: (1 - newx*speed), y: (1 - newy*speed)});
                });
            });
            $('.experience-area').mousemove(function(e){
                var wx = $(window).width();
                var wy = $(window).height();
                var x = e.pageX - this.offsetLeft;
                var y = e.pageY - this.offsetTop;
                var newx = x - wx/2;
                var newy = y - wy/2;
                $('.experience-shape1, .experience-shape2').each(function(){
                    var speed = $(this).attr('data-speed');
                    if($(this).attr('data-revert')) speed *= -1;
                    TweenMax.to($(this), 1, {x: (1 - newx*speed), y: (1 - newy*speed)});
                });
            });

            // TweenMax JS
            $('.kindergarten-main-banner').mousemove(function(e){
                var wx = $(window).width();
                var wy = $(window).height();
                var x = e.pageX - this.offsetLeft;
                var y = e.pageY - this.offsetTop;
                var newx = x - wx/2;
                var newy = y - wy/2;
                $('.kindergarten-banner-image .image img').each(function(){
                    var speed = $(this).attr('data-speed');
                    if($(this).attr('data-revert')) speed *= -1;
                    TweenMax.to($(this), 1, {x: (1 - newx*speed), y: (1 - newy*speed)});
                });
            });

            // Feedback Slides Three
            $('.feedback-slides-three').owlCarousel({
                loop: true,
                nav: true,
                dots: false,
                autoplayHoverPause: true,
                autoplay: true,
                margin: 0,
                navText: [
                    "<i class='flaticon-chevron'></i>",
                    "<i class='flaticon-right-arrow'></i>"
                ],
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 2,
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 3,
                    },
                    1200: {
                        items: 4,
                    },
                    1550: {
                        items: 5,
                    }
                }
            });

            // Services Slides
            $('.services-slides').owlCarousel({
                loop: true,
                nav: true,
                dots: false,
                autoplayHoverPause: true,
                autoplay: true,
                margin: 30,
                navText: [
                    "<i class='flaticon-chevron'></i>",
                    "<i class='flaticon-right-arrow'></i>"
                ],
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 2,
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 3,
                    }
                }
            });

            // Courses Slides Two
            $('.courses-slides-two').owlCarousel({
                loop: false,
                nav: true,
                dots: false,
                autoplayHoverPause: true,
                autoplay: true,
                margin: 30,
                navText: [
                    "<i class='flaticon-chevron'></i>",
                    "<i class='flaticon-right-arrow'></i>"
                ],
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 3,
                    }
                }
            });

            $('.gym-banner-slides').owlCarousel({
                items: 1,
                nav: true,
                loop: true,
                dots: false,
                autoplay: false,
                animateIn: 'fadeIn',
                animateOut: 'fadeOut',
                autoplayHoverPause: true,
                onInitialized: sliderCounter, // When the plugin has initialized.
                onTranslated: sliderCounter, // When the translation of the stage has finished.
                navText: [
                    "<i class='flaticon-chevron'></i>",
                    "<i class='flaticon-right-arrow'></i>"
                ],
                responsive: {
                    0: {
                        autoHeight: true
                    },
                    576: {
                        autoHeight: false
                    },
                    768: {
                        autoHeight: false
                    },
                    992: {
                        autoHeight: false
                    }
                }
            });

            function sliderCounter(event) {
                var element = event.target; // DOM element, in this example .owl-carousel
                var items = event.item.count; // Number of items
                var item = event.item.index * 1; // Position of the current item

                // it loop is true then reset counter from 1
                if (item > items) {
                    item = item - items
                }
                $(element).parent().find('.sliderCounter').html("0" + item + "/0" + items)
            }

            // Gym Feedback Slides
            $('.gym-feedback-slides').owlCarousel({
                items: 1,
                nav: true,
                loop: true,
                dots: false,
                autoplay: false,
                autoHeight: true,
                animateOut: 'fadeOut',
                autoplayHoverPause: true,
                navText: [
                    "<i class='flaticon-chevron'></i>",
                    "<i class='flaticon-right-arrow'></i>"
                ],
            });

            // Trainer Slides
            $('.trainer-slides').owlCarousel({
                nav: false,
                margin: 30,
                loop: true,
                dots: false,
                autoplay: false,
                autoplayHoverPause: true,
                navText: [
                    "<i class='flaticon-chevron'></i>",
                    "<i class='flaticon-right-arrow'></i>"
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 2
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3
                    },
                    1200: {
                        items: 4
                    },
                    1550: {
                        items: 5
                    }
                }
            });

            // Testimonials Slides
            $('.testimonials-slides-two').owlCarousel({
                items: 1,
                nav: true,
                loop: true,
                dots: false,
                autoplay: true,
                autoplayHoverPause: true,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ]
            });

            // Partner Slides
            $('.partner-slides').owlCarousel({
                loop: true,
                nav: false,
                dots: false,
                autoplayHoverPause: true,
                autoplay: true,
                margin: 30,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ],
                responsive: {
                    0: {
                        items: 2
                    },
                    576: {
                        items: 3
                    },
                    768: {
                        items: 4
                    },
                    1200: {
                        items: 5
                    }
                }
            });

            // Coaching Feedback Slides
            $('.coaching-feedback-slides').owlCarousel({
                items: 1,
                loop: true,
                nav: false,
                dots: true,
                margin: 30,
                autoplay: true,
                autoplayHoverPause: true,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ]
            });

            // Motivation Feedback Slides
            $('.motivation-feedback-slides').owlCarousel({
                items: 1,
                loop: true,
                nav: false,
                dots: true,
                margin: 30,
                autoplay: true,
                autoplayHoverPause: true,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ]
            });

            // Motivation Events Slides
            $('.motivation-events-slides').owlCarousel({
                items: 1,
                loop: true,
                nav: false,
                dots: true,
                margin: 30,
                autoplay: true,
                autoplayHoverPause: true,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ]
            });

            // Kitchen Feedback Slides
            $('.kitchen-feedback-slides').owlCarousel({
                items: 1,
                loop: true,
                nav: true,
                dots: false,
                margin: 30,
                autoplay: true,
                autoplayHoverPause: true,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ]
            });

            // OA Feedback Slides
            $('.oa-feedback-slides').owlCarousel({
                loop: true,
                nav: true,
                dots: false,
                autoplayHoverPause: true,
                autoplay: true,
                animateOut: 'fadeOut',
                autoHeight: true,
                items: 1,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ]
            });

            // Instructor Feedback Slides
            $('.instructor-feedback-slides').owlCarousel({
                loop: true,
                nav: true,
                dots: false,
                autoplayHoverPause: true,
                autoplay: true,
                margin: 30,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    1200: {
                        items: 3
                    }
                }
            });

            /* End "Online Art Demo" & "Single Instructor Demo" "JS" */

            /* College Website */

            // cw-partner
            $('.cw-partner').owlCarousel({
                loop: true,
                margin: 30,
                nav: false,
                dots: false,
                autoplayHoverPause: true,
                autoplay: true,

                responsive:{
                    0:{
                        items: 1
                    },
                    600:{
                        items: 3
                    },
                    1000:{
                        items: 4,
                        margin: 50,
                    }
                }
            })

            // cw-courses-slider
            $('.cw-courses-slider').owlCarousel({
                loop: false,
                margin: 24,
                nav: true,
                dots: true,
                autoplayHoverPause: true,
                autoplay: true,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ],

                responsive:{
                    0:{
                        items: 1
                    },
                    768:{
                        items: 2
                    },
                    992:{
                        items: 3,
                    },
                    1200:{
                        items: 4,
                    }
                }
            })

            // cw-courses-slider
            $('.cw-feedback-slider').owlCarousel({
                loop: false,
                margin: 24,
                nav: true,
                dots: false,
                autoplayHoverPause: true,
                autoplay: true,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ],

                responsive:{
                    0:{
                        items: 1
                    },
                    768:{
                        items: 1
                    },
                    992:{
                        items: 2,
                    },
                    1200:{
                        items: 1,
                    },
                    1400:{
                        items: 2,
                    }
                }
            })

            // cw-college-staff-slider
            $('.cw-college-staff-slider').owlCarousel({
                loop: false,
                margin: 24,
                nav: true,
                dots: true,
                autoplayHoverPause: true,
                autoplay: true,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ],
                responsive:{
                    0:{
                        items: 1
                    },
                    768:{
                        items: 2
                    },
                    992:{
                        items: 3,
                    },
                    1200:{
                        items: 4,
                    }
                }
            })
            /* End College Website */

            /* Online Photography Home */
            // op-partner
            $('.op-partner').owlCarousel({
                loop: true,
                margin: 30,
                nav: false,
                dots: false,
                autoplayHoverPause: true,
                autoplay: true,

                responsive:{
                    0:{
                        items: 1
                    },
                    600:{
                        items: 3
                    },
                    1000:{
                        items: 5,
                        margin: 50,
                    }
                }
            })

            // Coach Books Slides
            $('.coach-book-slides').owlCarousel({
                loop: true,
                nav: true,
                dots: false,
                autoplayHoverPause: true,
                margin: 34,
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 1
                    },
                    768: {
                        items: 1
                    },
                    992: {
                        items: 4
                    },
                    1200: {
                        items: 5
                    }
                }
            });

            // op-feedback-slides
            $('.op-feedback-slides').owlCarousel({
                loop: true,
                nav: true,
                dots: true,
                autoplayHoverPause: true,
                autoplay: true,  
                items: 1,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ]
            });
            $('.default-btn').each(function() {
                if ($(this).find('i').hasClass('no-icon')) {
                    $(this).addClass('btn-no-icon'); 
                }
            });


            // Function to initialize each audio player
            function initAudioPlayer(audioId, playPauseBtnId, seekBarId, currentTimeId, durationId, muteBtnId) {
            try {
                const audio = document.getElementById(audioId);
                const playPauseBtn = document.getElementById(playPauseBtnId);
                const seekBar = document.getElementById(seekBarId);
                const currentTime = document.getElementById(currentTimeId);
                const duration = document.getElementById(durationId);
                const muteBtn = document.getElementById(muteBtnId);

                // Play/Pause functionality
                playPauseBtn.addEventListener('click', () => {
                    if (audio.paused) {
                        audio.play();
                        playPauseBtn.innerHTML = '&#10074;&#10074;'; // Pause symbol
                    } else {
                        audio.pause();
                        playPauseBtn.innerHTML = '&#9658;'; // Play symbol
                    }
                });

                // Update seek bar as audio plays
                audio.addEventListener('timeupdate', () => {
                    seekBar.value = audio.currentTime;
                    currentTime.textContent = formatTime(audio.currentTime);
                });

                // Update duration when metadata is loaded
                audio.addEventListener('loadedmetadata', () => {
                    seekBar.max = audio.duration;
                    duration.textContent = formatTime(audio.duration);
                });

                // Fallback in case 'loadedmetadata' doesn't trigger
                if (audio.duration > 0) {
                    seekBar.max = audio.duration;
                    duration.textContent = formatTime(audio.duration);
                }

                // Seek functionality
                seekBar.addEventListener('input', () => {
                    audio.currentTime = seekBar.value;
                });

                // Mute functionality
                muteBtn.addEventListener('click', () => {
                    audio.muted = !audio.muted;
                    muteBtn.innerHTML = audio.muted ? '&#128263;' : '&#128266;';
                });

                // Format time to mm:ss
                function formatTime(time) {
                    const minutes = Math.floor(time / 60);
                    const seconds = Math.floor(time % 60);
                    return `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
                }

            } catch (err) {}
        }

        // Initialize audio players
        initAudioPlayer('audio1', 'playPauseBtn1', 'seekBar1', 'currentTime1', 'duration1', 'muteBtn1');
        initAudioPlayer('audio2', 'playPauseBtn2', 'seekBar2', 'currentTime2', 'duration2', 'muteBtn2');
        initAudioPlayer('audio3', 'playPauseBtn3', 'seekBar3', 'currentTime3', 'duration3', 'muteBtn3');
        initAudioPlayer('audio4', 'playPauseBtn4', 'seekBar4', 'currentTime4', 'duration4', 'muteBtn4');
        initAudioPlayer('audio5', 'playPauseBtn5', 'seekBar5', 'currentTime5', 'duration5', 'muteBtn5');
        initAudioPlayer('audio6', 'playPauseBtn6', 'seekBar6', 'currentTime6', 'duration6', 'muteBtn6');
        initAudioPlayer('audio7', 'playPauseBtn7', 'seekBar7', 'currentTime7', 'duration7', 'muteBtn7');
        initAudioPlayer('audio8', 'playPauseBtn8', 'seekBar8', 'currentTime8', 'duration8', 'muteBtn8');
        initAudioPlayer('audio9', 'playPauseBtn9', 'seekBar9', 'currentTime9', 'duration9', 'muteBtn9');
        initAudioPlayer('audio10', 'playPauseBtn10', 'seekBar10', 'currentTime10', 'duration10', 'muteBtn10');
        initAudioPlayer('audio11', 'playPauseBtn11', 'seekBar11', 'currentTime11', 'duration11', 'muteBtn11');
        initAudioPlayer('audio12', 'playPauseBtn12', 'seekBar12', 'currentTime12', 'duration12', 'muteBtn12');
        initAudioPlayer('audio13', 'playPauseBtn13', 'seekBar13', 'currentTime13', 'duration13', 'muteBtn13');
        initAudioPlayer('audio14', 'playPauseBtn14', 'seekBar14', 'currentTime14', 'duration14', 'muteBtn14');
        initAudioPlayer('audio15', 'playPauseBtn15', 'seekBar15', 'currentTime15', 'duration15', 'muteBtn15');
        initAudioPlayer('audio16', 'playPauseBtn16', 'seekBar16', 'currentTime16', 'duration16', 'muteBtn16');
        initAudioPlayer('audio17', 'playPauseBtn17', 'seekBar17', 'currentTime17', 'duration17', 'muteBtn17');
        initAudioPlayer('audio18', 'playPauseBtn18', 'seekBar18', 'currentTime18', 'duration18', 'muteBtn18');
        initAudioPlayer('audio19', 'playPauseBtn19', 'seekBar19', 'currentTime19', 'duration19', 'muteBtn19');
        initAudioPlayer('audio20', 'playPauseBtn20', 'seekBar20', 'currentTime20', 'duration20', 'muteBtn20');
        initAudioPlayer('audio21', 'playPauseBtn21', 'seekBar21', 'currentTime21', 'duration21', 'muteBtn21');
        initAudioPlayer('audio22', 'playPauseBtn22', 'seekBar22', 'currentTime22', 'duration22', 'muteBtn22');


        // Initialize audio players
        initAudioPlayer('audio1', 'playPauseBtn1', 'seekBar1', 'currentTime1', 'duration21', 'muteBtn1');
        initAudioPlayer('audio1', 'playPauseBtn1', 'seekBar1', 'currentTime1', 'duration22', 'muteBtn1');
        initAudioPlayer('audio1', 'playPauseBtn1', 'seekBar1', 'currentTime1', 'duration23', 'muteBtn1');
        initAudioPlayer('audio1', 'playPauseBtn1', 'seekBar1', 'currentTime1', 'duration24', 'muteBtn1');
        initAudioPlayer('audio1', 'playPauseBtn1', 'seekBar1', 'currentTime1', 'duration25', 'muteBtn1');
        initAudioPlayer('audio1', 'playPauseBtn1', 'seekBar1', 'currentTime1', 'duration26', 'muteBtn1');
        initAudioPlayer('audio1', 'playPauseBtn1', 'seekBar1', 'currentTime1', 'duration27', 'muteBtn1');
        initAudioPlayer('audio1', 'playPauseBtn1', 'seekBar1', 'currentTime1', 'duration28', 'muteBtn1');
        initAudioPlayer('audio1', 'playPauseBtn1', 'seekBar1', 'currentTime1', 'duration29', 'muteBtn1');
        initAudioPlayer('audio1', 'playPauseBtn1', 'seekBar1', 'currentTime1', 'duration210', 'muteBtn1');
        initAudioPlayer('audio1', 'playPauseBtn1', 'seekBar1', 'currentTime1', 'duration211', 'muteBtn1');
        initAudioPlayer('audio1', 'playPauseBtn1', 'seekBar1', 'currentTime1', 'duration212', 'muteBtn1');
        initAudioPlayer('audio1', 'playPauseBtn1', 'seekBar1', 'currentTime1', 'duration213', 'muteBtn1');
        initAudioPlayer('audio1', 'playPauseBtn1', 'seekBar1', 'currentTime1', 'duration214', 'muteBtn1');
        initAudioPlayer('audio1', 'playPauseBtn1', 'seekBar1', 'currentTime1', 'duration215', 'muteBtn1');
        initAudioPlayer('audio1', 'playPauseBtn1', 'seekBar1', 'currentTime1', 'duration216', 'muteBtn1');
        initAudioPlayer('audio1', 'playPauseBtn1', 'seekBar1', 'currentTime1', 'duration217', 'muteBtn1');
        initAudioPlayer('audio1', 'playPauseBtn1', 'seekBar1', 'currentTime1', 'duration218', 'muteBtn1');
        initAudioPlayer('audio1', 'playPauseBtn1', 'seekBar1', 'currentTime1', 'duration219', 'muteBtn1');
        initAudioPlayer('audio1', 'playPauseBtn1', 'seekBar1', 'currentTime1', 'duration220', 'muteBtn1');
        initAudioPlayer('audio1', 'playPauseBtn1', 'seekBar1', 'currentTime1', 'duration221', 'muteBtn1');
        initAudioPlayer('audio1', 'playPauseBtn1', 'seekBar1', 'currentTime1', 'duration222', 'muteBtn1');

        });
    });

    $(window).load(function(){
		$('.shorting-menu .filter.all').click();
	});

    // Preloader
    $(window).on('load', function () {
        $('.preloader').fadeOut();
    });

    // LP course continue button url
    $(window).on('load', function () {
        $(function() {
            setTimeout(function() {
                var lp_continue_btn_url = $('#learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons form').attr('action');
                $('.courses-details-info .btn-box .lp-form').attr('action', lp_continue_btn_url);
            }, 1000);
        });
    });
}(jQuery));

