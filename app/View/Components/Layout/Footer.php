<?php

namespace App\View\Components\Layout;

use App\Models\NavItem;
use App\Models\Setting;
use Illuminate\View\Component;
use Illuminate\View\View;

class Footer extends Component
{
    public function render(): View
    {
        $columns = [
            'products' => NavItem::where('menu', 'footer_products')->where('is_active', true)->orderBy('order')->get(),
            'company' => NavItem::where('menu', 'footer_company')->where('is_active', true)->orderBy('order')->get(),
            'connect' => NavItem::where('menu', 'footer_connect')->where('is_active', true)->orderBy('order')->get(),
        ];

        return view('components.layout.footer', [
            'columns' => $columns,
            'logoPath' => Setting::get('logo_path'),
            'footerText' => Setting::get('footer_text'),
            'phone' => Setting::get('company_phone'),
            'facebookUrl' => Setting::get('facebook_url'),
            'instagramUrl' => Setting::get('instagram_url'),
            'twitterUrl' => Setting::get('twitter_url'),
            'copyrightText' => Setting::get('copyright_text'),
        ]);
    }
}
