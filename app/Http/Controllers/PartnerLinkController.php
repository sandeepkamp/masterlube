<?php

namespace App\Http\Controllers;

use App\Models\PartnerLink;
use Illuminate\View\View;

class PartnerLinkController extends Controller
{
    public function index(): View
    {
        $links = PartnerLink::published()->orderBy('order')->get();

        return view('links.index', compact('links'));
    }
}
