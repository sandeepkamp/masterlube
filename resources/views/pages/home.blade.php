@extends('layouts.app')

@section('meta_title', $page->meta_title ?? \App\Models\Setting::get('default_meta_title'))
@section('meta_description', $page->meta_description ?? \App\Models\Setting::get('default_meta_description'))

@section('content')
    <section class="hero">
        <div class="row g-0 min-vh-hero">
            <div class="col-lg-6 hero-panel d-flex align-items-center">
                <div class="hero-content">
                    <p class="hero-eyebrow">{{ $page->hero_eyebrow }}</p>
                    <h1 class="hero-heading">{{ $page->hero_title }}</h1>
                    <p class="hero-text">{{ $page->hero_text }}</p>
                    <a href="{{ route('systems') }}" class="btn btn-outline-light btn-lg hero-cta">Learn More</a>
                </div>
            </div>
            <div class="col-lg-6 hero-image-panel">
                <img src="{{ media_url($page->hero_image) }}" alt="MasterLube automatic lubrication system components" class="hero-image">
            </div>
        </div>
    </section>

    <section class="features py-5">
        <div class="container">
            <h2 class="features-heading text-center">{{ $page->features_title }}</h2>
            <x-ui.feature-card-grid :items="$page->feature_grid ?? []" />
        </div>
    </section>

    <section class="systems py-5">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-3">
                    <p class="systems-eyebrow">{{ $page->systems_eyebrow }}</p>
                    <h2 class="systems-heading">{{ $page->systems_title }}</h2>
                    <p class="systems-text">{{ $page->systems_text }}</p>
                    <a href="{{ route('systems') }}" class="btn btn-navy-pill">View All Systems</a>
                </div>

                <div class="col-lg-9">
                    <div class="row gy-4">
                        @foreach ($page->systems_grid ?? [] as $system)
                            <div class="col-md-6 col-lg-3">
                                <div class="system-card h-100">
                                    <div class="system-card-img">
                                        <img src="{{ media_url($system['image']) }}" alt="{{ $system['title'] }}">
                                    </div>
                                    <span class="system-number">{{ $system['number'] }}</span>
                                    <h3 class="system-title">{{ $system['title'] }}</h3>
                                    <p class="system-text">{{ $system['text'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="applications py-5">
        <div class="container">
            <p class="applications-eyebrow text-center">{{ $page->applications_eyebrow }}</p>
            <h2 class="applications-heading text-center">{{ $page->applications_title }}</h2>

            <div class="row g-4 mt-3">
                @foreach ($page->applications_grid ?? [] as $item)
                    <div class="col-6 col-lg-3">
                        <div class="app-card">
                            <img src="{{ media_url($item['image']) }}" alt="{{ str_replace("\n", ' ', $item['label']) }}" class="app-card-img">
                            <div class="app-card-overlay"></div>
                            <span class="app-card-label">{!! nl2br(e($item['label'])) !!}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('applications.index') }}" class="btn btn-outline-navy-pill">
                    Explore Applications <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <section class="advantages py-5">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-6">
                    <div class="advantages-img-wrap">
                        <img src="{{ media_url($page->hero_image) }}" alt="MasterLube automatic lubrication system components" class="advantages-img">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="advantages-content">
                        <p class="advantages-eyebrow">{{ $page->why_choose_eyebrow }}</p>
                        <h2 class="advantages-heading">{{ $page->why_choose_title }}</h2>

                        @foreach ($page->why_choose_grid ?? [] as $item)
                            <div class="advantage-item d-flex">
                                <div class="advantage-icon flex-shrink-0">
                                    <i class="bi {{ $item['icon'] }}"></i>
                                </div>
                                <div class="advantage-body">
                                    <h3 class="advantage-title">{{ $item['title'] }}</h3>
                                    <p class="advantage-text">{{ $item['text'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="news py-5">
        <div class="container">
            <p class="news-eyebrow">{{ $page->news_eyebrow }}</p>
            <h2 class="news-heading">{{ $page->news_title }}</h2>

            <div class="row g-4 mt-3">
                <div class="col-lg-8">
                    <div class="row g-4">
                        @foreach ($news as $item)
                            <div class="col-md-4">
                                <x-ui.news-card :item="$item" />
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="news-cta h-100">
                        <h3 class="news-cta-title">{{ $page->news_cta_title }}</h3>
                        <p class="news-cta-text">{{ $page->news_cta_text }}</p>
                        <a href="{{ route('custom-house.show') }}" class="btn btn-outline-light news-cta-btn">Explore Custom Hose <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faq-clubs py-5">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-6">
                    <p class="faq-eyebrow">{{ $page->faq_eyebrow }}</p>
                    <h2 class="faq-heading">{{ $page->faq_title }}</h2>

                    <x-ui.accordion :items="$faqs" id="faqAccordion" class="mt-4" />

                    <a href="{{ route('faq.index') }}" class="faq-view-all mt-4 d-inline-block">View All Questions <i class="bi bi-arrow-right"></i></a>
                </div>

                <div class="col-lg-6">
                    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3">
                        <div>
                            <p class="faq-eyebrow">{{ $page->car_clubs_eyebrow }}</p>
                            <h2 class="clubs-heading">{{ $page->car_clubs_title }}</h2>
                        </div>
                        <a href="#" class="btn btn-outline-light clubs-btn">Explore Car Clubs <i class="bi bi-arrow-right"></i></a>
                    </div>

                    <p class="clubs-text">{{ $page->car_clubs_text }}</p>

                    <div class="clubs-img-wrap">
                        <img src="{{ media_url($page->car_clubs_image) }}" alt="MasterLube for car clubs" class="clubs-img">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact py-5">
        <div class="container">
            <div class="row gy-5 align-items-start">
                <div class="col-lg-5">
                    <h2 class="contact-heading">{{ $page->contact_heading }}</h2>
                    <p class="contact-text">{{ $page->contact_text }}</p>

                    <div class="contact-info d-flex align-items-center">
                        <i class="bi bi-telephone"></i>
                        <span>{{ \App\Models\Setting::get('company_phone') }}</span>
                    </div>
                    <div class="contact-info d-flex align-items-center">
                        <i class="bi bi-envelope"></i>
                        <span>{{ \App\Models\Setting::get('company_email_orders') }}</span>
                    </div>
                </div>

                <div class="col-lg-7">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form class="contact-form" method="POST" action="{{ route('enquiries.quick.store') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control contact-input" placeholder="Name" value="{{ old('name') }}" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="company" class="form-control contact-input" placeholder="Company" value="{{ old('company') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control contact-input" placeholder="Email" value="{{ old('email') }}" required>
                            </div>
                            <div class="col-md-6">
                                <input type="tel" name="phone" class="form-control contact-input" placeholder="Phone" value="{{ old('phone') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="equipment_type" class="form-control contact-input" placeholder="Equipment Type" value="{{ old('equipment_type') }}">
                            </div>
                            <div class="col-12">
                                <textarea name="message" class="form-control contact-input contact-textarea" placeholder="Message" rows="5">{{ old('message') }}</textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-light contact-submit">Submit Request</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials py-5">
        <div class="container">
            <p class="testimonials-eyebrow">{{ $page->testimonials_eyebrow }}</p>
            <h2 class="testimonials-heading">{{ $page->testimonials_title }}</h2>

            <div class="row g-4 mt-3">
                @foreach ($testimonials as $testimonial)
                    <div class="col-md-4">
                        <x-ui.testimonial-card :testimonial="$testimonial" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-ui.resource-pill-bar />
@endsection
