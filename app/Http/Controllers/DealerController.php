<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use Illuminate\View\View;

class DealerController extends Controller
{
    public function index(): View
    {
        $dealers = Dealer::published()->orderBy('order')->get();

        return view('dealers.index', compact('dealers'));
    }
}
