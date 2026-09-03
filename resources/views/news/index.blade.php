@extends('layouts.app')

@section('meta_title', 'New Stuff - MasterLube')

@section('content')
    <section class="page-banner">
        <div class="container">
            <nav class="page-banner-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">New Stuff</li>
                </ol>
            </nav>
            <p class="page-banner-eyebrow">What's New</p>
            <h1 class="page-banner-title">The Latest from MasterLube</h1>
        </div>
    </section>

    <section class="news py-5">
        <div class="container">
            <div class="row g-4">
                @foreach ($items as $item)
                    <div class="col-md-4">
                        <x-ui.news-card :item="$item" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-ui.resource-pill-bar />
@endsection
