@extends('layouts.app')

@section('meta_title', 'Questions/Answers - MasterLube')

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
            <h1 class="page-banner-title">Have Questions About MasterLube?</h1>
            <p class="page-banner-text">Answers to the questions we hear most from equipment owners and operators.</p>
        </div>
    </section>

    <section class="faq-page py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <x-ui.accordion :items="$faqs" light id="faqAccordion" />
                </div>
            </div>
        </div>
    </section>

    <x-ui.resource-pill-bar />
@endsection
