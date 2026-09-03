<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::published()->orderBy('order')->get();

        return view('testimonials.index', compact('testimonials'));
    }
}
