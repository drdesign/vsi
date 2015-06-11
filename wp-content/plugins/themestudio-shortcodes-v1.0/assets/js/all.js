

    // Demo only
    //---------------------------------------------

    // $(document).ready(function(){
        // $(".ss-button").click(function(){
//
            // $(this).animate({
                // left: "-40px"
            // }, 50, "easeOutQuart");
//
            // $(".ss-panel").animate({
                // left: 0
            // }, "easeOutQuart");
        // });
//
        // $(".ss-close").click(function(){
            // $(".ss-panel").animate({
                // left: "-270px"
            // }, "fast", "easeOutQuart");
//
            // $(".ss-button").animate({
                // left: 0
            // }, "easeOutQuart");
        // });
//
        // $("#fonts-styles").change(function(){
            // $("link[data-title=fonts-styles]").attr("href", $(this).val());
        // });
//
        // $("#menu-align").change(function(){
            // $("link[data-title=menu-align]").attr("href", $(this).val());
        // });
//
        // $("#menu-style").change(function(){
            // $("link[data-title=menu-style]").attr("href", $(this).val());
            // $(".nav-logo-wrap .logo img").attr("src", "images/logo-white.png");
//
            // if ($(this).val() == "#") {
                // $(".nav-logo-wrap .logo img").attr("src", "images/logo-dark.png");
            // }
//
        // });
//
        // $(".ss-color").click(function(){
            // $("link[data-title=colors-styles]").attr("href", $(this).attr("href"));
            // return false;
        // });
//
        // $(".ssc1, .ssc2, .ssc3, .ssc4, .ssc5, .ssc6, .ssc7, .ssc8").click(function(){
            // gmColor = "#000000";
            // gmInit();
        // });
//
        // $(".ssc9").click(function(){
            // gmColor = "#163d68";
            // gmInit();
        // });
//
        // $(".ssc10").click(function(){
            // gmColor = "#163d68";
            // gmInit();
        // });
//
        // $(".ssc11").click(function(){
            // gmColor = "#4a3125";
            // gmInit();
        // });
//
        // $(".ssc12").click(function(){
            // gmColor = "#7e361a";
            // gmInit();
        // });
//
    // });

