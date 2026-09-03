@extends('layouts.app')

@section('meta_title', 'Dealers - MasterLube')

@section('content')
    <section class="page-banner">
        <div class="container">
            <nav class="page-banner-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Links</li>
                </ol>
            </nav>
            <p class="page-banner-eyebrow">Links</p>
            <h1 class="page-banner-title">Built for a Wide Range of Equipment</h1>
            <p class="page-banner-text">MasterLube systems are deployed across construction, agriculture, mining, transportation, and specialty equipment worldwide.</p>
        </div>
    </section>

    <section class="applications-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Dealers</h2>
            </div>

            <div class="row g-4">
                @foreach ($dealers as $dealer)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="application-card">
                            <div class="application-image">
                                <img src="{{ media_url($dealer->image) }}" alt="{{ $dealer->name }}" class="img-fluid">
                            </div>
                            <div class="application-content">
                                <a href="{{ $dealer->url }}" target="_blank" rel="noopener">View</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-ui.resource-pill-bar />
@endsection
