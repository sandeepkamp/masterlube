@extends('layouts.app')

@section('meta_title', $page->meta_title ?? 'Systems - MasterLube')
@section('meta_description', $page->meta_description ?? \App\Models\Setting::get('default_meta_description'))

@section('content')
    <section class="page-banner">
        <div class="container">
            <nav class="page-banner-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">System</li>
                </ol>
            </nav>
            <p class="page-banner-eyebrow">System</p>
            <h1 class="page-banner-title">{{ $page->title }}</h1>
        </div>
    </section>

    <section class="masterlube-content py-5">
        <div class="container">
            <div class="row g-0 align-items-stretch">
                <div class="col-lg-6">
                    <div class="text-content">
                        @foreach (preg_split('/\R\s*\R/', trim((string) $page->description)) as $paragraph)
                            @if (trim($paragraph) !== '')
                                <p>{{ $paragraph }}</p>
                            @endif
                        @endforeach

                        <div class="row g-4 mt-4">
                            <div class="col-md-6">
                                <h5 class="fw-bold mb-3">MasterLube System includes:</h5>
                                <ul class="list-unstyled">
                                    @foreach ($page->includes_list ?? [] as $item)
                                        <li>{!! $item !!}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <h5 class="fw-bold mb-3">Options / Upgrades:</h5>
                                <ul class="list-unstyled">
                                    @foreach ($page->options_list ?? [] as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <img src="{{ media_url($page->image) }}" class="img-fluid" alt="{{ $page->title }}">
                </div>
            </div>
        </div>
    </section>

    @if (!empty($page->kits))
        <section class="trade-tabs-section py-5">
            <div class="container">
                <ul class="nav nav-pills justify-content-center gap-2 mb-5" id="tradeTab" role="tablist">
                    @foreach ($page->kits as $i => $kit)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $i === 0 ? 'active' : '' }}" data-bs-toggle="pill" data-bs-target="#tab-kit-{{ $i }}" type="button">
                                {{ $kit['label'] }}
                            </button>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content" id="tradeTabContent">
                    @foreach ($page->kits as $i => $kit)
                        <div class="tab-pane fade {{ $i === 0 ? 'show active' : '' }}" id="tab-kit-{{ $i }}">
                            <div class="row align-items-center g-5">
                                <div class="col-lg-6">
                                    <h2 class="fw-bold mt-2">{{ $kit['title'] }}</h2>
                                    <p class="text-muted">{{ $kit['text'] }}</p>

                                    @if (!empty($kit['contact_email']) || !empty($kit['contact_phone']))
                                        @if (!empty($kit['contact_email']))
                                            <p>Email: <a href="mailto:{{ $kit['contact_email'] }}">{{ $kit['contact_email'] }}</a></p>
                                        @endif
                                        @if (!empty($kit['contact_phone']))
                                            <p>Telephone: {{ $kit['contact_phone'] }}</p>
                                        @endif
                                    @endif
                                </div>

                                <div class="col-lg-6">
                                    <div class="tab-image">
                                        <img src="{{ media_url($kit['image']) }}" class="img-fluid" alt="{{ $kit['title'] }}">
                                        @foreach (($kit['extra_images'] ?? []) as $extraImage)
                                            <img src="{{ media_url($extraImage) }}" class="img-fluid" alt="{{ $kit['title'] }}">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <x-ui.resource-pill-bar />
@endsection
