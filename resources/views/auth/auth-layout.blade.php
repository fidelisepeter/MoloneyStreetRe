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


    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?{{ time() }}" />
    <!-- Bootstrap CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" />
    <!-- owl.carousel CSS
  ============================================ -->
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets/js/owl-carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/owl-carousel/dist/assets/owl.theme.default.min.css') }}">

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
    <!-- Notika icon CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/notika-custom-icon.css') }}">
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
            height: 100vh;
        }

        .form-control {
            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 8px);
            padding: 0.375rem 1.75rem !important;
            font-size: 1.4rem;
            font-weight: 400;
            line-height: 1.5;
            border-radius: 8px !important;
            color: var(--text-color);
            background-color: var(--body-bg);
            background-clip: padding-box;
            border: 1px solid #ced4da;
            color: var(--text-color);
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
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



    <div class="login-content d-flex justify-content-center align-items-center">
        @yield('content')
        {{-- <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="footer-copy-right">
                    <p style="color: var(--color-white)">
                        Copyright © 2018 . All rights reserved. Crafted with Care by
                        <a href="#" class="fw-bolder"
                            style="color: var(--color-white); text-decoration: none; font-weight:900;">Alresia </a>.
                    </p>
                </div>
            </div>
        </div> --}}
    </div>


    <!-- jquery
  ============================================ -->
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap JS
  ============================================ -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- wow JS
  ============================================ -->
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    </p>
    </div>
    </div>
    </div>
    </div>


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
    </p>
    </div>
    </div>
    </div>
    </div>


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
    <script src="{{ asset('assets/js/owl-carousel/dist/owl.carousel.min.js') }}"></script>
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


    @yield('scripts')

</body>

</html>
