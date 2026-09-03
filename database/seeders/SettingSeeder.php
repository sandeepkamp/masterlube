<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            'company_name' => 'MasterLube',
            'company_phone' => '1-970-867-5154',
            'company_email_orders' => 'info@masterlube.net',
            'company_email_tech' => 'info@masterlube.net',
            'company_email_dealer' => 'info@masterlube.net',
            'facebook_url' => '#',
            'instagram_url' => '#',
            'twitter_url' => '#',
            'youtube_url' => '#',
            'logo_path' => 'site/logo.png',
            'footer_text' => 'MasterLube designs and manufactures automatic lubrication systems trusted across racing, marine, and commercial fleets worldwide.',
            'copyright_text' => '© 2026 MasterLube — All Rights Reserved',
            'default_meta_title' => 'MasterLube - Automatic Lubrication Systems',
            'default_meta_description' => 'MasterLube designs automatic and lifetime lubrication systems and custom braided hose for racing, marine, commercial, and specialty vehicles.',
            'industry_benefit_1_title' => 'Engine Protection',
            'industry_benefit_1_text' => 'Continuous lubrication reduces friction and wear on critical engine components.',
            'industry_benefit_2_title' => 'Stable Oil Pressure',
            'industry_benefit_2_text' => 'Maintains consistent oil pressure even under extreme operating conditions.',
        ];

        foreach ($defaults as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value, 'type' => 'text']);
        }
    }
}
