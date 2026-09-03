@extends('layouts.app')

@section('meta_title', 'Testimonials - MasterLube')

@section('content')
    <section class="page-banner">
        <div class="container">
            <nav class="page-banner-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Testimonials</li>
                </ol>
            </nav>
            <p class="page-banner-eyebrow">Customer Stories</p>
            <h1 class="page-banner-title">Trusted by Equipment Owners &amp; Professionals</h1>
            <p class="page-banner-text">Hear from fleet managers, contractors, and operators who rely on MasterLube systems every day.</p>
        </div>
    </section>

    <section class="testimonials py-5">
        <div class="container">
            <div class="row g-4">
                @foreach ($testimonials as $testimonial)
                    <div class="col-md-6 col-lg-4">
                        <x-ui.testimonial-card :testimonial="$testimonial" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-ui.resource-pill-bar />
@endsection
