@extends('admin.layouts.admin')

@section('title', 'Applications Hub Page')

@section('content')
    <h1 class="h4 mb-4">Applications Hub Page</h1>

    <form method="POST" action="{{ route('admin.pages.applications-hub.update') }}">
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
                    <label class="form-label">Banner Text</label>
                    <textarea name="banner_text" class="form-control" rows="2">{{ old('banner_text', $page->banner_text) }}</textarea>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Grid Section</div>
            <div class="card-body row g-3">
                <div class="col-12">
                    <label class="form-label">Section Heading</label>
                    <input type="text" name="intro_title" class="form-control" value="{{ old('intro_title', $page->intro_title) }}">
                </div>
                <div class="col-12">
                    <label class="form-label">Section Subtitle (optional)</label>
                    <textarea name="intro_body" class="form-control" rows="3">{{ old('intro_body', $page->intro_body) }}</textarea>
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

        <p class="text-muted small">The tile grid itself is managed under Applications → Industries. The "Prelube System" tile's image comes from the Prelube page's hero image.</p>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
