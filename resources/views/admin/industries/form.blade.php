@extends('admin.layouts.admin')

@section('title', $industry->exists ? 'Edit Industry' : 'Add Industry')

@section('content')
    <h1 class="h4 mb-4">{{ $industry->exists ? 'Edit Industry' : 'Add Industry' }}</h1>

    <form method="POST" action="{{ $industry->exists ? route('admin.industries.update', $industry) : route('admin.industries.store') }}" enctype="multipart/form-data">
        @csrf
        @if ($industry->exists) @method('PUT') @endif

        <div class="card mb-4">
            <div class="card-header">Basics</div>
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $industry->name) }}" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Slug (leave blank to auto-generate)</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug', $industry->slug) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Nav / Pill Label</label>
                    <input type="text" name="nav_label" class="form-control" value="{{ old('nav_label', $industry->nav_label) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $industry->order ?? 0) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="published" @selected(old('status', $industry->status ?? 'published') === 'published')>Published</option>
                        <option value="draft" @selected(old('status', $industry->status ?? '') === 'draft')>Draft</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Hero / Banner</div>
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Hero Eyebrow</label>
                    <input type="text" name="hero_eyebrow" class="form-control" value="{{ old('hero_eyebrow', $industry->hero_eyebrow) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Hero Title</label>
                    <input type="text" name="hero_title" class="form-control" value="{{ old('hero_title', $industry->hero_title) }}">
                </div>
                <div class="col-12">
                    <label class="form-label">Hero Text</label>
                    <textarea name="hero_text" class="form-control" rows="2">{{ old('hero_text', $industry->hero_text) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Hero Image</label>
                    <input type="file" name="hero_image" class="form-control" accept="image/*">
                    @if ($industry->hero_image)
                        <img src="{{ media_url($industry->hero_image) }}" class="img-thumbnail mt-2" style="max-height:100px">
                    @endif
                </div>
                <div class="col-md-6">
                    <label class="form-label">Thumbnail Image (hub grid)</label>
                    <input type="file" name="thumbnail_image" class="form-control" accept="image/*">
                    @if ($industry->thumbnail_image)
                        <img src="{{ media_url($industry->thumbnail_image) }}" class="img-thumbnail mt-2" style="max-height:100px">
                    @endif
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Intro Block</div>
            <div class="card-body row g-3">
                <div class="col-12">
                    <label class="form-label">Intro Body (blank line between paragraphs)</label>
                    <textarea name="intro_body" class="form-control" rows="6">{{ old('intro_body', $industry->intro_body) }}</textarea>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Secondary Block (optional)</div>
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Secondary Title</label>
                    <input type="text" name="secondary_title" class="form-control" value="{{ old('secondary_title', $industry->secondary_title) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Secondary Image</label>
                    <input type="file" name="secondary_image" class="form-control" accept="image/*">
                    @if ($industry->secondary_image)
                        <img src="{{ media_url($industry->secondary_image) }}" class="img-thumbnail mt-2" style="max-height:100px">
                    @endif
                </div>
                <div class="col-12">
                    <label class="form-label">Secondary Body</label>
                    <textarea name="secondary_body" class="form-control" rows="6">{{ old('secondary_body', $industry->secondary_body) }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Callout Text</label>
                    <textarea name="callout_text" class="form-control" rows="2">{{ old('callout_text', $industry->callout_text) }}</textarea>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">SEO</div>
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $industry->meta_title) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Meta Description</label>
                    <input type="text" name="meta_description" class="form-control" value="{{ old('meta_description', $industry->meta_description) }}">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.industries.index') }}" class="btn btn-link">Cancel</a>
    </form>
@endsection
