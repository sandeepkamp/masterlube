<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\AccessoriesPage;
use App\Models\CustomHosePage;
use Illuminate\View\View;

class AccessoryController extends Controller
{
    public function index(): View
    {
        $page = AccessoriesPage::current();
        $accessories = Accessory::published()->orderBy('order')->get();

        return view('accessories.index', compact('page', 'accessories'));
    }

    public function customHouse(): View
    {
        $page = CustomHosePage::current();
        $featured = Accessory::published()->where('is_featured_on_custom_hose', true)->first();
        $others = Accessory::published()->where('is_featured_on_custom_hose', false)->orderBy('order')->get();

        return view('accessories.custom-house', compact('page', 'featured', 'others'));
    }
}
