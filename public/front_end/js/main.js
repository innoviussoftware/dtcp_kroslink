(function($) {

    "use strict";

    // Camera Slider

     if($(".slider-wrapper").length > 0) {

       $(".slider-wrapper").camera({

        pagination: false,
        playPause: false,
        autoAdvance: false,
        portrait : false,
        height: "auto",
        loader: 'none',
        opacityOnGrid : true,

        onEndTransition: function() {

            // $(".camera_caption .slider-title-1").addClass("animated fadeInDown");
            // $(".camera_caption .slider-title-2").addClass("animated fadeInDown");
            // $(".camera_caption .slider-text-1").addClass("animated fadeInDown");
            // $(".camera_caption .slider-price").addClass("animated fadeInDown");
            // $(".camera_caption .slider-buttom").addClass("animated fadeInDown");
        },

        onStartTransition: function() {

            // $(".camera_caption .slider-title-1").removeClass("animated fadeInDown");
            // $(".camera_caption .slider-title-2").removeClass("animated fadeInDown");
            // $(".camera_caption .slider-text-1").removeClass("animated fadeInDown");
            // $(".camera_caption .slider-price").removeClass("animated fadeInDown");
            // $(".camera_caption .slider-buttom").removeClass("animated fadeInDown");
        }

    }); 

   }

    // Camera Slider index-3

    if($(".slider-wrapper-3").length > 0) {

        $(".slider-wrapper-3").camera({
        pagination: false,
        playPause: false,
        autoAdvance: false,
        height: 'auto',
        loader: "none",
        onEndTransition: function() {
            // $(".camera_caption .slider-title-1").addClass("animated fadeInDown");
            // $(".camera_caption .slider-title-2").addClass("animated fadeInDown");
            // $(".camera_caption .slider-text-1").addClass("animated fadeInDown");
            // $(".camera_caption .slider-price").addClass("animated fadeInDown");
            // $(".camera_caption .slider-buttom").addClass("animated fadeInDown");
        },
        onStartTransition: function() {

            // $(".camera_caption .slider-title-1").removeClass("animated fadeInDown");
            // $(".camera_caption .slider-title-2").removeClass("animated fadeInDown");
            // $(".camera_caption .slider-text-1").removeClass("animated fadeInDown");
            // $(".camera_caption .slider-price").removeClass("animated fadeInDown");
            // $(".camera_caption .slider-buttom").removeClass("animated fadeInDown");
        }

    });
    }

    

    // Dropdown Menu

    var some = $(".mega-dropdown").prev();

    $(some).on("click", function(e) {

        e.preventDefault();

        $(".mega-dropdown").toggle();
    });

    // Single Product Cart Link Animation

    $(".single-product").hover(function() {

            $(this).find(".add-to-links a").addClass("animated fadeInUp");
        },
        function() {

            $(this).find(".add-to-links a").removeClass("animated fadeInUp");
        }
    );

    
   //  Category menu
  
    $('#cate-toggle li.has-sub>a').on('click', function() {
        $(this).removeAttr('href');
        var element = $(this).parent('li');
        if (element.hasClass('open')) {
            element.removeClass('open');
            element.find('li').removeClass('open');
            element.find('ul').slideUp();
        } else {
            element.addClass('open');
            element.children('ul').slideDown();
            element.siblings('li').children('ul').slideUp();
            element.siblings('li').removeClass('open');
            element.siblings('li').find('li').removeClass('open');
            element.siblings('li').find('ul').slideUp();
        }
    });

    $('#cate-toggle>ul>li.has-sub>a').append('<span class="holder"></span>');

    // Countdown

    $('#countdown').timeTo({
        timeTo: new Date(new Date('Mon Jan 16 2018 09:00:00')),
        displayDays: 3,
        theme: "black",
        displayCaptions: true,
        fontSize: 33,
        fontFamily:"Poppins",
        captionSize: 14
    });
    $('#countdown2').timeTo({
        timeTo: new Date(new Date('Sun Jan 17 2019 09:00:00')),
        displayDays: 3,
        theme: "black",
        displayCaptions: true,
        fontSize: 28,
        captionSize: 14
    });
    $('#countdown3').timeTo({
        timeTo: new Date(new Date('Fri Jan 17 2020 09:00:00')),
        displayDays: 3,
        theme: "black",
        displayCaptions: true,
        fontSize: 28,
        captionSize: 14
    });


    // Sticky Nav Bar


    $(".mobile-menu-top nav").meanmenu();

    $(window).scroll(function() {

        var topMiddle = $(".head-top-with-middle").height();

        var wTop = $(window).scrollTop();

        if (wTop >= topMiddle) {

            $(".main-menu-area").addClass("sticky");
        } else {

            $(".main-menu-area").removeClass("sticky");
        }
    });




    // Offer Carousel


    $(".offer-wrapper").owlCarousel({
        loop: true,
        dots: false,
        nav: true,
        margin: 15,
        smartSpeed: 800,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {

            0: {
                items: 1
            },
            480: {
                items: 1
            },
            678: {
                items: 2
            },
            992: {
                items: 2
            },
            1160: {
                items: 1
            }
        }
    });

    $(".offer-wrapper-3").owlCarousel({
        items: 1,
        loop: true,
        dots: false,
        nav: true,
        margin: 15,
        smartSpeed: 800,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]

    });


    // $(".owl-carousel-what-new").owlCarousel({
    //     items: 1,
    //     loop: true,
    //     dots: false,
    //     nav: true,
    //     margin: 15,
    //     smartSpeed: 800,
    //     navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]

    // });

    $(".owl-carousel-what-new").lightSlider({
                loop:true,
                keyPress:true,
                vertical:true,
                verticalHeight:390,
                nav: true,
                dots: true,
                item:1
            });


    // Category Carousel

    $(".category-wrapper").owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        smartSpeed: 900,
        dots: false,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {

            0: {
                items: 1
            },
            480: {
                items: 1
            },
            678: {
                items: 3
            },
            960: {
                items: 3
            },
            1160: {
                items: 4
            }
        }
    });
    // Same Category Carousel

    $(".same-cat-wrapper").owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        smartSpeed: 900,
        dots: false,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {

            0: {
                items: 1
            },
            480: {
                items: 1
            },
            678: {
                items: 3
            },
            960: {
                items: 3
            }
        }
    });
    // New Item Carousel

    $(".new-item-wrapper").owlCarousel({

        loop: true,
        nav: true,
        dots: false,
        margin: 30,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {

                items: 1
            },
            480: {

                items: 1
            },
            678: {
                items: 3
            },
            960: {
                items: 2
            },
            1160: {
                items: 3
            }
        }
    });

    // Top Seller Carousel

    $(".top-seller-wrapper").owlCarousel({

        loop: true,
        margin: 30,
        nav: true,
        dots: false,
        smartSpeed: 3000,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1
            },
            678: {
                items: 2
            },
            960: {
                items: 2
            },
            1160: {
                items: 3
            }
        }

    });

    $(".top-seller-wrapper-3").owlCarousel({

        loop: true,
        margin: 30,
        nav: true,
        dots: false,
        smartSpeed: 3000,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1
            },
            678: {
                items: 2
            },

            992: {
                items: 1
            }
        }

    });

    // Latest Blog Carousel

    $(".latest-blog-wrapper").owlCarousel({
        loop: true,
        margin: 25,
        dots: false,
        nav: true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1
            },
            678: {
                items: 2
            },
            960: {
                items: 2
            },
            1160: {
                items: 1
            }
        }
    });

    $(".latest-blog-wrapper-3").owlCarousel({
        loop: true,
        margin: 25,
        dots: false,
        nav: true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1
            },
            678: {
                items: 2
            },
            960: {
                items: 2
            },
            1160: {
                items: 3
            }
        }
    });

    // Latest Blog Carousel index-1

    $(".latest-blog-wrapper-1").owlCarousel({
        loop: true,
        margin: 25,
        dots: false,
        nav: true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1
            },
            678: {
                items: 2
            },
            960: {
                items: 3
            }
        }
    });

    // gallery

    $(".gallery").owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        nav: false,
        autoplay:false,
        autoplayTimeout:10000,
        autoplayHoverPause:true,
        touchDrag:false,
        mouseDrag:false,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 2
            },
            480: {
                items: 2
            },
            678: {
                items: 3
            },
            960: {
                items: 4
            }
        }
    });


    //  Our Brand Cariusel

    $(".brand-wrapper").owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        nav: true,
        autoplay:true,
        autoplayTimeout:1000,
        autoplayHoverPause:true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 2
            },
            480: {
                items: 2
            },
            678: {
                items: 4
            },
            960: {
                items: 6
            }
        }
    });

    // ScrollTop

    $(".scroll-top a").on("click", function(e) {

        e.preventDefault();

        $("html").animate({
            "scrollTop": "0"
        }, 2000, "linear");

    });

    function langualeOptionDrop() {

        var lanopt = $(".language-option");

        lanopt.on("show.bs.collapse", ".collapse", function() {

            lanopt.find(".collapse.in").collapse("hide");
        });
    }

    langualeOptionDrop();


    // Top Seller Carousel

    $(".top-seller-wrapper").owlCarousel({

        loop: true,
        margin: 30,
        nav: true,
        dots: false,
        smartSpeed: 3000,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1
            },
            678: {
                items: 1
            },
            960: {
                items: 1
            }
        }

    });

    $(".top-seller-wrapper2").owlCarousel({

        loop: true,
        margin: 30,
        nav: false,
        dots: false,
        smartSpeed: 3000,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1
            },
            678: {
                items: 2
            },
            992: {
                items: 1
            }

        }

    });

    $(".top-seller-wrapper-4").owlCarousel({

        loop: true,
        margin: 30,
        nav: true,
        dots: false,
        smartSpeed: 3000,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1
            },
            678: {
                items: 2
            },
            960: {
                items: 1
            }
        }

    });

    // Product Carousel

    initialize_owl($('.product-carousel-wrapper'));

    $('a[href="#mobile-tablet"]').on('shown.bs.tab', function() {
        initialize_owl($('.product-carousel-wrapper'));
    }).on('hide.bs.tab', function() {
        destroy_owl($('.product-carousel-wrapper'));
    });

    $('a[href="#computer"]').on('shown.bs.tab', function() {
        initialize_owl($('.product-carousel-wrapper2'));
    }).on('hide.bs.tab', function() {
        destroy_owl($('.product-carousel-wrapper2'));
    });
    $('a[href="#photo-camera"]').on('shown.bs.tab', function() {
        initialize_owl($('.product-carousel-wrapper3'));
    }).on('hide.bs.tab', function() {
        destroy_owl($('.product-carousel-wrapper3'));
    });

    function initialize_owl(el) {

        el.owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            smartSpeed: 800,
            navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                678: {
                    items: 3
                },
                960: {
                    items: 3
                },
                1150: {
                    items: 5
                }
            }
        });
    }

    function destroy_owl(el) {
        el.trigger("destroy.owl.carousel");
        el.find('.owl-stage-outer').children(':eq(0)').unwrap();
    }

    // Selectpicker

    $(".selectpicker3").selectpicker({
        iconBase: 'glyphicon',
        tickIcon: 'glyphicon-ok',
        width: '60',
        mobile: true

    });
    $(".selectpicker4").selectpicker({
        iconBase: 'glyphicon',
        tickIcon: 'glyphicon-ok',
        width: '86',
        mobile: true

    });

    $(".selectpicker2").selectpicker({
        iconBase: 'glyphicon',
        tickIcon: 'glyphicon-ok',
        width: '180',
        mobile: true

    });

    $(".select-picker-4").selectpicker({
        iconBase: 'glyphicon',
        tickIcon: 'glyphicon-ok',
        width: '100%',
        height: '35px',
        mobile: true

    });



    $("#slider-range").slider({
        range: true,
        min: 16,
        max: 52,
        values: [16, 52],
        slide: function(event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
        }
    });
    $("#amount").val("$" + $("#slider-range").slider("values", 0) +
        " - $" + $("#slider-range").slider("values", 1));




    $(".up").on('click', function() {

        var qty = $(".qty");

        if (qty.val() < $(this).data("max")) {

            qty.val(parseInt(qty.val()) + 1);
        }
    });

    $(".down").on('click', function() {

        var qty = $(".qty");

        if (qty.val() > $(this).data("min")) {

            qty.val(parseInt(qty.val()) - 1);
        }
    });


    $(".up2").on('click', function() {

        var qty = $(".qty2");

        if (qty.val() < $(this).data("max")) {

            qty.val(parseInt(qty.val()) + 1);
        }
    });

    $(".down2").on('click', function() {

        var qty = $(".qty2");

        if (qty.val() > $(this).data("min")) {

            qty.val(parseInt(qty.val()) - 1);
        }
    });
  // Progress Bar

      $('.progress .progress-bar').css("width",
                function() {
                    return $(this).attr("aria-valuenow") + "%";
                }
        );

}(jQuery));