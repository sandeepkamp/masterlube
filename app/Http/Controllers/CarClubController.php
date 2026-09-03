<?php

namespace App\Http\Controllers;

use App\Models\CarClubEvent;
use Illuminate\View\View;

class CarClubController extends Controller
{
    public function index(): View
    {
        $events = CarClubEvent::published()->with('photos')->orderBy('order')->get();

        return view('carclubs.index', compact('events'));
    }
}
