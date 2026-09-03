<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use App\Models\AdvantagesPage;
use App\Models\Faq;
use App\Models\HomePage;
use App\Models\LandingPage;
use App\Models\NavItem;
use App\Models\News;
use App\Models\PrelubePage;
use App\Models\SystemsPage;
use App\Models\Testimonial;
use Illuminate\View\View;

class PageController extends Controller
{
    public function landing(): View
    {
        $page = LandingPage::current();
        $testimonials = Testimonial::published()->featured()->orderBy('order')->limit(3)->get();
        $footerColumns = [
            'products' => NavItem::where('menu', 'footer_products')->where('is_active', true)->orderBy('order')->get(),
            'company' => NavItem::where('menu', 'footer_company')->where('is_active', true)->orderBy('order')->get(),
        ];

        return view('pages.landing', compact('page', 'testimonials', 'footerColumns'));
    }

    public function home(): View
    {
        $page = HomePage::current();
        $news = News::published()->orderByDesc('published_at')->limit(3)->get();
        $faqs = Faq::published()->category('general')->orderBy('order')->limit(5)->get();
        $testimonials = Testimonial::published()->featured()->orderBy('order')->limit(3)->get();

        return view('pages.home', compact('page', 'news', 'faqs', 'testimonials'));
    }

    public function about(): View
    {
        $page = AboutPage::current();

        return view('pages.about', compact('page'));
    }

    public function systems(): View
    {
        $page = SystemsPage::current();

        return view('pages.systems', compact('page'));
    }

    public function advantages(): View
    {
        $page = AdvantagesPage::current();
        $testimonials = Testimonial::published()->featured()->orderBy('order')->limit(3)->get();

        return view('pages.advantages', compact('page', 'testimonials'));
    }

    public function prelube(): View
    {
        $page = PrelubePage::current();

        return view('pages.prelube', compact('page'));
    }
}
