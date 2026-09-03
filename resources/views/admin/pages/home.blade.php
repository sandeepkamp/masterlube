@extends('admin.layouts.admin')

@section('title', 'Home Page')

@section('content')
    <h1 class="h4 mb-4">Home Page</h1>

    <form method="POST" action="{{ route('admin.pages.home.update') }}" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="card mb-4">
            <div class="card-header">Hero</div>
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Hero Eyebrow</label>
                    <input type="text" name="hero_eyebrow" class="form-control" value="{{ old('hero_eyebrow', $page->hero_eyebrow) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Hero Title</label>
                    <input type="text" name="hero_title" class="form-control" value="{{ old('hero_title', $page->hero_title) }}">
                </div>
                <div class="col-12">
                    <label class="form-label">Hero Text</label>
                    <textarea name="hero_text" class="form-control" rows="2">{{ old('hero_text', $page->hero_text) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Hero Image</label>
                    <input type="file" name="hero_image" class="form-control" accept="image/*">
                    @if ($page->hero_image)
                        <img src="{{ media_url($page->hero_image) }}" class="img-thumbnail mt-2" style="max-height:100px">
                    @endif
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Features Section</div>
            <div class="card-body row g-3">
                <div class="col-12">
                    <label class="form-label">Heading</label>
                    <input type="text" name="features_title" class="form-control" value="{{ old('features_title', $page->features_title) }}">
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
            <div class="card-header">Systems Section</div>
            <div class="card-body row g-3">
                <div class="col-md-4">
                    <label class="form-label">Eyebrow</label>
                    <input type="text" name="systems_eyebrow" class="form-control" value="{{ old('systems_eyebrow', $page->systems_eyebrow) }}">
                </div>
                <div class="col-md-8">
                    <label class="form-label">Heading</label>
                    <input type="text" name="systems_title" class="form-control" value="{{ old('systems_title', $page->systems_title) }}">
                </div>
                <div class="col-12">
                    <label class="form-label">Text</label>
                    <textarea name="systems_text" class="form-control" rows="2">{{ old('systems_text', $page->systems_text) }}</textarea>
                </div>
            </div>
            <div class="card-body border-top">
                <p class="text-muted small">Up to 4 cards. Leave a card's title and image blank to remove it.</p>
                @php $systemsGrid = old('systems_grid', $page->systems_grid ?? []); @endphp
                <div class="row g-3">
                    @for ($i = 0; $i < 4; $i++)
                        @php $item = $systemsGrid[$i] ?? []; @endphp
                        <div class="col-md-6 col-lg-3">
                            <div class="border rounded p-3 h-100">
                                <label class="form-label small text-muted">Card {{ $i + 1 }}</label>
                                <input type="text" name="systems_grid[{{ $i }}][number]" class="form-control mb-2" placeholder="Number (e.g. 01)" value="{{ $item['number'] ?? '' }}">
                                <input type="text" name="systems_grid[{{ $i }}][title]" class="form-control mb-2" placeholder="Title" value="{{ $item['title'] ?? '' }}">
                                <textarea name="systems_grid[{{ $i }}][text]" class="form-control mb-2" rows="3" placeholder="Text">{{ $item['text'] ?? '' }}</textarea>
                                @if (!empty($item['image']))
                                    <img src="{{ media_url($item['image']) }}" class="img-thumbnail mb-2" style="max-height:80px">
                                @endif
                                <input type="file" name="systems_grid[{{ $i }}][image]" class="form-control" accept="image/*">
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Applications Section</div>
            <div class="card-body row g-3">
                <div class="col-md-4">
                    <label class="form-label">Eyebrow</label>
                    <input type="text" name="applications_eyebrow" class="form-control" value="{{ old('applications_eyebrow', $page->applications_eyebrow) }}">
                </div>
                <div class="col-md-8">
                    <label class="form-label">Heading</label>
                    <input type="text" name="applications_title" class="form-control" value="{{ old('applications_title', $page->applications_title) }}">
                </div>
            </div>
            <div class="card-body border-top">
                <p class="text-muted small">Up to 8 tiles. Leave a tile's label and image blank to remove it. Use a blank line in the label for a line break.</p>
                @php $applicationsGrid = old('applications_grid', $page->applications_grid ?? []); @endphp
                <div class="row g-3">
                    @for ($i = 0; $i < 8; $i++)
                        @php $item = $applicationsGrid[$i] ?? []; @endphp
                        <div class="col-md-6 col-lg-3">
                            <div class="border rounded p-3 h-100">
                                <label class="form-label small text-muted">Tile {{ $i + 1 }}</label>
                                <textarea name="applications_grid[{{ $i }}][label]" class="form-control mb-2" rows="2" placeholder="Label">{{ $item['label'] ?? '' }}</textarea>
                                @if (!empty($item['image']))
                                    <img src="{{ media_url($item['image']) }}" class="img-thumbnail mb-2" style="max-height:80px">
                                @endif
                                <input type="file" name="applications_grid[{{ $i }}][image]" class="form-control" accept="image/*">
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Why Choose Section</div>
            <div class="card-body row g-3">
                <div class="col-md-4">
                    <label class="form-label">Eyebrow</label>
                    <input type="text" name="why_choose_eyebrow" class="form-control" value="{{ old('why_choose_eyebrow', $page->why_choose_eyebrow) }}">
                </div>
                <div class="col-md-8">
                    <label class="form-label">Heading</label>
                    <input type="text" name="why_choose_title" class="form-control" value="{{ old('why_choose_title', $page->why_choose_title) }}">
                </div>
            </div>
            <div class="card-body border-top">
                <p class="text-muted small">Up to 4 items. Leave an item's title blank to remove it. Icon is a <a href="https://icons.getbootstrap.com" target="_blank" rel="noopener">Bootstrap Icons</a> class, e.g. <code>bi-lightning-charge</code>.</p>
                @php $whyChooseGrid = old('why_choose_grid', $page->why_choose_grid ?? []); @endphp
                <div class="row g-3">
                    @for ($i = 0; $i < 4; $i++)
                        @php $item = $whyChooseGrid[$i] ?? []; @endphp
                        <div class="col-md-6 col-lg-3">
                            <div class="border rounded p-3 h-100">
                                <label class="form-label small text-muted">Item {{ $i + 1 }}</label>
                                <input type="text" name="why_choose_grid[{{ $i }}][icon]" class="form-control mb-2" placeholder="Icon class (e.g. bi-lightning-charge)" value="{{ $item['icon'] ?? '' }}">
                                <input type="text" name="why_choose_grid[{{ $i }}][title]" class="form-control mb-2" placeholder="Title" value="{{ $item['title'] ?? '' }}">
                                <textarea name="why_choose_grid[{{ $i }}][text]" class="form-control" rows="3" placeholder="Text">{{ $item['text'] ?? '' }}</textarea>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">News Section</div>
            <div class="card-body row g-3">
                <div class="col-md-4">
                    <label class="form-label">Eyebrow</label>
                    <input type="text" name="news_eyebrow" class="form-control" value="{{ old('news_eyebrow', $page->news_eyebrow) }}">
                </div>
                <div class="col-md-8">
                    <label class="form-label">Heading</label>
                    <input type="text" name="news_title" class="form-control" value="{{ old('news_title', $page->news_title) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Custom Hose CTA Title</label>
                    <input type="text" name="news_cta_title" class="form-control" value="{{ old('news_cta_title', $page->news_cta_title) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Custom Hose CTA Text</label>
                    <input type="text" name="news_cta_text" class="form-control" value="{{ old('news_cta_text', $page->news_cta_text) }}">
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">FAQ Section</div>
            <div class="card-body row g-3">
                <div class="col-md-4">
                    <label class="form-label">Eyebrow</label>
                    <input type="text" name="faq_eyebrow" class="form-control" value="{{ old('faq_eyebrow', $page->faq_eyebrow) }}">
                </div>
                <div class="col-md-8">
                    <label class="form-label">Heading</label>
                    <input type="text" name="faq_title" class="form-control" value="{{ old('faq_title', $page->faq_title) }}">
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Car Clubs Teaser</div>
            <div class="card-body row g-3">
                <div class="col-md-4">
                    <label class="form-label">Eyebrow</label>
                    <input type="text" name="car_clubs_eyebrow" class="form-control" value="{{ old('car_clubs_eyebrow', $page->car_clubs_eyebrow) }}">
                </div>
                <div class="col-md-8">
                    <label class="form-label">Title</label>
                    <input type="text" name="car_clubs_title" class="form-control" value="{{ old('car_clubs_title', $page->car_clubs_title) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Image</label>
                    <input type="file" name="car_clubs_image" class="form-control" accept="image/*">
                    @if ($page->car_clubs_image)
                        <img src="{{ media_url($page->car_clubs_image) }}" class="img-thumbnail mt-2" style="max-height:100px">
                    @endif
                </div>
                <div class="col-12">
                    <label class="form-label">Text</label>
                    <textarea name="car_clubs_text" class="form-control" rows="2">{{ old('car_clubs_text', $page->car_clubs_text) }}</textarea>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Contact Section</div>
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Heading</label>
                    <input type="text" name="contact_heading" class="form-control" value="{{ old('contact_heading', $page->contact_heading) }}">
                </div>
                <div class="col-12">
                    <label class="form-label">Text</label>
                    <textarea name="contact_text" class="form-control" rows="2">{{ old('contact_text', $page->contact_text) }}</textarea>
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
