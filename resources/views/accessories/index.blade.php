@extends('layouts.app')

@section('meta_title', $page->meta_title ?? 'Staff - MasterLube')
@section('meta_description', $page->meta_description ?? \App\Models\Setting::get('default_meta_description'))

@section('content')
    <section class="page-banner">
        <div class="container">
            <nav class="page-banner-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Staff</li>
                </ol>
            </nav>
            <p class="page-banner-eyebrow">{{ $page->banner_eyebrow }}</p>
            <h1 class="page-banner-title">{{ $page->banner_title }}</h1>
            <p class="page-banner-text">{{ $page->banner_text }}</p>
        </div>
    </section>

    <section class="trade-tabs-section py-5">
        <div class="container">
            <x-ui.tabs :items="$accessories" id="tradeTab" />
        </div>
    </section>

    <x-ui.resource-pill-bar />
@endsection
