@extends('admin.layouts.admin')

@section('title', 'Landing Page')

@section('content')
    <h1 class="h4 mb-4">Landing Page (/)</h1>

    <form method="POST" action="{{ route('admin.pages.landing.update') }}" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="card mb-4">
            <div class="card-header">Hero</div>
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Hero Title (blank line for the line break)</label>
                    <textarea name="hero_title" class="form-control" rows="2">{{ old('hero_title', $page->hero_title) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Hero Text</label>
                    <textarea name="hero_text" class="form-control" rows="4">{{ old('hero_text', $page->hero_text) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Hero Bullet List (one per line, optional)</label>
                    <textarea name="hero_bullets" class="form-control" rows="4">{{ old('hero_bullets', implode("\n", $page->hero_bullets ?? [])) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Primary Button Text</label>
                    <input type="text" name="hero_cta_primary_text" class="form-control" value="{{ old('hero_cta_primary_text', $page->hero_cta_primary_text) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Secondary Button Text</label>
                    <input type="text" name="hero_cta_secondary_text" class="form-control" value="{{ old('hero_cta_secondary_text', $page->hero_cta_secondary_text) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Stat 1 Number</label>
                    <input type="text" name="stat_1_number" class="form-control" value="{{ old('stat_1_number', $page->stat_1_number) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Stat 1 Label</label>
                    <input type="text" name="stat_1_label" class="form-control" value="{{ old('stat_1_label', $page->stat_1_label) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Stat 1 Caption</label>
                    <input type="text" name="stat_1_caption" class="form-control" value="{{ old('stat_1_caption', $page->stat_1_caption) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Stat 2 Number</label>
                    <input type="text" name="stat_2_number" class="form-control" value="{{ old('stat_2_number', $page->stat_2_number) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Stat 2 Label</label>
                    <input type="text" name="stat_2_label" class="form-control" value="{{ old('stat_2_label', $page->stat_2_label) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Stat 2 Caption</label>
                    <input type="text" name="stat_2_caption" class="form-control" value="{{ old('stat_2_caption', $page->stat_2_caption) }}">
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Showcase Panel</div>
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Panel Title</label>
                    <input type="text" name="showcase_title" class="form-control" value="{{ old('showcase_title', $page->showcase_title) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tagline</label>
                    <input type="text" name="showcase_tagline" class="form-control" value="{{ old('showcase_tagline', $page->showcase_tagline) }}">
                </div>
                <div class="col-12">
                    <label class="form-label">CTA Text (below the vehicle grid)</label>
                    <input type="text" name="showcase_cta_text" class="form-control" value="{{ old('showcase_cta_text', $page->showcase_cta_text) }}">
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Vehicle Showcase Grid</div>
            <div class="card-body">
                <p class="text-muted small">Up to 8 tiles. Leave a tile's label and image blank to remove it. A "Lifetime Guarantee" badge is always shown after the 4th tile.</p>
                @php $showcaseGrid = old('showcase_grid', $page->showcase_grid ?? []); @endphp
                <div class="row g-3">
                    @for ($i = 0; $i < 8; $i++)
                        @php $item = $showcaseGrid[$i] ?? []; @endphp
                        <div class="col-md-6 col-lg-3">
                            <div class="border rounded p-3 h-100">
                                <label class="form-label small text-muted">Tile {{ $i + 1 }}</label>
                                <input type="text" name="showcase_grid[{{ $i }}][label]" class="form-control mb-2" placeholder="Label" value="{{ $item['label'] ?? '' }}">
                                <input type="text" name="showcase_grid[{{ $i }}][sublabel]" class="form-control mb-2" placeholder="Sublabel (optional)" value="{{ $item['sublabel'] ?? '' }}">
                                <select name="showcase_grid[{{ $i }}][industry_slug]" class="form-select mb-2">
                                    <option value="">— Link to industry —</option>
                                    @foreach ($industries as $industry)
                                        <option value="{{ $industry->slug }}" @selected(($item['industry_slug'] ?? null) === $industry->slug)>{{ $industry->name }}</option>
                                    @endforeach
                                </select>
                                @if (!empty($item['image']))
                                    <img src="{{ media_url($item['image']) }}" class="img-thumbnail mb-2" style="max-height:80px">
                                @endif
                                <input type="file" name="showcase_grid[{{ $i }}][image]" class="form-control" accept="image/*">
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Solutions Section</div>
            <div class="card-body row g-3">
                <div class="col-md-4">
                    <label class="form-label">Eyebrow</label>
                    <input type="text" name="solutions_eyebrow" class="form-control" value="{{ old('solutions_eyebrow', $page->solutions_eyebrow) }}">
                </div>
                <div class="col-md-8">
                    <label class="form-label">Heading</label>
                    <input type="text" name="solutions_title" class="form-control" value="{{ old('solutions_title', $page->solutions_title) }}">
                </div>
                <div class="col-12">
                    <label class="form-label">Subtitle</label>
                    <textarea name="solutions_subtitle" class="form-control" rows="2">{{ old('solutions_subtitle', $page->solutions_subtitle) }}</textarea>
                </div>
            </div>
            <div class="card-body border-top">
                <p class="text-muted small">Up to 3 cards. Leave a card's title and image blank to remove it.</p>
                @php $solutionsGrid = old('solutions_grid', $page->solutions_grid ?? []); @endphp
                <div class="row g-3">
                    @for ($i = 0; $i < 3; $i++)
                        @php $item = $solutionsGrid[$i] ?? []; @endphp
                        <div class="col-md-4">
                            <div class="border rounded p-3 h-100">
                                <label class="form-label small text-muted">Card {{ $i + 1 }}</label>
                                <input type="text" name="solutions_grid[{{ $i }}][badge]" class="form-control mb-2" placeholder="Badge" value="{{ $item['badge'] ?? '' }}">
                                <input type="text" name="solutions_grid[{{ $i }}][title]" class="form-control mb-2" placeholder="Title" value="{{ $item['title'] ?? '' }}">
                                <textarea name="solutions_grid[{{ $i }}][text]" class="form-control mb-2" rows="3" placeholder="Text">{{ $item['text'] ?? '' }}</textarea>
                                @if (!empty($item['image']))
                                    <img src="{{ media_url($item['image']) }}" class="img-thumbnail mb-2" style="max-height:80px">
                                @endif
                                <input type="file" name="solutions_grid[{{ $i }}][image]" class="form-control" accept="image/*">
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
                    <label class="form-label">Heading (blank line for the line break)</label>
                    <textarea name="testimonials_title" class="form-control" rows="2">{{ old('testimonials_title', $page->testimonials_title) }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Trust Bar Label</label>
                    <input type="text" name="trust_label" class="form-control" value="{{ old('trust_label', $page->trust_label) }}">
                </div>
                <div class="col-12">
                    <label class="form-label">Trust Bar Pills (one per line)</label>
                    <textarea name="trust_pills" class="form-control" rows="5">{{ old('trust_pills', implode("\n", $page->trust_pills ?? [])) }}</textarea>
                </div>
            </div>
            <div class="card-footer text-muted small">Testimonial cards themselves are pulled from the Testimonials module (featured items) — the same 3 shown on Home and Our Advantages.</div>
        </div>

        <div class="card mb-4">
            <div class="card-header">CTA Section</div>
            <div class="card-body row g-3">
                <div class="col-md-4">
                    <label class="form-label">Eyebrow</label>
                    <input type="text" name="cta_eyebrow" class="form-control" value="{{ old('cta_eyebrow', $page->cta_eyebrow) }}">
                </div>
                <div class="col-md-8">
                    <label class="form-label">Heading (blank line for the line break)</label>
                    <textarea name="cta_title" class="form-control" rows="2">{{ old('cta_title', $page->cta_title) }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Text</label>
                    <textarea name="cta_text" class="form-control" rows="2">{{ old('cta_text', $page->cta_text) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Primary Button Text</label>
                    <input type="text" name="cta_primary_text" class="form-control" value="{{ old('cta_primary_text', $page->cta_primary_text) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Secondary Button Text</label>
                    <input type="text" name="cta_secondary_text" class="form-control" value="{{ old('cta_secondary_text', $page->cta_secondary_text) }}">
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Footer</div>
            <div class="card-body row g-3">
                <div class="col-12">
                    <label class="form-label">Footer Text</label>
                    <textarea name="footer_text" class="form-control" rows="2">{{ old('footer_text', $page->footer_text) }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Copyright Text</label>
                    <input type="text" name="copyright_text" class="form-control" value="{{ old('copyright_text', $page->copyright_text) }}">
                </div>
            </div>
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

        <p class="text-muted small">Footer badges are seeded content; editing individual items isn't yet exposed in this form.</p>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
