<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Welcome') - {{ setting()->get('title', 'MoloneyStreetRe') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Meta -->
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

    <link rel="manifest" href="{{ asset('manifest.json') }}">

    <!-- Favicon -->
    <link href="{{ asset(setting()->get('favicon', 'img/favicon.png')) }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap"
        rel="stylesheet">
    {{-- <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@300;400;500;700;900&display=swap"
        rel="stylesheet"> --}}

    <!-- Font Awesome -->
    <link href="{{ asset('lib/font-awesome/6.4.2/css/all.min.css') }}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.min.css') }}?{{ time() }}" rel="stylesheet">
    <style>
        body {
            font-family: "EB Garamond", serif;
            font-optical-sizing: auto;
            font-style: normal;
            background-color: #327e34;
        }

        /* Custom tooltip style */
        /* .tooltip-inner {
            background-color: #00acd6 !important;
            color: #fff;
        }

        .tooltip.top .tooltip-arrow {
            border-top-color: #00acd6;
        }

        .tooltip.right .tooltip-arrow {
            border-right-color: #00acd6;
        }

        .tooltip.bottom .tooltip-arrow {
            border-bottom-color: #00acd6;
        }

        .tooltip.left .tooltip-arrow {
            border-left-color: #00acd6;
        } */

        .main-bg {
            background-color: #f2f2f2;
        }

        .layover {
            --layover-background-image: '';
        }

        .layover::before {
            content: "";
            display: block;
            position: absolute;
            /* background-color: #3e9bae; */
            background-image: var(--layover-background-image);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 50%;
            height: 100%;
            left: 0;
            top: 0;
            transform-origin: center center;
            width: 100%;
            /* background-color: #3e9bae; */
        }

        .container .container-fluid {
            padding-right: 0px;
            padding-left: 0px;
        }
    </style>
    <style>
        .loader-container {
            position: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            z-index: 9999;
        }

        .loader {
            border: 16px solid #f3f3f3;
            border-top: 16px solid var(--primaryColor);
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
            position: fixed;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .sticky-icon {
            --sticky-text-color: #fff;
            --sticky-icon-color: var(--primaryColor);
            --sticky-icon-background: #FFF;
            --sticky-background: #070101;
            z-index: 10;
            position: fixed;
            top: 15%;
            right: 0%;
            width: 220px;
            display: flex;
            flex-direction: column;
        }

        .z-index-over-social-links {
            z-index: 20;
        }

        .sticky-icon a {
            z-index: 5;
            color: var(--sticky-text-color);
            background: var(--sticky-background);
            transform: translate(160px, 0px);
            border-radius: 50px 0px 0px 50px;
            text-align: left;
            margin: 2px;
            text-decoration: none;
            text-transform: uppercase;
            padding: 10px;
            font-size: 20px;
            transition: all 0.8s;

        }

        .sticky-icon a:hover {
            color: #FFF;
            transform: translate(0px, 0px);
        }

        .sticky-icon a:hover i {
            transform: rotate(360deg);
        }

        .video-button {
            width: 80px;
            height: 80px;
            line-height: 80px;
            background: var(--primaryColor);
            color: #fff;
            border-radius: 100%;
            text-align: center;
            font-size: 25px;
            margin-right: 20px;
            display: inline-block;
            position: relative;
            transition: all 0.8s;
        }

        .video-button:hover {
            color: var(--primaryColor);
            background: #fff;
            border: 1px solid var(--primaryColor);
        }

        .video-button:hover {
            color: #fff;
            background: #ffffff23;
            border: 1px solid #ffffffad;
        }



        .video-button::before {
            content: "";
            border: 2px solid var(--primaryColor);
            position: absolute;
            z-index: 0;
            left: 50%;
            top: 50%;
            transform: translateX(-50%) translateY(-50%);
            display: block;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            animation: zoomBig 3.25s linear infinite;
            animation-delay: 0.75s;
        }

        .video-button:hover::before {
            border: 2px solid #fff;
        }

        @keyframes zoomBig {
            0% {
                transform: translate(-50%, -50%) scale(0.5);
                opacity: 1;
                border-width: 3px;
            }

            40% {
                opacity: 0.5;
                border-width: 2px;
            }

            65% {
                border-width: 1px;
            }

            100% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 0;
                border-width: 1px;
            }
        }

        /*.search_icon a:hover i  {
 transform:rotate(360deg);}*/



        .sticky-icon a i {
            background-color: var(--sticky-icon-background);
            height: 35px;
            width: 35px;
            color: var(--sticky-icon-color);
            text-align: center;
            line-height: 35px;
            border-radius: 50%;
            margin-right: 20px;
            transition: all 0.5s;
        }

        .sticky-icon a i.fa-facebook-f {
            background-color: #FFF;
            color: #2C80D3;
        }

        .sticky-icon a i.fa-google-plus-g {
            background-color: #FFF;
            color: #d34836;
        }

        .sticky-icon a i.fa-instagram {
            background-color: #FFF;
            color: #FD1D1D;
        }

        .sticky-icon a i.fa-youtube {
            background-color: #FFF;
            color: #fa0910;
        }

        .sticky-icon a i.fa-twitter {
            background-color: #FFF;
            color: #53c5ff;
        }

        .fas fa-shopping-cart {
            background-color: #FFF;
        }

        .custom-card {
            box-shadow: 0px 30px 40px 0px rgba(1, 11, 60, 0.06);
            border-radius: 4px;
        }

        .custom-card:hover {
            transform: translateX(2px)
        }

        .navbar-light .navbar-nav .nav-link {
            color: #327e34;
            border-bottom: 3px transparent;
            background-color: #fff;
        }

        .navbar-light .navbar-nav .nav-link:hover {
            color: #327e34;
            border-bottom: 3px solid;
            background-color: #fff;
            transition: 0.3s ease-in-out;

        }

        .navbar-light .navbar-nav .nav-link.active {
            color: #327e34;
            border-bottom: 3px solid;
            font-weight: 700;
            background-color: #fff;
        }

        .dropdown-menu {
            box-shadow: 0px 3px 9px 0px rgba(0, 0, 0, 0.12);

            border: 0;
            border-radius: 0;

            left: -20px;
            display: block;
            visibility: hidden;
            transition: 0.3s ease;
            opacity: 0;
            transform: scaleY(0);
            transform-origin: top;
        }

        .dropdown-menu.show {
            visibility: visible;
            opacity: 1;
            transform: scaleY(1);
        }

        #myBtn {
            height: 50px;
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            text-align: center;
            padding: 10px;
            text-align: center;
            line-height: 40px;
            border: none;
            outline: none;
            background-color: #1e88e5;
            color: white;
            cursor: pointer;
            border-radius: 50%;
        }

        .fa-arrow-circle-up {
            font-size: 30px;
        }

        #myBtn:hover {
            background-color: #555;
        }
    </style>
    @yield('styles')
