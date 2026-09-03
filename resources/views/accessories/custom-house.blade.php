@extends('layouts.app')

@section('meta_title', $page->meta_title ?? 'Custom Hose - MasterLube')
@section('meta_description', $page->meta_description ?? \App\Models\Setting::get('default_meta_description'))

@section('content')
    <section class="page-banner">
        <div class="container">
            <nav class="page-banner-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                </ol>
            </nav>
            <p class="page-banner-eyebrow">{{ $page->banner_eyebrow }}</p>
            <h1 class="page-banner-title">{{ $page->banner_title }}</h1>
            <p class="page-banner-text">{{ $page->banner_text }}</p>
        </div>
    </section>

    @if ($featured)
        <section class="info-section py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9 text-center">
                        <h2 class="info-title mb-3">{{ $featured->name }}</h2>
                        <p class="info-text mb-0">{{ $featured->description }}</p>
                        <img src="{{ media_url($featured->image) }}" class="img-fluid" alt="{{ $featured->name }}">
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="trade-tabs-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">{{ $page->other_stuff_heading }}</h2>
            </div>
            <x-ui.tabs :items="$others" id="otherStuffTab" />
        </div>
    </section>

    <x-ui.resource-pill-bar />
@endsection
