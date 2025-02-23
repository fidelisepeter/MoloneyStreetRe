<div class="header-top-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="logo-area">
                    <a href="#" class="logo">
                        {{-- <img src="{{ asset('assets/img/logo/logo.png') }}" alt="" /> --}}
                        MoloneyStreetRe
                    </a>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 mb-3 mb-md-0">

                <div class="header-top-menu h-100 d-flex justify-content-center justify-content-md-end align-items-center flex-column flex-md-row"
                    style="gap: 36px;">
                    <ul class="nav navbar-nav notika-top-nav icons-container">
                        <li class="nav-item ml-0">

                            <div class="navbar-search">
                                <i class="bi bi-search"></i>
                                <input type="text" />
                            </div>

                        </li>


                        <li class="nav-item nc-al">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                class="nav-link dropdown-toggle">
                                <i class="bi bi-bell"></i>
                                <span class="notice-count notice-count-palse"><span>3</span></span>
                            </a>
                            <div role="menu" class="dropdown-menu message-dd notification-dd animated zoomIn">
                                <div class="hd-mg-tt">
                                    <h2>Notification</h2>
                                </div>
                                <div class="hd-message-info">
                                    <a href="#">
                                        <div class="hd-message-sn">
                                            <div class="hd-message-img">
                                                <img src="{{ asset('assets/img/post/1.jpg') }}" alt="" />
                                            </div>
                                            <div class="hd-mg-ctn">
                                                <h3>David Belle</h3>
                                                <p>
                                                    Cum sociis natoque penatibus et magnis dis
                                                    parturient montes
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="hd-message-sn">
                                            <div class="hd-message-img">
                                                <img src="{{ asset('assets/img/post/2.jpg') }}" alt="" />
                                            </div>
                                            <div class="hd-mg-ctn">
                                                <h3>Jonathan Morris</h3>
                                                <p>
                                                    Cum sociis natoque penatibus et magnis dis
                                                    parturient montes
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="hd-message-sn">
                                            <div class="hd-message-img">
                                                <img src="{{ asset('assets/img/post/4.jpg') }}" alt="" />
                                            </div>
                                            <div class="hd-mg-ctn">
                                                <h3>Fredric Mitchell</h3>
                                                <p>
                                                    Cum sociis natoque penatibus et magnis dis
                                                    parturient montes
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="hd-message-sn">
                                            <div class="hd-message-img">
                                                <img src="{{ asset('assets/img/post/1.jpg') }}" alt="" />
                                            </div>
                                            <div class="hd-mg-ctn">
                                                <h3>David Belle</h3>
                                                <p>
                                                    Cum sociis natoque penatibus et magnis dis
                                                    parturient montes
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="hd-message-sn">
                                            <div class="hd-message-img">
                                                <img src="{{ asset('assets/img/post/2.jpg') }}" alt="" />
                                            </div>
                                            <div class="hd-mg-ctn">
                                                <h3>Glenn Jecobs</h3>
                                                <p>
                                                    Cum sociis natoque penatibus et magnis dis
                                                    parturient montes
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="hd-mg-va">
                                    <a href="#">View All</a>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item nc-al">

                            @if (Auth::check())
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                    class="nav-link dropdown-toggle d-flex gap-3">
                                    <i class="bi bi-person"></i>
                                    {{-- @if (Auth::check())
                                        <div style="">
                                            {{ Auth::user()->first_name }}
                                        </div>
                                    @endif --}}
                                    {{-- <span class="notice-count notice-count-palse"><span>!</span></span> --}}
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="nav-link dropdown-toggle">
                                    <i class="bi bi-person"></i>
                                    <span class="notice-count notice-count-palse"><span>!</span></span>
                                </a>
                            @endif


                            <div role="menu" class="dropdown-menu profile-dd animated zoomIn">

                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="text-center mt-3">
                                        <div class="dd-img" style="">
                                            <img src="" alt="">
                                        </div>
                                        <div style="font-weight: 800; font-size: 1.4rem;margin: 0;">
                                            {{ Auth::check() ? Auth::user()->first_name : 'Guest' }}

                                        </div>
                                        @if (Auth::check())
                                            <div style="margin-top: 0; margin-bottom: 1rem;">
                                                {{ Auth::user()->email }}
                                            </div>
                                        @endif

                                    </div>
                                </div>
                                @if (Auth::check())
                                    <div class="dd-link"><a href="#"><i class="bi bi-pencil-square"></i>
                                            Profile</a>
                                    </div>
                                    <div class="dd-link"><a href="#"> <i class="bi bi-gear"></i> Settings</a>
                                    </div>
                                    <div class="dd-link"><a href="{{ route('logout') }}"><i
                                                class="bi bi-door-closed"></i>
                                            Sign out </a></div>
                                @endif


                            </div>

                        </li>

                        <li class="nav-item nc-al">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                class="nav-link theme-switcher">
                                <i class="bi bi-sun"></i>
                                <span class="mode">Dark</span>
                            </a>


                        </li>

                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
