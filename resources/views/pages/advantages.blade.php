@extends('layouts.app')

@section('meta_title', $page->meta_title ?? 'Our Advantages - MasterLube')
@section('meta_description', $page->meta_description ?? \App\Models\Setting::get('default_meta_description'))

@section('content')
    <section class="page-banner">
        <div class="container">
            <nav class="page-banner-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Our Advantages</li>
                </ol>
            </nav>
            <p class="page-banner-eyebrow">{{ $page->banner_eyebrow }}</p>
            <h1 class="page-banner-title">{{ $page->banner_title }}</h1>
            <p class="page-banner-text">{{ $page->intro_body }}</p>
        </div>
    </section>

    <section class="features py-5">
        <div class="container">
            <h2 class="features-heading text-center">{{ $page->features_heading }}</h2>
            <x-ui.feature-card-grid :items="$page->feature_grid ?? []" />
        </div>
    </section>

    <section class="testimonials py-5">
        <div class="container">
            <p class="testimonials-eyebrow">{{ $page->testimonials_eyebrow }}</p>
            <h2 class="testimonials-heading">{{ $page->testimonials_title }}</h2>

            <div class="row g-4 mt-3">
                @foreach ($testimonials as $testimonial)
                    <div class="col-md-4">
                        <x-ui.testimonial-card :testimonial="$testimonial" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-ui.resource-pill-bar />
@endsection
