@extends('layouts.landing')

@section('meta_title', $page->meta_title ?? 'MasterLube - Industrial Lubrication Systems')
@section('meta_description', $page->meta_description ?? \App\Models\Setting::get('default_meta_description'))

@section('content')
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center gy-5 py-5">
                <div class="col-12 col-lg-6 order-2 order-lg-1">
                    <h1 class="hero-title">
                        @foreach (preg_split('/\r\n|\r|\n/', $page->hero_title) as $line)
                            <span @class(['hero-title-highlight' => !$loop->first])>{{ $line }}</span>@if (!$loop->last)<br>@endif
                        @endforeach
                    </h1>
                    <p class="hero-text">
                        @foreach (preg_split('/\r\n\r\n|\n\n/', trim($page->hero_text)) as $heroParagraph)
                            @if (preg_match('/^([^:]{1,60}:)\s*(.*)$/s', trim($heroParagraph), $heroTextParts))
                                <span class="d-block mb-2"><strong class="hero-text-lead">{{ $heroTextParts[1] }}</strong> {{ $heroTextParts[2] }}</span>
                            @else
                                <span class="d-block mb-2">{{ trim($heroParagraph) }}</span>
                            @endif
                        @endforeach
                    </p>
                    @if (!empty($page->hero_bullets))
                        @php $heroBulletHalf = (int) ceil(count($page->hero_bullets) / 2); @endphp
                        <div class="hero-applications-card">
                            <p class="hero-applications-eyebrow">Popular Applications</p>
                            <div class="row gx-4">
                                <div class="col-6">
                                    <ul class="hero-bullet-list">
                                        @foreach (array_slice($page->hero_bullets, 0, $heroBulletHalf) as $bullet)
                                            <li>{{ $bullet }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul class="hero-bullet-list">
                                        @foreach (array_slice($page->hero_bullets, $heroBulletHalf) as $bullet)
                                            <li>{{ $bullet }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="d-flex flex-wrap gap-3 mb-5">
                        <a href="{{ route('home') }}" class="btn btn-hero-primary btn-lg">
                            {{ $page->hero_cta_primary_text }} <i class="bi bi-arrow-right"></i>
                        </a>
                        <a href="{{ route('applications.index') }}" class="btn btn-hero-outline btn-lg">{{ $page->hero_cta_secondary_text }}</a>
                    </div>
                    <div class="d-flex flex-wrap gap-5">
                        <div class="stat-block">
                            <div class="stat-number">{{ $page->stat_1_number }} <span class="stat-label">{{ $page->stat_1_label }}</span></div>
                            <div class="stat-caption">{{ $page->stat_1_caption }}</div>
                        </div>
                        <div class="stat-block">
                            <div class="stat-number">{{ $page->stat_2_number }} <span class="stat-label">{{ $page->stat_2_label }}</span></div>
                            <div class="stat-caption">{{ $page->stat_2_caption }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 order-1 order-lg-2">
                    <div class="showcase-panel">
                        <h2 class="showcase-title">{{ $page->showcase_title }}</h2>
                        <p class="showcase-tagline">&ldquo;{{ $page->showcase_tagline }}&rdquo;</p>

                        <div class="showcase-grid">
                            @foreach (($page->showcase_grid ?? []) as $i => $item)
                                <a href="{{ route('applications.show', $item['industry_slug']) }}" class="showcase-item" data-category="{{ $item['label'] }}">
                                    <img src="{{ media_url($item['image']) }}" alt="{{ $item['label'] }}">
                                    <span class="showcase-label">{{ $item['label'] }}@if (!empty($item['sublabel']))<br><small>{{ $item['sublabel'] }}</small>@endif</span>
                                </a>

                                {{-- @if ($i === 3)
                                    <div class="showcase-badge">
                                        <img src="{{ media_url('landing/lifetime-guarantee.gif') }}" alt="Lifetime Guarantee">
                                    </div>
                                @endif --}}
                            @endforeach
                        </div>

                        <p class="showcase-cta">{{ $page->showcase_cta_text }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="solutions-section">
        <div class="container">
            <p class="section-eyebrow">{{ $page->solutions_eyebrow }}</p>
            <h2 class="section-title">{{ $page->solutions_title }}</h2>
            <p class="section-subtitle">{{ $page->solutions_subtitle }}</p>

            <div class="row g-4 mt-2">
                @foreach (($page->solutions_grid ?? []) as $item)
                    <div class="col-12 col-md-4">
                        <div class="card product-card h-100">
                            <img src="{{ media_url($item['image']) }}" class="card-img-top" alt="{{ $item['title'] }}">
                            <div class="card-body d-flex flex-column">
                                <span class="product-badge">{{ $item['badge'] }}</span>
                                <h3 class="product-title">{{ $item['title'] }}</h3>
                                <p class="product-text">{{ $item['text'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="testimonials-section" id="testimonials">
        <div class="container">
            <p class="section-eyebrow eyebrow-gray">{{ $page->testimonials_eyebrow }}</p>
            <h2 class="section-title">{!! nl2br(e($page->testimonials_title)) !!}</h2>

            <div class="row g-4 mt-2">
                @foreach ($testimonials as $testimonial)
                    <div class="col-12 col-md-4">
                        <div class="testimonial-card h-100">
                            <i class="bi bi-quote quote-icon"></i>
                            <p class="testimonial-text">"{{ $testimonial->quote }}"</p>
                            <p class="testimonial-author">— {{ $testimonial->author_name }}</p>
                            @if ($testimonial->author_role)
                                <p class="testimonial-role">{{ $testimonial->author_role }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <hr class="testimonials-divider">

            <p class="trust-label">{{ $page->trust_label }}</p>

            <div class="d-flex flex-wrap justify-content-center gap-3">
                @foreach (($page->trust_pills ?? []) as $pill)
                    <span class="trust-pill"><i class="bi bi-x-circle"></i> {{ $pill }}</span>
                @endforeach
            </div>
        </div>
    </section>

    <section class="cta-section" style="background-image: linear-gradient(rgba(10, 20, 45, -0.45), rgba(10, 20, 45, -0.28)), url('{{ media_url('landing/cta-section (1).png') }}');">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-7">
                    <p class="section-eyebrow eyebrow-gold">{{ $page->cta_eyebrow }}</p>
                    <h2 class="cta-title">{!! nl2br(e($page->cta_title)) !!}</h2>
                    <p class="cta-text">{{ $page->cta_text }}</p>
                </div>
                <div class="col-lg-5">
                    <div class="d-flex flex-wrap justify-content-lg-end gap-3">
                        <a href="{{ route('contact.show') }}" class="btn btn-brand">{{ $page->cta_primary_text }} <i class="bi bi-arrow-right"></i></a>
                        <a href="{{ route('systems') }}" class="btn btn-hero-outline">{{ $page->cta_secondary_text }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="site-footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-lg-4">
                    <img src="{{ media_url(\App\Models\Setting::get('logo_path')) }}" alt="MasterLube" class="brand-logo mb-3">
                    <p class="footer-text">{{ $page->footer_text }}</p>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach (($page->footer_badges ?? []) as $badge)
                            <span class="footer-badge">{{ $badge }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="col-6 col-lg-2 offset-lg-1">
                    <h4 class="footer-heading">PRODUCTS</h4>
                    <ul class="footer-links">
                        @foreach ($footerColumns['products'] as $link)
                            <li><a href="{{ $link->resolvedUrl() }}">{{ $link->label }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <h4 class="footer-heading">COMPANY</h4>
                    <ul class="footer-links">
                        @foreach ($footerColumns['company'] as $link)
                            <li><a href="{{ $link->resolvedUrl() }}">{{ $link->label }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <h4 class="footer-heading">CONNECT</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('link.index') }}">Links</a></li>
                        <li><a href="{{ route('contact.show') }}">Contact Us</a></li>
                        <li class="footer-phone"><i class="bi bi-telephone-fill"></i> {{ \App\Models\Setting::get('company_phone') }}</li>
                    </ul>
                </div>
            </div>

            <hr class="footer-divider">

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2 footer-bottom">
                <p class="mb-0">{{ $page->copyright_text }}</p>
                <div class="d-flex gap-4">
                    <a href="{{ route('cms.show', 'privacy-policy') }}">Privacy Policy</a>
                    <a href="{{ route('cms.show', 'terms') }}">Terms of Engineering Service</a>
                </div>
            </div>
        </div>
    </footer>
@endsection
