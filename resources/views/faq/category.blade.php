@extends('layouts.app')

@section('meta_title', $title.' - MasterLube')

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
            <h1 class="page-banner-title">{{ $title }}</h1>
        </div>
    </section>

    <section class="faq-page py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @if ($faqs->isEmpty())
                        <div class="info-section text-center">
                            <p>We are in the process of developing answers to specific electronic applications. Meanwhile please refer to the Questions/Answers page. If you have any additional questions about how the MasterLube System is used for this application, please contact us, either by email or by telephone.</p>
                            <p>Email: <a href="mailto:{{ \App\Models\Setting::get('company_email_tech') }}">{{ \App\Models\Setting::get('company_email_tech') }}</a></p>
                            <p>Telephone: {{ \App\Models\Setting::get('company_phone') }}</p>
                        </div>
                    @else
                        <x-ui.accordion :items="$faqs" light :id="'faqAccordion-'.$category" />
                    @endif
                </div>
            </div>
        </div>
    </section>

    <x-ui.resource-pill-bar />
@endsection
