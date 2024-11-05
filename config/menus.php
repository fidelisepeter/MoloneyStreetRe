<?php

return [
    'menus' => [
        [
            'title' => 'Home',
            'icon' => '<i class="bi bi-house"></i>', // Bootstrap home icon
            'link' => url('/'),
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
            'children' => [
                ['title' => 'Latest Posts', 'link' => '#', 'auth_visibility' => 'all'],
                ['title' => 'Trending', 'link' => '#', 'auth_visibility' => 'all'],
                ['title' => 'Archives', 'link' => '#', 'auth_visibility' => 'all'],
            ],
        ],
        [
            'title' => 'YouTube',
            'icon' => '<i class="bi bi-youtube"></i>', // Bootstrap YouTube icon
            'link' => '#',
            'auth_visibility' => 'all',
            'children' => [
                ['title' => 'Latest Videos', 'link' => '#', 'auth_visibility' => 'all'],
                ['title' => 'Top Trending', 'link' => '#', 'auth_visibility' => 'all'],
                ['title' => 'Playlists', 'link' => '#', 'auth_visibility' => true],
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
                ['title' => 'About Us', 'link' => '#', 'auth_visibility' => 'all'],
                ['title' => 'Contact', 'link' => '#', 'auth_visibility' => 'all'],
                ['title' => 'Our Team', 'link' => '#', 'auth_visibility' => 'all'],
            ],
        ],
        // Additional menus as needed
    ],
];