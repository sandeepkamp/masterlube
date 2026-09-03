<?php

namespace App\Http\Controllers;

use App\Models\Install;
use App\Models\InstallPhoto;
use App\Models\Testimonial;
use Illuminate\View\View;

class InstallController extends Controller
{
    public function index(): View
    {
        $featuredPhotos = InstallPhoto::where('is_featured', true)->orderBy('order')->get();
        $featuredQuote = Testimonial::where('author_name', 'W. Gowsell')->first();

        $installs = Install::published()
            ->whereDoesntHave('photos', fn ($q) => $q->where('is_featured', true))
            ->with('photos')
            ->orderBy('order')
            ->get();

        return view('installs.index', compact('featuredPhotos', 'featuredQuote', 'installs'));
    }
}