</head>

<body>
    <div class="loader-container">
        <div class="loader"></div>
    </div>
    <div class="@if (setting()->get('box_layout', request('box-layout'))) container @endif main-bg">


        <!-- Topbar Start -->
        <div class="container-fluid">
            {{-- <div class="row align-items-center bg-light px-lg-5">
                <div class="col-12 col-md-8">
                    <div class="d-flex justify-content-between">
                        <div class="bg-primary text-white text-center py-2" style="width: 100px;">Trending</div>
        <div class="loader"></div>
    </div>
    <div class="container main-bg">


        <!-- Topbar Start -->
        <div class="container-fluid">
            {{-- <div class="row align-items-center bg-light px-lg-5">
                <div class="col-12 col-md-8">
                    <div class="d-flex justify-content-between">
                        <div class="bg-primary text-white text-center py-2" style="width: 100px;">Trending</div>
                        <div class="owl-carousel owl-carousel-1 trending-carousel position-relative d-inline-flex align-items-center ml-3"
                            style="width: calc(100% - 100px); padding-left: 90px;">
                            <div class="text-truncate"><a class="text-secondary" href="">Labore sit justo amet eos
                                    sed, et sanctus dolor diam eos</a></div>
                            <div class="text-truncate"><a class="text-secondary" href="">Gubergren elitr amet eirmod
                                    et lorem diam elitr, ut est erat Gubergren elitr amet eirmod et lorem diam elitr, ut est
                                    erat</a></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 text-right d-none d-md-block">
                    Monday, January 01, 2045
                </div>
            </div> --}}
            @php
                $topSlides = \App\Models\Post::with('classification')
                    ->whereHas('classification', function ($query) {
                        $query->whereIn('slug', ['breaking-news']);
                    })
                    ->get();
            @endphp
            @if ($topSlides->count() > 0)
                <div class="row align-items-center bg-light px-lg-5">
                    <div class="col-12 col-md-8">
                        <div class="d-flex justify-content-between">
                            <div class="bg-primary text-white text-center py-2" style="width: 100px;">Breaking</div>
                            <div class="owl-carousel owl-carousel-1 tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                                style="width: calc(100% - 150px); padding-left: 90px;">

                                @foreach ($topSlides as $topSlide)
                                    <div class="text-truncate"><a class="text-secondary"
                                            href="{{ route('show', $topSlide) }}">{{ $topSlide->title }}</a></div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-right d-none d-md-block">
                        {{ \Carbon\Carbon::now()->format('l, F d, Y') }}
                    </div>
                </div>
            @endif

            <div class="row align-items-center py-2 px-lg-5">
                <div class="col-lg-8">
                    <div href="" class="navbar-brand d-none d-lg-block">
                        <h1 class="m-0 display-5" style="">
                            @if (request()->routeIs('home.index'))
                                Welcome to
                            @endif

                            <span class="text-primary ml-2">{{ setting()->get('site_name', 'MoloneyStreetRe') }}</span>

                        </h1>
                        <p>{{ setting()->get('site_slogan', 'A financial markets melting platform') }}</p>
                        </d>
                    </div>
                    <div class="col-lg-4">
                    </div>

                </div>
            </div>
            <!-- Topbar End -->

            <!-- Navbar Start -->
            <div class="container-fluid p-0 mb-3">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
                    <a href="" class="navbar-brand d-block d-lg-none">
                        <h1 class="m-0 display-5 text-uppercase">{{ setting()->get('site_name', 'MoloneyStreetRe') }}
                        </h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse"
                        data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{ route('home.index') }}"
                                class="nav-item nav-link @if (request()->routeIs('home.index')) active @endif">Home</a>
                            <a href="{{ route('home.about') }}"
                                class="nav-item nav-link @if (request()->routeIs('home.about')) active @endif">About</a>
                            <a href="{{ route('show', 'latest') }}" class="nav-item nav-link">Latest</a>
                            {{-- <a href="{{ route('show', 'breaking') }}" class="nav-item nav-link @if (request()->routeIs('show', 'breaking')) active @endif">Breaking</a> --}}
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle"
                                    data-toggle="dropdown">Classified</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="{{ route('posts.index') }}" class="dropdown-item">All Post</a>
                                    @foreach (\App\Models\Classification::whereHas('posts')->get() as $classification)
                                        <a href="{{ route('show', $classification) }}"
                                            class="dropdown-item">{{ $classification->title }}</a>
                                    @endforeach
                                </div>
                            </div>

                            <a href="{{ route('home.contact') }}"
                                class="nav-item nav-link  @if (request()->routeIs('home.contact')) active @endif">Contact</a>
                        </div>
                        <div class="input-group ml-auto" style="width: 100%;max-width: 300px;/* border: 0px; */">
                            <input type="text" class="form-control" placeholder="Keyword"
                                style="border-top-left-radius: 25px;border-bottom-left-radius: 25px;border: 0;background-color: #f2f2f2;">
                            <div class="input-group-append">
                                <button class="input-group-text text-secondary"
                                    style="border-top-right-radius: 25px;border-bottom-right-radius: 25px;color: var(--primaryColor) !important;border: 0;background-color: #f2f2f2;"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- Navbar End -->
            <!--Start Sticky Icon-->
            <div class="sticky-icon">
                <a href="{{ setting()->get('instagram_url') }}"
                    style="--sticky-background: #fd1d1d; --sticky-background: linear-gradient(57deg, #833ab4, #fd1d1d 75%, #fcb045 100%);"><i
                        class="fab fa-instagram"></i> Instagram </a>
                <a href="{{ setting()->get('facebook_url') }}"
                    style="--sticky-background: #3b5998;--sticky-icon-color: #3b5998;"><i class="fab fa-facebook-f">
                    </i>
                    Facebook </a>
                <a href="{{ setting()->get('facebook_url') }}"
                    style="--sticky-background: #06a32d;--sticky-icon-color: #03b830;"><i class="fab fa-whatsapp">
                    </i>
                    WhatsApp </a>
                <a href="{{ setting()->get('youtube_url') }}"
                    style="--sticky-background: #fa0910;--sticky-icon-color: #fa0910;"><i class="fab fa-youtube"></i>
                    Youtube
                </a>
                <a href="{{ setting()->get('twitter_url') }}"
                    style="--sticky-background: #53c5ff;--sticky-icon-color: #53c5ff;"><i class="fab fa-twitter"> </i>
                    Twitter
                </a>
            </div>
            <!--End Sticky Icon-->
            @yield('content')

            <!-- Footer Start -->
            <div class="container-fluid bg-light pt-3 px-sm-3 px-md-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3 class="m-0 display-4" style="">

                            <span
                                class="text-primary ml-2">{{ setting()->get('site_name', 'MoloneyStreetRe') }}</span>

                        </h3>
                        <p class="mb-0">
                            {{ setting()->get('site_description', '1234 Demo Stree, City, State, 56789') }}

                        <p class="mb-0">Email: {{ setting()->get('site_email', 'info@moloneystreet.com') }}</p>
                        <p class="mb-0">Phone:
                            {{ site()->format_phone_number(setting()->get('site_phone', '1234567890')) }}
                        </p>
                        </p>
                    </div>
                </div>
                <div class="container-fluid px-sm-3 px-md-5">
                    <p class="pb-3 text-center">
                        &copy; {{ date('Y') }} . All Rights Reserved.

                    </p>
                </div>
            </div>
            <!-- Footer End -->
        </div>


        <!-- JavaScript Libraries -->

        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

        <!-- Contact Javascript File -->
        <script src="{{ asset('mail/jqBootstrapValidation.min.js') }}"></script>
        <script src="{{ asset('mail/contact.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('js/main.js') }}?{{ time() }}"></script>

        <script>
            $(document).ready(function() {
                $('.loader-container').addClass('d-none');
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
        @yield('scripts')

</body>

</html>
