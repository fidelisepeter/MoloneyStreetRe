{{-- @php
    $menus = config('menus.menus');
@endphp --}}

@php

    $menus = site()->filterMenuForUser(config('menus.menus'), auth()->check());
    $content = [
        'Welcome to MoloneyStreetRe',
        'A dynamic financial markets platform dedicated to providing comprehensive and accurate information on various financial aspects that impact everyday life. Our platform stands out as a one-stop hub for individuals looking to make informed financial decisions with ease and confidence.',
    ];
    function isActive($link, $children = [], $active_if = [])
    {
        $currentUrl = url()->current();
        $menuLink = url($link);

        // Check if the current URL matches the menu link
        if ($menuLink === $currentUrl) {
            return true;
        }

        // Check if the current URL matches any of the children
        foreach ($children as $child) {
            $childLink = url($child['link']);
            if ($childLink === $currentUrl) {
                return true;
            }
        }

        // Check the active_if patterns if no match is found
        foreach ($active_if as $pattern) {
            if (Str::is($pattern, parse_url($currentUrl, PHP_URL_PATH))) {
                return true;
            }
        }

        return false;
    }
@endphp

<!-- Mobile Menu Start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            @foreach ($menus as $menu)
                                <li
                                    class="{{ isActive($menu['link'], $menu['children'] ?? [], $menu['active_if'] ?? []) ? 'active' : '' }}">
                                    <a href="{{ $menu['link'] }}">
                                        {!! $menu['icon'] !!} {{ $menu['title'] }}
                                    </a>
                                    @if (!empty($menu['children']))
                                        <ul class="collapse dropdown-header-top">
                                            @foreach ($menu['children'] as $child)
                                                <li
                                                    class="{{ isActive($child['link'], [], $child['active_if'] ?? []) ? 'active' : '' }}">
                                                    <a href="{{ $child['link'] }}">{{ $child['title'] }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu End -->

<!-- Main Menu Area Start -->
<div class="main-menu-area mg-tb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    @foreach ($menus as $menu)
                        <li
                            class="{{ isActive($menu['link'], $menu['children'] ?? [], $menu['active_if'] ?? []) ? 'active' : '' }}">
                            <a
                                @if (!empty($menu['children'])) data-toggle="tab"
                                href="#{{ str_replace(' ', '', ucwords($menu['title'])) }}"
                                @else
                                href="{{ $menu['link'] }}" @endif>
                                {!! $menu['icon'] !!} {{ $menu['title'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content custom-menu-content">

                    @foreach ($menus as $menu)
                        <div id="{{ str_replace(' ', '', ucwords($menu['title'])) }}"
                            class="tab-pane in {{ isActive($menu['link'], $menu['children'] ?? [], $menu['active_if'] ?? []) ? 'active' : '' }} notika-tab-menu-bg animated flipInX  @if (empty($menu['children'])) marquee-container @endif">
                            @if (!empty($menu['children']))
                                <ul class="notika-main-menu-dropdown">
                                    @foreach ($menu['children'] as $child)
                                        <li class="{{ isActive($child['link'], [], $child['active_if'] ?? []) ? 'active' : '' }}">
                                            <a href="{{ $child['link'] }}">{{ $child['title'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <ul class="notika-main-menu-dropdown marquee">
                                    <li class="{{ isActive($child['link'], [], $child['active_if'] ?? []) ? 'active' : '' }}">
                                        <a class="" href="{{ $child['link'] }}">
                                            {!! implode('<span class="marquee-separator">..., </span>', $content) !!} </a>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Menu Area End -->
