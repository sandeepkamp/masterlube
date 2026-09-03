@extends('layouts.app')

@section('meta_title', 'Car Clubs - MasterLube')

@section('content')
    <section class="page-banner">
        <div class="container">
            <nav class="page-banner-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Carclub</li>
                </ol>
            </nav>
            <p class="page-banner-eyebrow">Carclub</p>
            <h1 class="page-banner-title">Built for a Wide Range of Equipment</h1>
            <p class="page-banner-text">MasterLube systems are deployed across construction, agriculture, mining, transportation, and specialty equipment worldwide.</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mt-2">Car Clubs</h2>
            </div>

            <div class="row g-4">
                @foreach ($events as $event)
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="club-tile js-club-tile" data-bs-toggle="collapse" data-bs-target="#event{{ $event->id }}" role="button">
                            <img src="{{ media_url($event->cover_image) }}" class="img-fluid" alt="{{ $event->title }}">
                            <div class="club-tile-overlay">
                                <h6>{{ $event->title }}</h6>
                                <span>View More</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @foreach ($events as $event)
                <div class="collapse mt-4 js-club-panel" id="event{{ $event->id }}">
                    <div class="club-tile-content p-4 p-lg-5">
                        @if ($event->description)
                            @foreach (preg_split('/\R\s*\R/', trim((string) $event->description)) as $paragraph)
                                @if (trim($paragraph) !== '')
                                    <p>{{ $paragraph }}</p>
                                @endif
                            @endforeach
                        @endif

                        <div class="row g-3">
                            @foreach ($event->photos as $photo)
                                <div class="col-6 col-md-3">
                                    <img src="{{ media_url($photo->image) }}" class="img-fluid rounded-3" alt="{{ $event->title }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <x-ui.resource-pill-bar />
@endsection
