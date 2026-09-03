@extends('admin.layouts.admin')

@section('title', 'Our Advantages Page')

@section('content')
    <h1 class="h4 mb-4">Our Advantages Page</h1>

    <form method="POST" action="{{ route('admin.pages.advantages.update') }}">
        @csrf @method('PUT')

        <div class="card mb-4">
            <div class="card-header">Banner</div>
            <div class="card-body row g-3">
                <div class="col-md-4">
                    <label class="form-label">Eyebrow</label>
                    <input type="text" name="banner_eyebrow" class="form-control" value="{{ old('banner_eyebrow', $page->banner_eyebrow) }}">
                </div>
                <div class="col-md-8">
                    <label class="form-label">Title</label>
                    <input type="text" name="banner_title" class="form-control" value="{{ old('banner_title', $page->banner_title) }}">
                </div>
                <div class="col-12">
                    <label class="form-label">Intro / Banner Text</label>
                    <textarea name="intro_body" class="form-control" rows="3">{{ old('intro_body', $page->intro_body) }}</textarea>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Features Section</div>
            <div class="card-body row g-3">
                <div class="col-12">
                    <label class="form-label">Heading</label>
                    <input type="text" name="features_heading" class="form-control" value="{{ old('features_heading', $page->features_heading) }}">
                </div>
            </div>
            <div class="card-body border-top">
                <p class="text-muted small">Up to 4 cards. Leave a card's title blank to remove it. Icon is a <a href="https://icons.getbootstrap.com" target="_blank" rel="noopener">Bootstrap Icons</a> class, e.g. <code>bi-gear</code>.</p>
                @php $featureGrid = old('feature_grid', $page->feature_grid ?? []); @endphp
                <div class="row g-3">
                    @for ($i = 0; $i < 4; $i++)
                        @php $item = $featureGrid[$i] ?? []; @endphp
                        <div class="col-md-6 col-lg-3">
                            <div class="border rounded p-3 h-100">
                                <label class="form-label small text-muted">Card {{ $i + 1 }}</label>
                                <input type="text" name="feature_grid[{{ $i }}][icon]" class="form-control mb-2" placeholder="Icon class (e.g. bi-gear)" value="{{ $item['icon'] ?? '' }}">
                                <input type="text" name="feature_grid[{{ $i }}][title]" class="form-control mb-2" placeholder="Title" value="{{ $item['title'] ?? '' }}">
                                <textarea name="feature_grid[{{ $i }}][text]" class="form-control" rows="3" placeholder="Text">{{ $item['text'] ?? '' }}</textarea>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Testimonials Section</div>
            <div class="card-body row g-3">
                <div class="col-md-4">
                    <label class="form-label">Eyebrow</label>
                    <input type="text" name="testimonials_eyebrow" class="form-control" value="{{ old('testimonials_eyebrow', $page->testimonials_eyebrow) }}">
                </div>
                <div class="col-md-8">
                    <label class="form-label">Heading</label>
                    <input type="text" name="testimonials_title" class="form-control" value="{{ old('testimonials_title', $page->testimonials_title) }}">
                </div>
            </div>
            <div class="card-footer text-muted small">Testimonial cards themselves are pulled from the Testimonials module (featured items) — the same 3 shown on Home and the Landing page.</div>
        </div>

        <div class="card mb-4">
            <div class="card-header">SEO</div>
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $page->meta_title) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Meta Description</label>
                    <input type="text" name="meta_description" class="form-control" value="{{ old('meta_description', $page->meta_description) }}">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
