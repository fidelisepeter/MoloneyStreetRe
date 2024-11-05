(function ($) {
    "use strict";

    const theme = localStorage.getItem("theme") || "light";
    const html = document.documentElement;
    const theme_switcher = $(".theme-switcher");
    if (theme == "light") {
        theme_switcher.removeClass("dark-theme");
        theme_switcher.find("i").addClass("bi-sun").removeClass("bi-move");
        theme_switcher.find("span").text("Dark");
        html.setAttribute("data-theme", "light");
    } else {
        theme_switcher.addClass("dark-theme");
        theme_switcher.find("i").addClass("bi-moon").removeClass("bi-sun");
        theme_switcher.find("span").text("Light");
        html.setAttribute("data-theme", "dark");
    }

    $(".chosen")[0] &&
        $(".chosen").chosen({
            width: "100%",
            allow_single_deselect: !0,
        });
    /*--------------------------
		 auto-size Active Class
		---------------------------- */
    $(".auto-size")[0] && autosize($(".auto-size"));
    /*--------------------------
		 Collapse Accordion Active Class
		---------------------------- */
    $(".collapse")[0] &&
        ($(".collapse").on("show.bs.collapse", function (e) {
            $(this).closest(".panel").find(".panel-heading").addClass("active");
        }),
        $(".collapse").on("hide.bs.collapse", function (e) {
            $(this)
                .closest(".panel")
                .find(".panel-heading")
                .removeClass("active");
        }),
        $(".collapse.in").each(function () {
            $(this).closest(".panel").find(".panel-heading").addClass("active");
        }));
    /*----------------------------
		 jQuery tooltip
		------------------------------ */
    $('[data-toggle="tooltip"]').tooltip();
    /*--------------------------
		 popover
		---------------------------- */
    $('[data-toggle="popover"]')[0] && $('[data-toggle="popover"]').popover();
    /*--------------------------
		 File Download
		---------------------------- */
    $(".btn.dw-al-ft").on("click", function (e) {
        e.preventDefault();
    });
    /*--------------------------
		 Sidebar Left
		---------------------------- */
    $("#sidebarCollapse").on("click", function () {
        $("#sidebar").toggleClass("active");
    });
    $("#sidebarCollapse").on("click", function () {
        $("body").toggleClass("mini-navbar");
        SmoothlyMenu();
    });
    $(".menu-switcher-pro").on("click", function () {
        var button = $(this).find("i.nk-indicator");
        button
            .toggleClass("notika-menu-befores")
            .toggleClass("notika-menu-after");
    });
    $(".menu-switcher-pro.fullscreenbtn").on("click", function () {
        var button = $(this).find("i.nk-indicator");
        button.toggleClass("notika-back").toggleClass("notika-next-pro");
    });
    /*--------------------------
		 Button BTN Left
		---------------------------- */

    $(".nk-int-st")[0] &&
        ($("body").on("focus", ".nk-int-st .form-control", function () {
            $(this).closest(".nk-int-st").addClass("nk-toggled");
        }),
        $("body").on("blur", ".form-control", function () {
            var p = $(this).closest(".form-group, .input-group"),
                i = p.find(".form-control").val();
            p.hasClass("fg-float")
                ? 0 == i.length &&
                  $(this).closest(".nk-int-st").removeClass("nk-toggled")
                : $(this).closest(".nk-int-st").removeClass("nk-toggled");
        })),
        $(".fg-float")[0] &&
            $(".fg-float .form-control").each(function () {
                var i = $(this).val();
                0 == !i.length &&
                    $(this).closest(".nk-int-st").addClass("nk-toggled");
            });
    /*--------------------------
		 mCustomScrollbar
		---------------------------- */
    $(window).on("load", function () {
        $(".widgets-chat-scrollbar").mCustomScrollbar({
            setHeight: 460,
            autoHideScrollbar: true,
            scrollbarPosition: "outside",
            theme: "light-1",
        });
        $(".notika-todo-scrollbar").mCustomScrollbar({
            setHeight: 445,
            autoHideScrollbar: true,
            scrollbarPosition: "outside",
            theme: "light-1",
        });
        $(".comment-scrollbar").mCustomScrollbar({
            autoHideScrollbar: true,
            scrollbarPosition: "outside",
            theme: "light-1",
        });
    });
    /*----------------------------
	 jQuery MeanMenu
	------------------------------ */
    jQuery("nav#dropdown").meanmenu();

    /*----------------------------
	 wow js active
	------------------------------ */
    new WOW().init();

    /*----------------------------
	 owl active
	------------------------------ */
    $("#owl-demo").owlCarousel({
        autoPlay: false,
        slideSpeed: 2000,
        pagination: false,
        navigation: true,
        items: 4,
        /* transitionStyle : "fade", */ /* [This code for animation ] */
        navigationText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>",
        ],
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [980, 3],
        itemsTablet: [768, 2],
        itemsMobile: [479, 1],
    });
    // Tranding carousel
    $(".tranding-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 2000,
        items: 1,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>',
        ],
    });

    // Carousel item 1
    $(".carousel-item-1").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        items: 1,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>',
        ],
    });

    // Carousel item 2
    $(".carousel-item-2").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 30,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>',
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
        },
    });

    // Carousel item 3
    $(".carousel-item-3").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 30,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>',
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
            },
        },
    });

    // Category Carousel Item
    $(".category-carousel-item").each(function () {
        $(this).owlCarousel({
            autoplay: true,
            smartSpeed: 1000,
            margin: 30,
            dots: false,
            loop: true,
            nav: true,
            navText: [
                '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>',
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
            },
        });
    });

    // Carousel item 4
    $(".carousel-item-4").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 30,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>',
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
            },
            1200: {
                items: 4,
            },
        },
    });

    /*----------------------------
	 price-slider active
	------------------------------ */
    $("#slider-range").slider({
        range: true,
        min: 40,
        max: 600,
        values: [60, 570],
        slide: function (event, ui) {
            $("#amount").val("£" + ui.values[0] + " - £" + ui.values[1]);
        },
    });
    $("#amount").val(
        "£" +
            $("#slider-range").slider("values", 0) +
            " - £" +
            $("#slider-range").slider("values", 1)
    );

    /*--------------------------
	 scrollUp
	---------------------------- */
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: "linear",
        scrollSpeed: 900,
        animation: "fade",
    });
    // $(window).on("load", function () {
    //     const theme = localStorage.getItem("theme") || "light";
    //     const theme_switcher = $(".theme-switcher");
    //     if (theme == "light") {
    //         theme_switcher.removeClass("dark-theme");
    //         theme_switcher.find("i").addClass("bi-sun").removeClass("bi-move");
    //         theme_switcher.find("span").text("Dark");
    //     } else {
    //         theme_switcher.addClass("dark-theme");
    //         theme_switcher.find("i").addClass("bi-moon").removeClass("bi-sun");
    //         theme_switcher.find("span").text("Light");
    //     }
    // });

    $(".theme-switcher").on("click", function () {
        if ($(this).hasClass("dark-theme")) {
            $(this).removeClass("dark-theme");
            $(this).find("i").addClass("bi-sun").removeClass("bi-move");
            $(this).find("span").text("Dark");
            localStorage.setItem("theme", "light");
            document.documentElement.setAttribute("data-theme", "light");
        } else {
            $(this).addClass("dark-theme");
            $(this).find("i").addClass("bi-moon").removeClass("bi-sun");
            $(this).find("span").text("Light");
            localStorage.setItem("theme", "dark");
            document.documentElement.setAttribute("data-theme", "dark");
        }
    });

    const ctx = document.getElementById("myRadarChart").getContext("2d");
    const myRadarChart = new Chart(ctx, {
        type: "radar",
        data: {
            labels: ["DIVIDEND", "VALUE", "FUTURE", "PAST", "HEALTH"],
            datasets: [
                {
                    label: "Your Data Label",
                    data: [75, 90, 60, 50, 80], // Example values
                    backgroundColor: "rgba(0, 255, 0, 0.5)", // Green with 50% opacity
                    borderColor: "rgba(0, 255, 0, 1)",
                    borderWidth: 2,
                },
            ],
        },
        options: {
            scales: {
                r: {
                    angleLines: { display: false },
                    suggestedMin: 0,
                    suggestedMax: 100,
                },
            },
        },
    });
})(jQuery);
