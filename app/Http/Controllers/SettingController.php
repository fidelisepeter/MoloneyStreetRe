<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $settings = [
            'title' => setting()->get('title', 'MoloneyStreetRe'),
            'keywords' => setting()->get('keywords', 'Free HTML Templates'),
            'description' => setting()->get('description', 'Free HTML Templates'),
            'site_name' => setting()->get('site_name', 'MoloneyStreetRe'),
            'site_favicon' => setting()->get('site_favicon', 'img/favicon.ico'),
            'msvalidate' => setting()->get('msvalidate'),
            'google_site_verification' => setting()->get('google-site-verification'),
            'google_signin_client_id' => setting()->get('google-signin-client_id'),
            'theme_color' => setting()->get('theme_color', '#000000'),
            'application_name' => setting()->get('application_name', 'MoloneyStreetRe'),
            'favicon' => setting()->get('favicon', 'img/favicon.ico'),
            'apple_mobile_web_app_title' => setting()->get('apple_mobile_web_app_title', 'MoloneyStreetRe'),
            'apple_touch_icon' => setting()->get('apple_touch_icon', 'img/favicon.ico'),
            'msapplication_tile_color' => setting()->get('msapplication_tile_color', '#91142f'),
            'msapplication_tile_image' => setting()->get('msapplication_tile_image', 'img/favicon.ico'),
            'facebook_url' => setting()->get('facebook_url'),
            'twitter_url' => setting()->get('twitter_url'),
            'site_logo' => setting()->get('site_logo', 'img/favicon.ico')
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
