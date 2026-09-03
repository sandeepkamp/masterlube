@props(['testimonial'])

<div class="testimonial-card h-100">
    <i class="bi bi-quote testimonial-quote-icon"></i>
    <p class="testimonial-text">&quot;{{ $testimonial->quote }}&quot;</p>
    <p class="testimonial-name">— {{ $testimonial->author_name }}</p>
    @if ($testimonial->author_role)
        <p class="testimonial-role">{{ $testimonial->author_role }}</p>
    @endif
</div>
