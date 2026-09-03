@php
    $logo = media_url(\App\Models\Setting::get('logo_path'));
@endphp

<footer class="site-footer">
    <div class="container py-5">
        <div class="row gy-4">
            <div class="col-lg-4">
                <a href="{{ route('home') }}" class="footer-brand">
                    <img src="{{ $logo }}" class="img-fluid" style="width: 200px;" alt="MasterLube">
                </a>
                <p class="footer-text">{{ $footerText }}</p>
                <div class="footer-social d-flex gap-2">
                    <a href="{{ $facebookUrl }}" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="{{ $twitterUrl }}" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                    <a href="{{ $instagramUrl }}" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                </div>
            </div>

            <div class="col-6 col-lg-2 offset-lg-1">
                <h3 class="footer-col-title">Products</h3>
                <ul class="footer-link-list">
                    @foreach ($columns['products'] as $link)
                        <li><a href="{{ $link->resolvedUrl() }}">{{ $link->label }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col-6 col-lg-2">
                <h3 class="footer-col-title">Company</h3>
                <ul class="footer-link-list">
                    @foreach ($columns['company'] as $link)
                        <li><a href="{{ $link->resolvedUrl() }}">{{ $link->label }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col-6 col-lg-3">
                <h3 class="footer-col-title">Connect</h3>
                <ul class="footer-link-list">
                    @foreach ($columns['connect'] as $link)
                        <li><a href="{{ $link->resolvedUrl() }}">{{ $link->label }}</a></li>
                    @endforeach
                </ul>
                <p class="footer-phone d-flex align-items-center">
                    <i class="bi bi-telephone"></i> {{ $phone }}
                </p>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container py-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
            <p class="mb-0">{{ $copyrightText }}</p>
            <div class="d-flex gap-4">
                <a href="{{ route('cms.show', 'privacy-policy') }}">Privacy Policy</a>
                <a href="{{ route('cms.show', 'terms') }}">Terms</a>
            </div>
        </div>
    </div>
</footer>
