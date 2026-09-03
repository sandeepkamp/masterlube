@extends('layouts.app')

@section('meta_title', $page->meta_title ?? 'Pre Lubrication System - MasterLube')
@section('meta_description', $page->meta_description ?? \App\Models\Setting::get('default_meta_description'))

@section('content')
    @php
        $benefit1Title = \App\Models\Setting::get('industry_benefit_1_title');
        $benefit2Title = \App\Models\Setting::get('industry_benefit_2_title');
        $others = \App\Models\Industry::published()->orderBy('order')->get();
    @endphp

    <section class="page-banner">
        <div class="container">
            <nav class="page-banner-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pre Lubrication System</li>
                </ol>
            </nav>
            <p class="page-banner-eyebrow">Pre Lubrication System</p>
            <h1 class="page-banner-title">Built for a Wide Range of Equipment</h1>
            <p class="page-banner-text">MasterLube systems are deployed across construction, agriculture, mining, transportation, and specialty equipment worldwide.</p>
        </div>
    </section>

    <section class="industry-applications-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-6 fw-bold mb-3">Pre Lubrication System</h2>
            </div>

            <div class="row align-items-center g-4 g-lg-5 mb-5">
                <div class="col-lg-5">
                    <div class="position-relative">
                        <div class="bg-light rounded-4 p-4 text-center">
                            <img src="{{ media_url($page->hero_image) }}" class="img-fluid" alt="Pre Lubrication System">
                        </div>
                        <div class="position-absolute bottom-0 start-0 translate-middle-y ms-3">
                            <div class="bg-dark text-white rounded-4 px-4 py-3 shadow">
                                <small class="d-block opacity-75">Built for</small>
                                <strong>Extreme Performance</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <p>{{ $page->caption }}</p>

                    <div class="row g-3 mt-3">
                        <div class="col-sm-6">
                            <div class="d-flex gap-3">
                                <div class="flex-shrink-0 bg-dark text-white rounded-3 p-2">
                                    <i class="bi {{ $page->benefit_1_icon }}"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ $benefit1Title }}</h6>
                                    <p class="small text-muted mb-0">{{ $page->benefit_1_text }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex gap-3">
                                <div class="flex-shrink-0 bg-dark text-white rounded-3 p-2">
                                    <i class="bi {{ $page->benefit_2_icon }}"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ $benefit2Title }}</h6>
                                    <p class="small text-muted mb-0">{{ $page->benefit_2_text }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="image-box">
                        <img src="{{ media_url($page->gallery_image_1) }}" alt="Pre Lubrication System">
                        <div class="image-overlay">
                            <h3>Pre Lubrication System</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="image-box">
                        <img src="{{ media_url($page->gallery_image_2) }}" alt="Pre Lubrication System">
                        <div class="image-overlay">
                            <h3>Pre Lubrication System</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <span class="text-uppercase small fw-bold text-secondary">Explore More</span>
                <h3 class="fw-bold mt-2 mb-4">Other Applications</h3>

                <div class="d-flex flex-wrap justify-content-center gap-2">
                    @foreach ($others as $item)
                        <a href="{{ route('applications.show', $item) }}" class="btn btn-outline-dark btn-sm rounded-pill px-3">{{ $item->nav_label ?? $item->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <x-ui.resource-pill-bar />
@endsection
