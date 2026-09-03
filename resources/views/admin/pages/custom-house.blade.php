@extends('admin.layouts.admin')

@section('title', 'Custom Hose Page')

@section('content')
    <h1 class="h4 mb-4">Custom Hose Page</h1>

    <form method="POST" action="{{ route('admin.pages.custom-house.update') }}">
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
            <div class="card-header">Other Stuff Section</div>
            <div class="card-body row g-3">
                <div class="col-12">
                    <label class="form-label">Heading</label>
                    <input type="text" name="other_stuff_heading" class="form-control" value="{{ old('other_stuff_heading', $page->other_stuff_heading) }}">
                </div>
            </div>
            <div class="card-footer text-muted small">The featured item and the tab list itself are managed under Catalog → Accessories (the "Featured on Custom Hose" flag).</div>
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
