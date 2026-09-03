<?php

namespace App\Http\Controllers;

use App\Models\ApplicationsHubPage;
use App\Models\Industry;
use App\Models\PrelubePage;
use Illuminate\View\View;

class ApplicationController extends Controller
{
    public function index(): View
    {
        $page = ApplicationsHubPage::current();
        $industries = Industry::published()->orderBy('order')->get();
        $prelubePage = PrelubePage::current();

        return view('applications.index', compact('page', 'industries', 'prelubePage'));
    }

    public function show(Industry $industry): View
    {
        // The source design's "Other Applications" cross-nav lists all 9 industries
        // on every industry page, including a self-link — preserved as-is here.
        $all = Industry::published()->orderBy('order')->get();

        return view('applications.show', ['industry' => $industry, 'all' => $all]);
    }
}
