@extends('layouts.app')

@section('meta_title', 'Customer Installations - MasterLube')

@section('content')
    <section class="page-banner">
        <div class="container">
            <nav class="page-banner-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                </ol>
            </nav>
            <p class="page-banner-eyebrow">Questions</p>
            <h1 class="page-banner-title">Have Questions?</h1>
            <p class="page-banner-text">Answers to the questions we hear most from equipment owners and operators.</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Customer Pictures, Applications and Feedback</h2>
                <p class="text-muted">
                    If you would like your application featured on this page please send us a CD with high resolution pictures including comments regarding the installation so that we can add them to the website. If you have any questions, please contact us, either by email or by telephone. Check out the installs on the side bar to the right and below.<br>
                    @if ($featuredQuote)
                        &quot;{{ $featuredQuote->quote }}&quot; - {{ $featuredQuote->author_name }}
                    @endif
                </p>
            </div>

            <div class="row g-4">
                @foreach ($featuredPhotos as $photo)
                    <div class="col-lg-3 col-md-6 col-12">
                        <img src="{{ media_url($photo->image) }}" class="img-fluid rounded shadow-sm w-100" alt="Customer feedback">
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Customer Installations</h2>
                <p class="text-muted">Click on tab to see photos of the System installed in customer's vehicles.</p>
            </div>

            <ul class="nav nav-pills justify-content-center gap-2 mb-4" id="galleryTabs" role="tablist">
                @foreach ($installs as $i => $install)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $i === 0 ? 'active' : '' }}" data-bs-toggle="pill" data-bs-target="#tab{{ $install->id }}" type="button">
                            {{ $install->title }}
                        </button>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content">
                @foreach ($installs as $i => $install)
                    <div class="tab-pane fade {{ $i === 0 ? 'show active' : '' }}" id="tab{{ $install->id }}">
                        @if ($install->caption)
                            <p class="text-muted text-center">{{ $install->caption }}</p>
                        @endif
                        <div class="row g-4">
                            @foreach ($install->photos as $photo)
                                <div class="col-lg-3 col-md-6 col-12">
                                    <img src="{{ media_url($photo->image) }}" class="img-fluid w-100 rounded shadow-sm" alt="{{ $install->title }}">
                                    @if ($photo->caption)
                                        <p class="small text-muted mt-2">{{ $photo->caption }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-ui.resource-pill-bar />
@endsection
