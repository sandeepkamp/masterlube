<?php

namespace App\Http\Controllers;

use App\Models\ContactPage;
use Illuminate\View\View;

class ContactController extends Controller
{
    private const APPLICATION_TYPE_OPTIONS = [
        'Racing', 'Marine', 'Street Rod', 'Exotic', 'Collector', 'Motorcycle', 'Classic',
        'Stock', 'Antiques', 'Commercial', 'Tow Vehicles', 'Aviation', 'Performance', 'Industrial',
    ];

    private const HEAR_ABOUT_US_OPTIONS = [
        'Racing', 'Marine', 'Street Rod', 'Stock', 'Antiques', 'Commercial',
    ];

    public function show(): View
    {
        $page = ContactPage::current();

        return view('pages.contact', [
            'page' => $page,
            'applicationTypeOptions' => collect(self::APPLICATION_TYPE_OPTIONS),
            'hearAboutUsOptions' => collect(self::HEAR_ABOUT_US_OPTIONS),
        ]);
    }
}
