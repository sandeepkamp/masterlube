<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\Faq;
use App\Models\Industry;
use App\Models\News;
use App\Models\Testimonial;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $enquiryCounts = [
            'new' => Enquiry::where('status', 'new')->count(),
            'contacted' => Enquiry::where('status', 'contacted')->count(),
            'closed' => Enquiry::where('status', 'closed')->count(),
        ];

        $recentEnquiries = Enquiry::latest()->limit(5)->get();
        $draftIndustries = Industry::where('status', 'draft')->orderBy('order')->get();

        $moduleCounts = [
            'Industries' => Industry::count(),
            'Testimonials' => Testimonial::count(),
            'FAQs' => Faq::count(),
            'News' => News::count(),
        ];

        return view('admin.dashboard', compact('enquiryCounts', 'recentEnquiries', 'draftIndustries', 'moduleCounts'));
    }
}
