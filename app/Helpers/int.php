<?php

use Illuminate\Support\Facades\Auth;


if (!function_exists('setting')) {
    /**
     * Get the instance of setting helper
     *
     * @return \App\Helpers\SettingsHelper
     */
    function setting()
    {
        return app(\App\Helpers\SettingsHelper::class);
    }
}

if (!function_exists('site')) {
    /**
     * Get the instance of site helper
     *
     * @return \App\Helpers\SiteHelper
     */
    function site()
    {
        return app(\App\Helpers\SiteHelper::class);
    }
}