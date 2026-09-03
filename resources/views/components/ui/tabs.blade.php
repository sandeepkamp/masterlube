@props(['items', 'id' => 'tabs'.uniqid()])

<ul class="nav nav-pills justify-content-center gap-2 mb-5" id="{{ $id }}" role="tablist">
    @foreach ($items as $i => $item)
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $i === 0 ? 'active' : '' }}" data-bs-toggle="pill" data-bs-target="#{{ $id }}-{{ $i }}" type="button">
                {{ $item->name ?? $item->title }}
            </button>
        </li>
    @endforeach
</ul>

<div class="tab-content" id="{{ $id }}Content">
    @foreach ($items as $i => $item)
        <div class="tab-pane fade {{ $i === 0 ? 'show active' : '' }}" id="{{ $id }}-{{ $i }}">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="fw-bold mt-2">{{ $item->name ?? $item->title }}</h2>
                    <p class="text-muted">{{ $item->description }}</p>
                </div>
                <div class="col-lg-6">
                    <div class="tab-image">
                        <img src="{{ media_url($item->image) }}" class="img-fluid" alt="{{ $item->name ?? $item->title }}">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