(function($){
    "use strict";

    // Page loader
    //---------------------------------------------

    $(window).load(function(){
        $(".page-loader b").stop(true).delay(100).fadeOut();
        $(".page-loader").stop(true).delay(400).fadeOut("slow");
    });



    // Logo height fix
    //---------------------------------------------

    function height_line(height_object, height_donor){
        height_object.height(height_donor.height());
        height_object.css({
            "line-height": height_donor.height() + "px"
        });
    }

    $(document).ready(function(){
        height_line($(".nav-logo-wrap .logo"), $(".main-nav"));
    });



    // Parallax
    //---------------------------------------------

    $(document).ready(function(){
        if ($(window).width() >= 768) {
            $(".parallax-1").parallax("50%", 0.1);
            $(".parallax-2").parallax("50%", 0.2);
            $(".parallax-3").parallax("50%", 0.3);
        }
    });



    // Home section height 100%
    //---------------------------------------------

    $(document).ready(function(){
        $(".js-height-full").height($(window).height());
    });

    $(window).resize(function(){
        $(".js-height-full").height($(window).height());
    });



    // Fittext (responsive text)
    //---------------------------------------------

    function fitTextInit(){
        $(".headings").fitText(2.43, {
            minFontSize: '24px',
            maxFontSize: '150px'
        });
        $(".slider-fittext").fitText(8.65, {
            minFontSize: '13px',
            maxFontSize: '30px'
        });

        $(".home-description").fitText(3.0, {
            minFontSize: '13px',
            maxFontSize: '20px'
        });

        $(".home-description.large").fitText(2.0, {
            minFontSize: '13px',
            maxFontSize: '30px'
        });

        $(".phone-number").fitText(1.07655, {
            minFontSize: '22px',
            maxFontSize: '80px'
        });
    }

    $(document).ready(function(){
        fitTextInit();
    });



    // Home section slider
    //---------------------------------------------

    $(document).ready(function(){

        $(".js-word-sliding").bxSlider({
            adaptiveHeight: true,
            mode: "fade",
            pager: false,
            controls: false,
            auto: true,
            speed: 500,
            pause: 5000
        });

        //Image slider
        $(".home-image-slider").bxSlider({
            adaptiveHeight: true,
            mode: "horizontal",
            pager: false,
            controls: true,
            auto: true,
            easing: "easeInOutExpo",
            speed: 800,
            pause: 6500,
            video: true,
            useCSS: false
        });

    });



    // Tooltips (bootstrap plugin activated)
    //---------------------------------------------

    $(document).ready(function(){

        $(".nav-social-links a").tooltip({
            placement: "bottom"
        });

        $(".social-links a").tooltip({
            placement: "top"
        });

    });



    // Scroll navigation
    //---------------------------------------------

    $(document).ready(function(){

        $(".scroll-nav, .home-call-action, .logo-wrap, .nav-logo-wrap, .banner-button").localScroll({
            target: "body",
            hash: true,
            duration: 1100,
            easing: "easeInOutExpo"
        });

        var sections = $(".home-section, .page-section");
        var menu_links = $(".scroll-nav li a");

        $(window).scroll(function(){

            sections.filter(":in-viewport:first").each(function(){
                var active_section = $(this);
                var active_link = $('.scroll-nav li a[href="#' + active_section.attr("id") + '"]');
                menu_links.removeClass("active");
                active_link.addClass("active");
            });

        });
        $(window).trigger('scroll');

    });



    // Responsive menu
    //---------------------------------------------

    $(document).ready(function(){

        // Navbar sticky

        $(".main-nav").sticky({
            topSpacing: 0
        });


        var mobile_nav = $(".mobile-nav");
        var desktop_nav = $(".desktop-nav");

        height_line($(".inner-nav ul > li > a"), $(".main-nav"));
        height_line(mobile_nav, $(".main-nav"));

        mobile_nav.css({
            "width": $(".main-nav").height() + "px"
        });


        // Mobile menu style on

        $(window).resize(function(){
            if ($(window).width() < 1024) {
                $(".main-nav").addClass("mobile-on");
            }
            else
                if ($(window).width() >= 1024) {
                    $(".main-nav").removeClass("mobile-on");
                    desktop_nav.show();
                }
        });
        $(window).trigger("resize");


        // Mobile menu toggle

        mobile_nav.click(function(){

            if (desktop_nav.hasClass("js-opened")) {
                desktop_nav.slideUp("slow", "easeOutExpo").removeClass("js-opened");
                $(this).removeClass("active");
            }
            else {
                desktop_nav.slideDown("slow", "easeOutQuart").addClass("js-opened");
                $(this).addClass("active");
            }

        });

        desktop_nav.find("a").click(function(){
            if (mobile_nav.hasClass("active")) {
                desktop_nav.slideUp("slow", "easeOutExpo").removeClass("js-opened");
                mobile_nav.removeClass("active");
            }
        });

    });



    // Some facts section
    //---------------------------------------------

    $(document).ready(function(){
        $(".count-number").appear(function(){

            var count = $(this);

            count.countTo({
                from: 0,
                to: count.html(),
                speed: 1300,
                refreshInterval: 60,
            });

        });
    });



    // Team section
    //---------------------------------------------

    $(document).ready(function(){

        var team_grid = $(".team-grid");
        var team_item = $(".team-item");
        var team_opened_cont = $(".team-opened-wrap");

        team_opened_cont.animate({
            opacity: 0
        });

        // Open

        team_item.filter(".js-clickable").click(function(){

            team_grid.animate({
                opacity: 0
            }, 400);
            team_grid.slideUp(300, "easeOutExpo");
            $(this).addClass("js-opened");

            team_opened_cont.html('<div class="team-opened"><div class="team-close-link"><i class="fa fa-times"></i></div>' + $(this).html() + '</div>');

            setTimeout(function(){
                team_opened_cont.slideDown(450, "easeOutExpo");
                team_opened_cont.animate({
                    opacity: 1
                }, 380);

            }, 600);

        });

        // Close

        $("body").on("click", ".team-close-link", function(){

            team_opened_cont.animate({
                opacity: 0
            }, 380);
            team_opened_cont.slideUp(450, "easeOutExpo");

            setTimeout(function(){
                team_grid.slideDown(300, "easeOutExpo");
                team_grid.animate({
                    opacity: 1
                }, 380);
                team_item.removeClass("js-opened");

                team_opened_cont.empty();

            }, 600);

        });

    });



    // Services Section
    //---------------------------------------------

    $(document).ready(function(){

        var service_item = $(".service-item");

        // On hover effect
        service_item.mouseenter(function(){

            if (!(service_item.hasClass("service-opened"))) {
                $(this).addClass("js-hovered");
                service_item.filter(":not(.js-hovered)").addClass("js-fade");
            }


        });
        service_item.mouseleave(function(){

            if (!(service_item.hasClass("service-opened"))) {
                $(this).removeClass("js-hovered");
                service_item.removeClass("js-fade");
            }

        });

        // Service open full description

        // Open
        $(".service-full").animate({
            opacity: 0
        });
        window.service_opened = 0;
        $(".service-item-inner").click(function(){

            if (!(service_item.hasClass("service-opened"))) {

                service_opened = $(this).parents(".service-item");
                service_opened.addClass("service-opened").addClass("no-animate").addClass("js-hovered");
                service_opened.find(".service-wrap").append('<div class="service-close-link"><span class="icon-close"></span></div>');
                service_item.filter(":not(.js-hovered)").addClass("js-fade");

                $(".service-opened .service-more").fadeOut(400, "easeOutExpo");
                service_opened.find(".service-wrap").animate({
                    paddingBottom: 45
                }, 600, "easeOutExpo");

                setTimeout(function(){
                    service_opened.find(".service-full").slideDown(600, "easeInOutExpo");
                    service_opened.find(".service-full").animate({
                        opacity: 1
                    }, 250, "easeInExpo");
                }, 0);

                setTimeout(function(){
                    service_opened.find(".service-close-link").fadeIn(250, "easeInExpo");
                }, 600);
            }
        });

        // Close
        $("body").on("click", ".service-close-link", function(){

            $(this).fadeOut(400, "easeOutExpo");
            setTimeout(function(){
                service_opened.find(".service-full").animate({
                    opacity: 0
                }, 300, "easeOutExpo");
                service_opened.find(".service-full").slideUp(600, "easeInOutExpo");
            }, 0);

            service_opened.find(".service-wrap").animate({
                paddingBottom: 70
            }, 600, "easeOutExpo");

            setTimeout(function(){
                service_opened.find(".service-more").fadeIn(300, "easeInExpo");
            }, 500);

            setTimeout(function(){
                service_opened.removeClass("service-opened").removeClass("no-animate").removeClass("js-hovered");
                service_item.removeClass("js-fade");
                service_opened.find(".service-close-link").remove();
            }, 800);

        });

    });



    // Portfolio Filtering
    //---------------------------------------------

    // Works filtering

    $(document).ready(function(){

        $("#work-grid").mixitup({
            effects: ['fade', 'scale', 'rotateY'],
            easing: 'snap'
        });

    });



    // Twitter Sectiron
    //---------------------------------------------

    $(document).ready(function(){

        // Twitter feed

        var twDiv = $(".twitter-feed");

        var twUsername = twDiv.attr("data-username");

        twDiv.tweet({
            username: twUsername,
            join_text: 'auto',
            avatar_size: 0,
            count: 5,
            template: '{text} <div class="tc-author">{time}</div>'
        });

        $(".twitter-feed ul").addClass("tc-slider").addClass("twitter-slider");


        // Twitter slider
        $(".twitter-slider").bxSlider({
            nextSelector: "#tc-controls-1 .tc-arrow-right",
            prevSelector: "#tc-controls-1 .tc-arrow-left",
            nextText: "<i class='fa fa-angle-right'></i>",
            prevText: "<i class='fa fa-angle-left'></i>",
            pager: false,
            auto: true,
            pause: 3000,
            mode: "fade",
            adaptiveHeight: true
        });

    });



    // Clients Sectiron
    //---------------------------------------------

    $(document).ready(function(){

        // Reviews slider
        $(".clients-slider").bxSlider({
            nextSelector: "#tc-controls-2 .tc-arrow-right",
            prevSelector: "#tc-controls-2 .tc-arrow-left",
            nextText: "<i class='fa fa-angle-right'></i>",
            prevText: "<i class='fa fa-angle-left'></i>",
            pager: false,
            auto: true,
            pause: 5000,
            mode: "fade",
            adaptiveHeight: true
        });

    });



    // Contact form
    //---------------------------------------------

    $(function(){
        $("#form").submit(function(e){

            // Stop the form actually posting
            e.preventDefault();

            // Send the request
            $.post("contact.php", {
                name: $("#name").val(),
                email: $("#email").val(),
                text: $("#text").val()
            }, function(d){
                console.log(d);
                // Here we handle the response from the script
                // We are just going to alert the result for now

                $(".contact-form-wrap").height($(".contact-form").height());

                $("#form").slideUp(300, "easeInExpo");

                setTimeout(function(){
                    service_opened
                    $(".form-success").html(d).slideDown(300, "easeOutExpo");
                }, 450);

            });
        });
    });


})(jQuery);


