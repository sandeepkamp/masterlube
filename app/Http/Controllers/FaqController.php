<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\View\View;

class FaqController extends Controller
{
    private const CATEGORY_LABELS = [
        'masterlube' => "FAQ's for MasterLube Kits",
        'turbolube' => "FAQ's for TurboLube Kits",
        'quick_connect' => "FAQ's for TurboLube \"Quick\" Kits",
        'commercial' => "FAQ's for Commercial Kits",
    ];

    public function index(): View
    {
        $faqs = Faq::published()->category('general')->orderBy('order')->get();

        return view('faq.index', compact('faqs'));
    }

    public function category(string $category): View
    {
        $faqs = Faq::published()->category($category)->orderBy('order')->get();
        $title = self::CATEGORY_LABELS[$category];

        return view('faq.category', compact('faqs', 'title', 'category'));
    }
}
