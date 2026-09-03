@extends('layouts.app')

@section('meta_title', 'Magazines - MasterLube')

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
                <h2 class="fw-bold">Our Magazines</h2>
                <p class="text-muted">Click on a magazine to explore all pages.</p>
            </div>

            <div class="row g-4">
                @foreach ($magazines as $magazine)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="card border-0 shadow-sm h-100">
                            <img src="{{ media_url($magazine->cover_image) }}" class="card-img-top" alt="{{ $magazine->title }}">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $magazine->title }}</h5>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#magazine{{ $magazine->id }}">
                                    View Magazine
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @foreach ($magazines as $magazine)
        <div class="modal fade" id="magazine{{ $magazine->id }}" tabindex="-1">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $magazine->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            @foreach ($magazine->pages as $page)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                    <img src="{{ media_url($page->image) }}" class="img-fluid rounded shadow-sm w-100" alt="{{ $magazine->title }} page {{ $loop->iteration }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <x-ui.resource-pill-bar />
@endsection