function initWorkSlider(){

    (function($){
        "use strict";

        $(".work-full-slider").bxSlider({
            adaptiveHeight: true,
            pager: false,
            controls: true,
            auto: true,
            speed: 500,
            pause: 5000,
            video: true,
            useCSS: false
        });
        $(".work-full-media").fitVids();

    })(jQuery);

};

// Works expander
//---------------------------------------------

$(window).load(function(){

    (function($){
        "use strict";

        // Works slider
        initWorkSlider()

        //Top panel sticky
        $(".work-navigation").sticky({
            topSpacing: 1
        });

    })(jQuery);


    // Hash change function
    function hash_change(url){
        (function($){
         "use strict";
            var hash_url = "#/" + url.replace(" .work-wrapper", "");
            window.location.hash = hash_url;
        })(jQuery);
    }


    // Open work
	(function($){
    "use strict";
    window.work_before_scroll = $("#works").scrollTop();
    $(".work-item-link").click(function(){
        work_before_scroll = $(window).scrollTop();
        $(this).addClass("work-opened");

        $(".main-nav").animate({
            top: -100
        });
        $(".page").fadeOut(400);
        setTimeout(function(){
            $(".work-full").fadeIn(500);

            initWorkSlider();

            if (work_before_scroll != 0) {
                $("html, body").animate({
                    scrollTop: 0
                }, "fast", "easeOutExpo");
            }

        }, 550);

        var work_url = $(this).attr("href") + ' ' + '.work-wrapper';

        $(".work-full-load").load(work_url, function(){

            $(".work-loader").delay(700).fadeOut(500);
            $(".work-navigation").animate({
                top: 0
            }, 900, "easeOutCirc");

        });
        hash_change(work_url);

        return false;
    });

	})(jQuery);

    // All works (close work)
    function close_work(){
        $(".work-full").fadeOut(300);
        $(".work-navigation").animate({
            top: "-60px"
        });
        setTimeout(function(){
            $(".work-full-load").empty();
            $("html, body").animate({
                scrollTop: work_before_scroll + "px"
            }, "slow", "easeOutExpo");
        }, 350);
        setTimeout(function(){
            $(".page").fadeIn(500);
        }, 750);

        work_opened = $(".work-opened");
        work_opened.removeClass("work-opened");
    }

    (function($){
        "use strict";
        $(".work-all").click(function(){
            close_work();
            //Hash change
            window.location.hash = "";
        });
    })(jQuery);



    // Prev work
    function prev_work(){
        $(".work-loader").fadeIn(300);
        var work_prev_url = $(".work-opened").parent().prev(".work-item").find(".work-item-link").attr("href") +
        ' ' +
        '.work-wrapper';

        setTimeout(function(){
            $(".work-full-load").empty().load(work_prev_url, function(){
                initWorkSlider();
                $(".work-loader").delay(200).fadeOut(500);
            });
        }, 500);

        var work_opened = $(".work-opened").parent().prev(".work-item").find(".work-item-link");
        $(".work-item-link").removeClass("work-opened");
        work_opened.addClass("work-opened");

        // If left end of the links
        if ($(".work-opened").parent().is(":first")) {
            work_prev_url = $(".work-item").last().find(".work-item-link").attr("href") +
            ' ' +
            '.work-wrapper';

            setTimeout(function(){
                $(".work-full-load").empty().load(work_prev_url, function(){
                    initWorkSlider();
                    $(".work-loader").delay(200).fadeOut(500);
                });
            }, 500);
            work_opened = $(".work-item").last().find(".work-item-link");
            $(".work-item-link").removeClass("work-opened");
            work_opened.addClass("work-opened");
        }
        // Hash cahnge
        hash_change(work_prev_url);
    }

    (function($){
        "use strict";
        $(".work-prev").click(function(){
            prev_work();
        });
    })(jQuery);

    // Next work
    function next_work(){
        $(".work-loader").fadeIn(300);
        var work_next_url = $(".work-opened").parent().next(".work-item").find(".work-item-link").attr("href") +
        ' ' +
        '.work-wrapper';

        setTimeout(function(){
            $(".work-full-load").empty().load(work_next_url, function(){
                initWorkSlider();
                $(".work-loader").delay(200).fadeOut(500);
            });
        }, 500);

        var work_opened = $(".work-opened").parent().next(".work-item").find(".work-item-link");
        $(".work-item-link").removeClass("work-opened");
        work_opened.addClass("work-opened");

        // If right end of the links
        if ($(".work-opened").parent().is(":last")) {
            work_next_url = $(".work-item").first().find(".work-item-link").attr("href") +
            ' ' +
            '.work-wrapper';

            setTimeout(function(){
                $(".work-full-load").empty().load(work_next_url, function(){
                    initWorkSlider();
                    $(".work-loader").delay(200).fadeOut(500);
                });
            }, 500);
            work_opened = $(".work-item").first().find(".work-item-link");
            $(".work-item-link").removeClass("work-opened");
            work_opened.addClass("work-opened");

        }
        // Hash cahnge
        hash_change(work_next_url);
    }

    (function($){
        "use strict";
        $(".work-next").click(function(){
            next_work();
        });
    })(jQuery);

    // Hash change event
	(function($){
    "use strict";
    $(window).hashchange(function(){
        if ((location.hash.search("/works") == -1) && ($(".work-full").is(":visible"))) {
            close_work();
        }
        else {
            var hash_new = location.hash;
            var work_url = hash_new.replace("#/", "") + ' ' + '.work-wrapper';


            if ((hash_new.replace("#/", "") != $(".work-opened").attr("href")) && ($(".work-full").is(":visible"))) {
                $(".work-loader").fadeIn(300);

                setTimeout(function(){
                    $(".work-full-load").empty().load(work_url, function(){
                        initWorkSlider();
                        $(".work-loader").delay(200).fadeOut(500);
                    });
                }, 200);


                if (work_before_scroll != 0) {
                    $("html, body").animate({
                        scrollTop: 0
                    }, "slow", "easeOutExpo");
                }

                var work_opened = $(".work-item-link[href = '" + work_url.replace(" .work-wrapper", "") + "']");
                $(".work-item-link").removeClass("work-opened");
                work_opened.addClass("work-opened");
            }

            if ((hash_new.replace("#/", "") != $(".work-opened").attr("href")) && ($(".work-full").is(":hidden")) && (location.hash.search("/works") != -1)) {

                $(".page").fadeOut(500);
                setTimeout(function(){
                    $(".work-full").fadeIn(500);
                }, 550);

                setTimeout(function(){
                    $(".work-full-load").empty().load(work_url, function(){
                        initWorkSlider();
                        $(".work-loader").delay(200).fadeOut(500);
                        $(".work-navigation").animate({
                            top: 0
                        }, 900, "easeOutCirc");

                        if (work_before_scroll != 0) {
                            $("html, body").animate({
                                scrollTop: 0
                            }, "fast", "easeOutExpo");
                        }
                    });
                }, 650);

                var work_opened = $(".work-item-link[href = '" + work_url.replace(" .work-wrapper", "") + "']");
                $(".work-item-link").removeClass("work-opened");
                work_opened.addClass("work-opened");
            }

        }
    });
    $(window).trigger('hashchange');
	})(jQuery);
});




    // Shortcodes
    //---------------------------------------------

    $(document).ready(function(){

        // Accordion
        var allPanels = $(".accordion > dd").hide();
        allPanels.first().slideDown("easeOutExpo");
        $(".accordion > dt > a").first().addClass("active");

        $(".accordion > dt > a").click(function(){

            var current = $(this).parent().next("dd");
            $(".accordion > dt > a").removeClass("active");
            $(this).addClass("active");
            allPanels.not(current).slideUp("easeInExpo");
            $(this).parent().next().slideDown("easeOutExpo");

            return false;

        });

        // Toggle
        var allToggles = $(".toggle > dd").hide();

        $(".toggle > dt > a").click(function(){

            if ($(this).hasClass("active")) {

                $(this).parent().next().slideUp("easeOutExpo");
                $(this).removeClass("active");

            }
            else {
                var current = $(this).parent().next("dd");
                $(this).addClass("active");
                $(this).parent().next().slideDown("easeOutExpo");
            }

            return false;
        });

        //Video
        $(".video").fitVids();

    });



    // Blog
    //---------------------------------------------

    $(document).ready(function(){

        $(".blog-slider").bxSlider({
            adaptiveHeight: true,
            pager: false,
            controls: true,
            auto: true,
            speed: 500,
            pause: 5000,
            video: true,
            useCSS: false
        });
        $(".blog-media").fitVids();

    });



    // Google maps
