<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title', 'Welcome') - {{ setting()->get('title', 'MoloneyStreetRe') }}</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="@yield('description', setting()->get('site_description'))" />
    <meta content="@yield('keywords', setting()->get('keywords'))" name="keywords">
    <meta name="author" content="Alresia Technology" />
    <link rel="canonical" href="{{ url()->full() }}">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:title" content="@yield('title', setting()->get('title', 'Web Page'))">
    <meta property="og:description" content="@yield('description', setting()->get('site_description'))">
    <meta property="og:type" content="Website">
    <meta property="og:site_name" content="{{ setting()->get('site_name', 'MoloneyStreetRe') }}">
    <link rel="shortcut icon" href="{{ asset(setting()->get('site_favicon', 'img/favicon.ico')) }}" />

    <meta name="msvalidate.01" content="{{ setting()->get('msvalidate') }}" />
    <meta name="google-site-verification" content="{{ setting()->get('google-site-verification') }}" />
    <meta name="google-signin-client_id" content="{{ setting()->get('google-signin-client_id') }}">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="content-language" content="en">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta name="theme-color" content="{{ setting()->get('theme_color', '#000000') }}">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="{{ setting()->get('application_name', 'MoloneyStreetRe') }}">
    <link rel="icon" sizes="512x512" href="{{ asset(setting()->get('favicon', 'img/favicon.ico')) }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title"
        content="{{ setting()->get('apple_mobile_web_app_title', 'MoloneyStreetRe') }}">
    <link rel="apple-touch-icon" href="{{ asset(setting()->get('apple_touch_icon', 'img/favicon.ico')) }}">
    <meta name="msapplication-TileColor" content="{{ setting()->get('msapplication_tile_color', '#91142f') }}">
    <meta name="msapplication-TileImage"
        content="{{ asset(setting()->get('msapplication_tile_image', 'img/favicon.ico')) }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="manifest" href="{{ asset('manifest.json') }}">

    <!-- favicon
  ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}" />
    <!-- Google Fonts
  ============================================ -->
    <link href="{{ asset('assets/https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900') }}"
        rel="stylesheet" />
    <!-- Bootstrap CSS
  ============================================ -->

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <!-- Bootstrap CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" />
    <!-- owl.carousel CSS
  ============================================ -->
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets/js/owlcarousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/owlcarousel/dist/assets/owl.theme.default.min.css') }}">

    <!-- meanmenu CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu/meanmenu.min.css') }}?{{ time() }}" />
    <!-- animate CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />
    <!-- normalize CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}" />
    <!-- mCustomScrollbar CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/scrollbar/jquery.mCustomScrollbar.min.css') }}" />
    <!-- jvectormap CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/jvectormap/jquery-jvectormap-2.0.3.css') }}" />
    <!-- notika icon CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/notika-custom-icon.css') }}" />
    <!-- bootsrape icon CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons/bootstrap-icons.css') }}" />
    <!-- wave CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/wave/waves.min.css') }}" />
    <!-- main CSS
  ============================================ -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}"> -->
    <!-- style CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?{{ time() }}" />
    <!-- responsive CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}?{{ time() }}" />
    <!-- modernizr JS
  ============================================ -->
    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <!-- Libraries Stylesheet -->
    {{-- <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet"> --}}

    <script data-cfasync="true" type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebSite",
            "@id": "#website",
            "url": "{{ url('/') }}",
            "name": "{{ setting()->get('site_name', 'MoloneyStreetRe') }}",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "{{ url('/search?search={search_term_string}') }}",
                "query-input": "required name=search_term_string"
            }
        }
    </script>

    <script data-cfasync="true" type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "url": "{{ url('/') }}",
            "sameAs": [
                "{{ setting()->get('facebook_url') }}",
                "{{ setting()->get('twitter_url') }}"
            ],
            "@id": "#organization",
            "name": "{{ setting()->get('site_name', 'MoloneyStreetRe') }}",
            "logo": "{{ asset(setting()->get('site_logo', 'img/favicon.ico')) }}"
        }
    </script>

    <script data-cfasync="true">
        function detectmob() {
            if (navigator.userAgent.match(/Android/i) ||
                navigator.userAgent.match(/webOS/i) ||
                navigator.userAgent.match(/iPhone/i) ||
                navigator.userAgent.match(/iPad/i) ||
                navigator.userAgent.match(/iPod/i) ||
                navigator.userAgent.match(/BlackBerry/i) ||
                navigator.userAgent.match(/Windows Phone/i)
            ) {
                return true;
            } else {
                return false;
            }
        }
    </script>
    <style>
        body {
            font-family: "EB Garamond", serif;

        }

        :root {
            --site-name: {{ setting()->get('site_name', 'MoloneyStreetRe') }};
        }

        .card {
            border: 0;
            background: var(--body-bg-lighter);
            color: var(--text-color);
        }

        .bg-light {
            background: var(--body-bg-light);
            color: var(--text-color);
        }


        .owl-carousel .owl-nav {
            position: absolute;
            width: 100%;
            height: 30px;
            top: calc(50% - 15px);
            left: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 1;
        }

        .owl-carousel .owl-nav .owl-prev,
        .owl-carousel .owl-nav .owl-next {
            position: relative;
            width: 30px;
            height: 30px;
            margin: 0 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #dee2e6;
            background: transparent;
            border: 1px solid #dee2e6;
            font-size: 16px;
            transition: 0.3s;
        }

        .owl-carousel .owl-nav .owl-prev:hover,
        .owl-carousel .owl-nav .owl-next:hover {
            color: #ffffff;
            background: var(--color-primary);
            border-color: var(--color-primary);
        }

        .owl-carousel-1 .owl-nav {
            width: auto;
            left: -5px;
            justify-content: flex-start;
        }

        .owl-carousel-1 .owl-nav .owl-prev,
        .owl-carousel-1 .owl-nav .owl-next,
        .owl-carousel-3 .owl-nav .owl-prev,
        .owl-carousel-3 .owl-nav .owl-next {
            margin: 0 7px;
        }

        .owl-carousel-3 .owl-nav {
            width: auto;
            top: -56px;
            right: 15px;
            left: auto;
            justify-content: flex-end;
        }

        .overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            padding: 30px;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-end;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
        }

        .page-header {
            height: 400px;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url(../img/header.jpg);
            background-position: top;
            background-repeat: no-repeat;
            background-size: cover;
        }

        @media (max-width: 991.98px) {
            .page-header {
                height: 300px;
            }
        }

        .testimonial-text::before {
            position: absolute;
            content: "";
            width: 0;
            height: 0;
            bottom: -20px;
            left: 30px;
            border: 10px solid;
            border-color: #ffffff transparent transparent transparent;
            z-index: 2;
        }

        .testimonial-text::after {
            position: absolute;
            content: "";
            width: 0;
            height: 0;
            bottom: -24px;
            left: 28px;
            border: 12px solid;
            border-color: #dee2e6 transparent transparent transparent;
            z-index: 1;
        }

        .team-carousel .owl-dots,
        .testimonial-carousel .owl-dots {
            margin-top: 30px;
            text-align: center;
        }

        .team-carousel .owl-dot,
        .testimonial-carousel .owl-dot {
            display: inline-block;
            margin: 0 5px;
            width: 12px;
            height: 12px;
            border-radius: 10px;
            background: #dddddd;
        }

        .team-carousel .owl-dot.active,
        .testimonial-carousel .owl-dot.active {
            background: var(--color-primary);
        }

        .team-item .team-overlay {
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            opacity: 0;
            background: rgba(253, 172, 83, 0.7);
            border: 15px solid #ffffff;
            transition: 0.5s;
        }

        .team-item:hover .team-overlay {
            opacity: 1;
        }

        .contact-form .help-block ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }


        .logo-area .logo {
            font-size: 26px;
            font-weight: 900;
            color: var(--color-white);
        }

        .icon-dropdown {
            position: relative;
            color: var(--color-white);
            font-size: 22px;
        }



        .notice-count {
            position: absolute;
            top: -8px;
            right: -8px;
            font-size: 10px;
            background: #e46a76;
            height: 18px;
            width: 18px;
            line-height: 16px;
            text-align: center;
            border-radius: 50%;
            z-index: 999;
        }

        .notice-count::before {
            content: "";
            display: block;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            z-index: -1;
        }

        .notice-count-palse::before {
            position: absolute;
            margin-top: 0px;
            margin-left: 0px;
            background: orangered;
            -webkit-animation: pulse 3s linear infinite;
            animation: pulse 3s linear infinite;
            opacity: 0;
            top: -7px;
            left: -7px;
        }

        .notice-count-palse:after {
            -webkit-animation: pulse 2s linear 2.3s infinite;
            animation: pulse 2s linear 2.3s infinite;
            z-index: 99;
        }

        .icons-container,
        .buttons-container {
            display: flex;
            list-style: none;
            margin: 0;
            flex-direction: row;
            align-items: center;
            flex-wrap: nowrap;
        }

        .icons-container.navbar-nav>li {
            margin-left: 32px;
        }

        .icons-container.navbar-nav>li>a {
            color: var(--color-white);
            padding: 0px;
        }

        .icons-container.navbar-nav>li>a::after {
            display: none;
        }

        .icons-container.navbar-nav>li>a.theme-switcher {
            position: relative;
            display: flex;
            align-items: center;
            border: 1px solid;
            padding: 2px 5px;
            border-radius: 15px;
            font-size: 14px;

            transition: padding 0.5s ease;
        }

        .theme-switcher .mode {
            display: none;
            text-transform: capitalize;
        }

        @media (min-width: 768px) {
            .icons-container.navbar-nav>li>a.theme-switcher {
                position: relative;
                display: flex;
                align-items: center;
                border: 1px solid;
                padding: 2px 15px 2px 40px;
                border-radius: 15px;
                font-size: 14px;
                gap: 5px;
                transition: padding 0.5s ease;
            }

            .theme-switcher i {
                position: absolute;
                left: -1px;
                border: 1px solid var(--color-secondary);
                background: var(--body-bg-darker);
                display: flex;
                align-items: center;
                justify-content: center;
                width: 33px;
                height: 33px;
                border-radius: 50%;
                color: var(--text-color);
                transition: transform 0.5s ease;
                /* transition: left 0.5s ease, right 0.5s ease; */
            }

            .icons-container.navbar-nav>li>a.theme-switcher.dark-theme {
                padding: 2px 40px 2px 15px;
            }

            .theme-switcher.dark-theme i {
                transform: translateX(165%);
            }


            .theme-switcher .mode {
                display: block;

            }
        }

        .buttons-container .sign-in-button {
            border: 1px solid;
            padding: 5px 28px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 700;
            color: var(--color-white);
        }

        .header-top-menu .nav.notika-top-nav li .profile-dd {
            position: absolute;
            top: 100%;
            left: -100px;
            width: 200px;
            border: none;
            padding: 20px 0px;
            z-index: 9999;
        }

        .header-top-menu .nav.notika-top-nav .dd-link a {
            padding: 0px 15px;
            color: var(--text-color);
            font-size: 12px;
        }

        .navbar-search {
            position: relative;
        }

        .navbar-search input {
            padding: 8px 35px 8px 20px;
            background: var(--body-bg-darker);
            color: var(--text-color);
            outline: 0;
            border: 0;
            border-radius: 25px;
            width: 150px;
            transition: width 0.8s ease, all 0.3s ease;
        }

        @media (min-width: 768px) {
            .navbar-search input:focus {
                width: 270px;
            }

        }


        .navbar-search i {
            position: absolute;
            top: 0;
            right: 0;
            font-size: 16px;
            text-align: center;
            line-height: 10px;
            cursor: pointer;
            margin: 8px 12px;
            padding: 0;
            color: var(--text-color);
        }

        .marquee-container {
            overflow: hidden;
            /* Hide overflow content */
            white-space: nowrap;
            /* Prevent text wrapping */
            width: 100%;
            /* Container width */
            padding-left: 20px;
        }

        .marquee-separator {

            font-weight: 900;
        }

        .notika-main-menu-dropdown.marquee {
            display: inline-block;
            animation: marquee-scroll 60s linear infinite;

        }

        @keyframes marquee-scroll {
            0% {
                transform: translateX(0);
            }

            /* Start within the viewable area */
            95% {
                transform: translateX(-100%);
            }

            /* Move to the end of the container */
            100% {
                transform: translateX(-100%);
            }

            /* Hold the position at the end */

            /* Pause at the end */

            /* Hold position to create pause */
        }
    </style>
    @yield('styles')
