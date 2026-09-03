@extends('admin.layouts.admin')

@section('title', $page->exists ? 'Edit Page' : 'Add Page')

@section('content')
    <h1 class="h4 mb-4">{{ $page->exists ? 'Edit Page' : 'Add Page' }}</h1>

    <form method="POST" action="{{ $page->exists ? route('admin.cms-pages.update', $page) : route('admin.cms-pages.store') }}">
        @csrf
        @if ($page->exists) @method('PUT') @endif

        <div class="card mb-4">
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $page->title) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Slug (leave blank to auto-generate)</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug', $page->slug) }}">
                    @if ($page->exists)
                        <div class="form-text">Current URL: <code>/{{ $page->slug }}</code></div>
                    @endif
                </div>
                <div class="col-12">
                    <label class="form-label">Body (basic HTML allowed)</label>
                    <textarea name="body" class="form-control" rows="12">{{ old('body', $page->body) }}</textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $page->order ?? 0) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="published" @selected(old('status', $page->status ?? 'published') === 'published')>Published</option>
                        <option value="draft" @selected(old('status', $page->status ?? '') === 'draft')>Draft</option>
                    </select>
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
        <a href="{{ route('admin.cms-pages.index') }}" class="btn btn-link">Cancel</a>
    </form>
@endsection
