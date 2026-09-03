@props(['items'])

<div class="row gy-4 mt-3">
    @foreach ($items as $item)
        <div class="col-md-6 col-lg-3">
            <div class="feature-card h-100 text-center">
                <div class="feature-icon">
                    <i class="bi {{ $item['icon'] }}"></i>
                </div>
                <h3 class="feature-title">{{ $item['title'] }}</h3>
                <p class="feature-text">{{ $item['text'] }}</p>
            </div>
        </div>
    @endforeach
</div>
