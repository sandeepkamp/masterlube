@extends('layouts.app')

@section('meta_title', $page->meta_title ?? 'Applications - MasterLube')
@section('meta_description', $page->meta_description ?? \App\Models\Setting::get('default_meta_description'))

@section('content')
    <section class="page-banner">
        <div class="container">
            <nav class="page-banner-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Applications</li>
                </ol>
            </nav>
            <p class="page-banner-eyebrow">{{ $page->banner_eyebrow }}</p>
            <h1 class="page-banner-title">{{ $page->banner_title }}</h1>
            <p class="page-banner-text">{{ $page->banner_text }}</p>
        </div>
    </section>

    <section class="applications-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">{{ $page->intro_title }}</h2>
                @if ($page->intro_body)
                    <p class="section-subtitle">{{ $page->intro_body }}</p>
                @endif
            </div>

            <div class="row g-4">
                @foreach ($industries as $industry)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="application-card">
                            <div class="application-image">
                                <img src="{{ media_url($industry->thumbnail_image ?? $industry->hero_image) }}" alt="{{ $industry->name }}" class="img-fluid">
                            </div>
                            <div class="application-content">
                                <a href="{{ route('applications.show', $industry) }}">{{ $industry->nav_label ?? $industry->name }}</a>
                            </div>
                        </div>
                    </div>

                    @if ($industry->slug === 'towvehicles')
                        {{-- Prelube System sits between Tow Vehicle and Aviation in the source hub grid. --}}
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="application-card">
                                <div class="application-image">
                                    <img src="{{ media_url($prelubePage->hero_image) }}" alt="Prelube System" class="img-fluid">
                                </div>
                                <div class="application-content">
                                    <a href="{{ route('prelube') }}">Prelube System</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <x-ui.resource-pill-bar />
@endsection
