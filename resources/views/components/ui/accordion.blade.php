@props(['items', 'light' => false, 'id' => 'accordion'.uniqid()])

<div {{ $attributes->class(['accordion', 'faq-accordion-light' => $light, 'faq-accordion' => ! $light]) }} id="{{ $id }}">
    @foreach ($items as $i => $item)
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button {{ $i === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $id }}-{{ $i }}">
                    {{ $item->question }}
                </button>
            </h2>
            <div id="{{ $id }}-{{ $i }}" class="accordion-collapse collapse {{ $i === 0 ? 'show' : '' }}" data-bs-parent="#{{ $id }}">
                <div class="accordion-body">
                    @foreach (preg_split('/\R\s*\R/', trim((string) $item->answer)) as $paragraph)
                        @if (trim($paragraph) !== '')
                            <p>{{ $paragraph }}</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>
