@extends('admin.layouts.admin')

@section('title', 'About Page')

@section('content')
    <h1 class="h4 mb-4">About Page</h1>

    <form method="POST" action="{{ route('admin.pages.about.update') }}">
        @csrf @method('PUT')

        <div class="card mb-4">
            <div class="card-body row g-3">
                <div class="col-12">
                    <label class="form-label">Story Body (blank line between paragraphs)</label>
                    <textarea name="story_body" class="form-control" rows="8">{{ old('story_body', $page->story_body) }}</textarea>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">What Drives Us</div>
            <div class="card-body">
                <p class="text-muted small">Up to 4 cards. Leave a card's title blank to remove it. Icon is a <a href="https://icons.getbootstrap.com" target="_blank" rel="noopener">Bootstrap Icons</a> class, e.g. <code>bi-tools</code>.</p>
                @php $drivesUsGrid = old('drives_us_grid', $page->drives_us_grid ?? []); @endphp
                <div class="row g-3">
                    @for ($i = 0; $i < 4; $i++)
                        @php $item = $drivesUsGrid[$i] ?? []; @endphp
                        <div class="col-md-6 col-lg-3">
                            <div class="border rounded p-3 h-100">
                                <label class="form-label small text-muted">Card {{ $i + 1 }}</label>
                                <input type="text" name="drives_us_grid[{{ $i }}][icon]" class="form-control mb-2" placeholder="Icon class (e.g. bi-tools)" value="{{ $item['icon'] ?? '' }}">
                                <input type="text" name="drives_us_grid[{{ $i }}][title]" class="form-control mb-2" placeholder="Title" value="{{ $item['title'] ?? '' }}">
                                <textarea name="drives_us_grid[{{ $i }}][text]" class="form-control" rows="3" placeholder="Text">{{ $item['text'] ?? '' }}</textarea>
                            </div>
                        </div>
                    @endfor
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
