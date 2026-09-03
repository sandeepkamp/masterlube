@extends('layouts.app')

@section('meta_title', $page->meta_title ?? 'About Us - MasterLube')
@section('meta_description', $page->meta_description ?? \App\Models\Setting::get('default_meta_description'))

@section('content')
    <section class="page-banner">
        <div class="container">
            <nav class="page-banner-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About</li>
                </ol>
            </nav>
            <p class="page-banner-eyebrow">About Us</p>
            <h1 class="page-banner-title">Our Story</h1>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            @foreach (preg_split('/\R\s*\R/', trim((string) $page->story_body)) as $paragraph)
                @if (trim($paragraph) !== '')
                    <p>{{ $paragraph }}</p>
                @endif
            @endforeach
        </div>
    </section>

    <section class="features py-5">
        <div class="container">
            <h2 class="features-heading text-center">What Drives Us</h2>
            <x-ui.feature-card-grid :items="$page->drives_us_grid ?? []" />
        </div>
    </section>

    <x-ui.resource-pill-bar />
@endsection
