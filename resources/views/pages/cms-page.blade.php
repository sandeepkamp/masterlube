@extends('layouts.app')

@section('meta_title', $page->meta_title ?? ($page->title.' - MasterLube'))
@section('meta_description', $page->meta_description ?? \App\Models\Setting::get('default_meta_description'))

@section('content')
    <section class="page-banner">
        <div class="container">
            <nav class="page-banner-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
                </ol>
            </nav>
            <h1 class="page-banner-title">{{ $page->title }}</h1>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            @if ($page->body)
                <div class="cms-page-body">{!! $page->body !!}</div>
            @else
                <p class="text-muted">This page is currently being developed. Please check back soon, or contact us with any questions.</p>
            @endif
        </div>
    </section>

    <x-ui.resource-pill-bar />
@endsection