</head>

<body>
    <!--[if lt IE 8]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="{{ asset('assets/http://browsehappy.com/') }}">upgrade your browser</a> to improve
        your experience.
      </p>
    <![endif]-->
    <!-- Start Header Top Area -->
    @include('layouts.header.index')
    <!-- End Header Top Area -->

    @include('layouts.menus.index')
    <div class="container">
        @yield('content')
    </div>

    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>
                            Copyright © 2018 . All rights reserved. Crafted with Care by
                            <a href="#">Alresia </a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery
  ============================================ -->
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap JS
  ============================================ -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- wow JS
  ============================================ -->
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <!-- price-slider JS
  ============================================ -->
    <script src="{{ asset('assets/js/jquery-price-slider.js') }}"></script>
    <!-- owl.carousel JS
  ============================================ -->
    <script src="{{ asset('assets/js/owlcarousel/dist/owl.carousel.min.js') }}"></script>
    <!-- scrollUp JS
  ============================================ -->
    <script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}"></script>
    <!-- meanmenu JS
  ============================================ -->
    <script src="{{ asset('assets/js/meanmenu/jquery.meanmenu.js') }}"></script>
    <!-- counterup JS
  ============================================ -->
    <script src="{{ asset('assets/js/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/counterup/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/counterup/counterup-active.js') }}"></script>
    <!-- mCustomScrollbar JS
  ============================================ -->
    <script src="{{ asset('assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- jvectormap JS
  ============================================ -->
    <script src="{{ asset('assets/js/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/js/jvectormap/jvectormap-active.js') }}"></script>
    <!-- sparkline JS
  ============================================ -->
    <script src="{{ asset('assets/js/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/js/sparkline/sparkline-active.js') }}"></script>
    <!-- sparkline JS
  ============================================ -->
    <script src="{{ asset('assets/js/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/js/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/js/flot/curvedLines.js') }}"></script>
    <script src="{{ asset('assets/js/flot/flot-active.js') }}"></script>
    <!-- knob JS
  ============================================ -->
    <script src="{{ asset('assets/js/knob/jquery.knob.js') }}"></script>
    <script src="{{ asset('assets/js/knob/jquery.appear.js') }}"></script>
    <script src="{{ asset('assets/js/knob/knob-active.js') }}"></script>
    <!--  wave JS
  ============================================ -->
    <script src="{{ asset('assets/js/wave/waves.min.js') }}"></script>
    <script src="{{ asset('assets/js/wave/wave-active.js') }}"></script>
    <!--  todo JS
  ============================================ -->
    <script src="{{ asset('assets/js/todo/jquery.todo.js') }}"></script>
    <!-- plugins JS
  ============================================ -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <!--  Chat JS
  ============================================ -->
    <script src="{{ asset('assets/js/chat/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/chat/jquery.chat.js') }}"></script>
    <!-- main JS
  ============================================ -->
    <script src="{{ asset('assets/js/charts/Chart.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}?{{ time() }}"></script>
    <!-- tawk chat JS
  ============================================ -->
    <script src="{{ asset('assets/js/tawk-chat.js') }}"></script>
    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     const bgColor = getComputedStyle(document.documentElement).getPropertyValue('--body-bg-lighter').trim()
        //         .slice(1) || 'eaedf9';
        //     const textColor = getComputedStyle(document.documentElement).getPropertyValue('--text-color').trim()
        //         .slice(1) || '3c5cec';

        //     document.querySelectorAll('img').forEach(img => {
        //         img.onerror = function() {
        //             if (!this.dataset.fallbackSet) {
        //                 // Get the current width and height of the image
        //                 const width = this.offsetWidth || 150; // Default width if none set
        //                 const height = this.offsetHeight || 150; // Default height if none set

        //                 // Construct the fallback URL with dimensions
        //                 const fallbackSrc =
        //                     `https://via.placeholder.com/${width}x${height}/${bgColor}/${textColor}?text=noimage`;

        //                 // Set the fallback image
        //                 this.src = fallbackSrc;
        //                 this.dataset.fallbackSet = "true"; // Avoid infinite loop
        //             }
        //         };
        //     });
        // });
    </script>


    @yield('scripts')

</body>

</html>
