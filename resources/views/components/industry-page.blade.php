@props(['industry', 'all'])

@php
    $benefit1Title = \App\Models\Setting::get('industry_benefit_1_title');
    $benefit1Text = \App\Models\Setting::get('industry_benefit_1_text');
    $benefit2Title = \App\Models\Setting::get('industry_benefit_2_title');
    $benefit2Text = \App\Models\Setting::get('industry_benefit_2_text');
@endphp

<section class="page-banner">
    <div class="container">
        <nav class="page-banner-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $industry->name }}</li>
            </ol>
        </nav>
        <p class="page-banner-eyebrow">{{ $industry->hero_eyebrow ?? $industry->name }}</p>
        <h1 class="page-banner-title">{{ $industry->hero_title ?? 'Built for a Wide Range of Equipment' }}</h1>
        @if ($industry->hero_text)
            <p class="page-banner-text">{{ $industry->hero_text }}</p>
        @endif
    </div>
</section>

<section class="industry-applications-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold mb-3">{{ $industry->name }}</h2>
        </div>

        <div class="row align-items-center g-4 g-lg-5 mb-5">
            <div class="col-lg-5">
                <div class="position-relative">
                    <div class="bg-light rounded-4 p-4 text-center">
                        <img src="{{ media_url($industry->hero_image) }}" class="img-fluid" alt="{{ $industry->name }}">
                    </div>
                    <div class="position-absolute bottom-0 start-0 translate-middle-y ms-3">
                        <div class="bg-dark text-white rounded-4 px-4 py-3 shadow">
                            <small class="d-block opacity-75">Built for</small>
                            <strong>Extreme Performance</strong>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                @foreach (preg_split('/\R\s*\R/', trim((string) $industry->intro_body)) as $paragraph)
                    @if (trim($paragraph) !== '')
                        <p>{{ $paragraph }}</p>
                    @endif
                @endforeach

                <div class="row g-3 mt-3">
                    <div class="col-sm-6">
                        <div class="d-flex gap-3">
                            <div class="flex-shrink-0 bg-dark text-white rounded-3 p-4">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ $benefit1Title }}</h6>
                                <p class="small text-muted mb-0">{{ $benefit1Text }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex gap-3">
                            <div class="flex-shrink-0 bg-dark text-white rounded-3 p-4">
                                <i class="bi bi-speedometer2"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ $benefit2Title }}</h6>
                                <p class="small text-muted mb-0">{{ $benefit2Text }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($industry->secondary_body)
            <div class="row align-items-center g-4 g-lg-5 mb-5">
                <div class="col-lg-7 order-2 order-lg-1">
                    @if ($industry->secondary_title)
                        <h3 class="fw-bold mt-2 mb-4">{{ $industry->secondary_title }}</h3>
                    @endif

                    @foreach (preg_split('/\R\s*\R/', trim((string) $industry->secondary_body)) as $paragraph)
                        @if (trim($paragraph) !== '')
                            <p>{{ $paragraph }}</p>
                        @endif
                    @endforeach

                    @if ($industry->callout_text)
                        <div class="mt-4 p-4 rounded-4 bg-light border-start border-4 border-dark">
                            <strong>Key takeaway:</strong>
                            <span class="text-muted">{{ $industry->callout_text }}</span>
                        </div>
                    @endif
                </div>

                @if ($industry->secondary_image)
                    <div class="col-lg-5 order-1 order-lg-2">
                        <div class="bg-light rounded-4 p-4 text-center">
                            <img src="{{ media_url($industry->secondary_image) }}" class="img-fluid rounded-3" alt="{{ $industry->name }}">
                        </div>
                    </div>
                @endif
            </div>
        @endif

        <div class="text-center">
            <span class="text-uppercase small fw-bold text-secondary">Explore More</span>
            <h3 class="fw-bold mt-2 mb-4">Other Applications</h3>

            <div class="d-flex flex-wrap justify-content-center gap-2">
                @foreach ($all as $item)
                    <a href="{{ route('applications.show', $item) }}" class="btn btn-outline-dark btn-sm rounded-pill px-3">{{ $item->nav_label ?? $item->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
</section>
