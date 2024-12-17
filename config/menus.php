<?php

return [
    'menus' => [
        [
            'title' => 'Home',
            'icon' => '<i class="bi bi-house"></i>', // Bootstrap home icon
            'link' => '/',
            'auth_visibility' => 'guest',
            // 'children' => [
            //     ['title' => 'Welcome to MoloneyStreetRe: A financial markets melting platform', 'link' => '#', 'auth_visibility' => 'guest'],

            // ],
        ],
        [
            'title' => 'Blog',
            'icon' => '<i class="bi bi-journal-text"></i>', // Bootstrap journal icon for blog
            'link' => '#',
            'auth_visibility' => 'all',
            'active_if' => ['/news/*', '/categories/*'],
            'children' => [
                ['title' => 'Latest News', 'link' => '/news/latest-news', 'auth_visibility' => 'all'],
                ['title' => 'Featured', 'link' => '/news/featured-news', 'auth_visibility' => 'all'],
                ['title' => 'Trending', 'link' => '/news/trending-news', 'auth_visibility' => 'all'],
                ['title' => 'Breaking News', 'link' => '/news/breaking-news', 'auth_visibility' => 'all'],
                ['title' => 'Popular News', 'link' => '/news/popular-news', 'auth_visibility' => 'all'],
                ['title' => 'News Categories', 'link' => '/news/categories', 'auth_visibility' => 'all'],
            ],
        ],
        [
            'title' => 'YouTube',
            'icon' => '<i class="bi bi-youtube"></i>', // Bootstrap YouTube icon
            'link' => '#',
            'auth_visibility' => 'all',
            'active_if' => ['/youtube/*'],
            'children' => [
                ['title' => 'Latest Videos', 'link' => '/youtube', 'auth_visibility' => 'all', 'active_if' => ['/youtube/video/*']],
                ['title' => 'Top Trending', 'link' => '/youtube/trending', 'auth_visibility' => 'all', 'active_if' => ['/youtube/trending/*']],
                ['title' => 'Playlists', 'link' => '/youtube/playlist', 'auth_visibility' => true, 'active_if' => ['/youtube/playlist/*']],
            ],
        ],
        [
            'title' => 'Portfolio',
            'icon' => '<i class="bi bi-briefcase"></i>', // Bootstrap briefcase icon
            'link' => '#',
            'auth_visibility' => true,
            'children' => [
                ['title' => 'Stock Portfolio', 'link' => '#', 'auth_visibility' => true],
                ['title' => 'Investment Summary', 'link' => '#', 'auth_visibility' => true],
            ],
        ],
        [
            'title' => 'About',
            'icon' => '<i class="bi bi-info-circle"></i>', // Bootstrap info-circle icon
            'link' => '#',
            'auth_visibility' => 'all',
            'children' => [
                ['title' => 'About Us', 'link' => '/about', 'auth_visibility' => 'all'],
                ['title' => 'Contacts', 'link' => '/contact-us', 'auth_visibility' => 'all'],
                ['title' => 'Our Team', 'link' => '/our-teams', 'auth_visibility' => 'all'],
            ],
        ],
        // Additional menus as needed
    ],
];
