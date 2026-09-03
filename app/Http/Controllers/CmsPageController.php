<?php

namespace App\Http\Controllers;

use App\Models\CmsPage;
use Illuminate\View\View;

class CmsPageController extends Controller
{
    public function show(CmsPage $cmsPage): View
    {
        abort_unless($cmsPage->status === 'published', 404);

        return view('pages.cms-page', ['page' => $cmsPage]);
    }
}