//---------------------------------------------

function rgb2hex(rgb){
    rgb = rgb.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
    return (rgb && rgb.length === 4) ? "#" +
    ("0" + parseInt(rgb[1], 10).toString(16)).slice(-2) +
    ("0" + parseInt(rgb[2], 10).toString(16)).slice(-2) +
    ("0" + parseInt(rgb[3], 10).toString(16)).slice(-2) : '';
}

var gmMapDiv = $("#map-canvas");

var gmCenterAddress = gmMapDiv.attr("data-address");
var gmMarkerAddress = gmMapDiv.attr("data-address");
var gmText = gmMapDiv.attr("data-text");
var gmColor = rgb2hex(gmMapDiv.css("background-color"));

function gmInit(){
	gmMapDiv.initMap({

		/* *****Enter Your Address Here ***** */
        center: gmCenterAddress,

		markers : {
			/* *****Enter Your Point Address Here ***** */
			marker_1: {
				position: gmMarkerAddress,
				options : { icon: "images/map-marker.png" },
				info_window : { content : gmText,maxWidth: 240, zIndex: 2}
			}
		},

		type: "roadmap",

		// Google Maps Api Options
        	options: {
				zoom: 14,
        		zoomControl: true,
        		zoomControlOptions: { style: google.maps.ZoomControlStyle.SMALL },
        		disableDoubleClickZoom: false,
        		mapTypeControl: false,
        		scaleControl: false,
        		scrollwheel: false,
        		streetViewControl: false,
        		draggable : true,
        		overviewMapControl: false,
				overviewMapControlOptions: {
            	opened: false
        	},
            styles: [{
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [{
                    "color": gmColor
                }, {
                    "lightness": 17
                }]
            }, {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [{
                    "color": gmColor
                }, {
                    "lightness": 20
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": gmColor
                }, {
                    "lightness": 17
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": gmColor
                }, {
                    "lightness": 29
                }, {
                    "weight": 0.2
                }]
            }, {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [{
                    "color": gmColor
                }, {
                    "lightness": 18
                }]
            }, {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [{
                    "color": gmColor
                }, {
                    "lightness": 16
                }]
            }, {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [{
                    "color": gmColor
                }, {
                    "lightness": 21
                }]
            }, {
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "visibility": "on"
                }, {
                    "color": gmColor
                }, {
                    "lightness": 16
                }]
            }, {
                "elementType": "labels.text.fill",
                "stylers": [{
                    "saturation": 36
                }, {
                    "color": gmColor
                }, {
                    "lightness": 40
                }]
            }, {
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [{
                    "color": gmColor
                }, {
                    "lightness": 19
                }]
            }, {
                "featureType": "administrative",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": gmColor
                }, {
                    "lightness": 20
                }]
            }, {
                "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": gmColor
                }, {
                    "lightness": 17
                }, {
                    "weight": 1.2
                }]
            }]
        }
    });
}
$(document).ready(function(){
	gmInit();
});


    // Some facts section
    //---------------------------------------------

    $(document).ready(function(){

        if ($(window).width() > 1024) {
            $(".go-fade-in").animate({
                opacity: 0
            }, 10);

            $(".go-fade-in").appear(function(){

                $(this).animate({
                    opacity: 1
                }, 750, "easeInExpo");
            });
        }
    });














