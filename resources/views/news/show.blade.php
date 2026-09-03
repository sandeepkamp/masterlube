@extends('layouts.app')

@section('meta_title', $item->title.' - MasterLube')
@section('meta_description', $item->excerpt)

@section('content')
    <section class="page-banner">
        <div class="container">
            <nav class="page-banner-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('new-stuff.index') }}">New Stuff</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $item->title }}</li>
                </ol>
            </nav>
            @if ($item->badge)
                <p class="page-banner-eyebrow">{{ $item->badge }}</p>
            @endif
            <h1 class="page-banner-title">{{ $item->title }}</h1>
        </div>
    </section>

    <section class="news-article py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    @if ($item->cover_image)
                        <img src="{{ media_url($item->cover_image) }}" alt="{{ $item->title }}" class="news-article-img mb-4">
                    @endif

                    @if ($item->published_at)
                        <p class="news-article-date mb-4">{{ $item->published_at->format('M j, Y') }}</p>
                    @endif

                    @if ($item->body)
                        <div class="news-article-body">
                            {!! nl2br(e($item->body)) !!}
                        </div>
                    @elseif ($item->excerpt)
                        <div class="news-article-body">
                            <p>{{ $item->excerpt }}</p>
                        </div>
                    @endif

                    <a href="{{ route('new-stuff.index') }}" class="news-article-back mt-4">
                        <i class="bi bi-arrow-left"></i> Back to New Stuff
                    </a>
                </div>
            </div>
        </div>
    </section>

    @if ($related->isNotEmpty())
        <section class="news-related py-5">
            <div class="container">
                <h2 class="news-related-heading mb-4">More From MasterLube</h2>
                <div class="row g-4">
                    @foreach ($related as $relatedItem)
                        <div class="col-md-4">
                            <x-ui.news-card :item="$relatedItem" />
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <x-ui.resource-pill-bar />
@endsection
