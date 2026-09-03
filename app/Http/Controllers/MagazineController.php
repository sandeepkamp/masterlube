<?php

namespace App\Http\Controllers;

use App\Models\Magazine;
use Illuminate\View\View;

class MagazineController extends Controller
{
    public function index(): View
    {
        $magazines = Magazine::published()->with('pages')->orderBy('order')->get();

        return view('magazines.index', compact('magazines'));
    }
}
