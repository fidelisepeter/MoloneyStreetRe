<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class SiteHelper
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public static function getExcerpt($text, $length = 100)
    {
        return Str::limit($text, $length);
    }

    public function format_phone_number($phone)
    {
        $formatted_phone = preg_replace('/[^0-9]/', '', $phone);

        if (strlen($formatted_phone) == 10) {
            return sprintf(
                "(%s) %s-%s",
                substr($formatted_phone, 0, 3),
                substr($formatted_phone, 3, 3),
                substr($formatted_phone, 6)
            );
        }

        return $phone; // return original if it's not 10 digits
    }

    public function filterMenuForUser($menus, $isAuthenticated)
    {
        return array_filter($menus, function ($menu) use ($isAuthenticated) {
            // Check visibility for top-level item
            if (
                ($menu['auth_visibility'] === 'auth' && !$isAuthenticated) ||
                ($menu['auth_visibility'] === 'guest' && $isAuthenticated)
            ) {
                return false;
            }

            // If there are child items, filter them as well
            if (!empty($menu['children'])) {
                $menu['children'] = array_filter($menu['children'], function ($child) use ($isAuthenticated) {
                    return ($child['auth_visibility'] === 'all') ||
                        ($child['auth_visibility'] === 'auth' && $isAuthenticated) ||
                        ($child['auth_visibility'] === 'guest' && !$isAuthenticated);
                });
            }

            return true;
        });
    }
}