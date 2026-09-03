@props(['item'])

<article class="news-card h-100">
    <img src="{{ media_url($item->cover_image) }}" alt="{{ $item->title }}" class="news-card-img">
    <div class="news-card-body">
        @if ($item->badge)
            <span class="news-badge">{{ $item->badge }}</span>
        @endif
        <h3 class="news-title">{{ $item->title }}</h3>
        <p class="news-text">{{ $item->excerpt }}</p>
        <a href="{{ route('new-stuff.show', $item) }}" class="news-link">Read More <i class="bi bi-arrow-right"></i></a>
    </div>
</article>
