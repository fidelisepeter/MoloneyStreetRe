<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            ['key' => 'title', 'value' => 'MoloneyStreetRe'],
            ['key' => 'site_name', 'value' => 'MoloneyStreetRe'],
            ['key' => 'site_description', 'value' => ''],
            ['key' => 'keywords', 'value' => ''],
            ['key' => 'site_favicon', 'value' => 'img/favicon.ico'],
            ['key' => 'msvalidate', 'value' => ''],
            ['key' => 'google-site-verification', 'value' => ''],
            ['key' => 'google-signin-client_id', 'value' => ''],
            ['key' => 'theme_color', 'value' => '#000000'],
            ['key' => 'application_name', 'value' => 'MoloneyStreetRe'],
            ['key' => 'favicon', 'value' => 'img/favicon.ico'],
            ['key' => 'apple_mobile_web_app_title', 'value' => 'MoloneyStreetRe'],
            ['key' => 'apple_touch_icon', 'value' => 'img/favicon.ico'],
            ['key' => 'msapplication_tile_color', 'value' => '#91142f'],
            ['key' => 'msapplication_tile_image', 'value' => 'img/favicon.ico'],
            ['key' => 'facebook_url', 'value' => ''],
            ['key' => 'twitter_url', 'value' => ''],
            ['key' => 'site_logo', 'value' => '/assets/img/logo.png'],
            ['key' => 'youtube_api_key', 'value' => env('YOUTUBE_API_KEY')],
            ['key' => 'youtube_channel_id', 'value' => env('YOUTUBE_CHANNEL_ID')],
        ];

        foreach ($settings as $setting) {
            DB::table('settings')->updateOrInsert(['key' => $setting['key']], $setting);
        }
    }
}
