@extends('admin.layouts.admin')

@section('title', $item->exists ? 'Edit News Item' : 'Add News Item')

@section('content')
    <h1 class="h4 mb-4">{{ $item->exists ? 'Edit News Item' : 'Add News Item' }}</h1>

    <form method="POST" action="{{ $item->exists ? route('admin.news.update', $item) : route('admin.news.store') }}" enctype="multipart/form-data">
        @csrf
        @if ($item->exists) @method('PUT') @endif

        <div class="card">
            <div class="card-body row g-3">
                <div class="col-md-8">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $item->title) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Badge</label>
                    <input type="text" name="badge" class="form-control" value="{{ old('badge', $item->badge) }}">
                </div>
                <div class="col-12">
                    <label class="form-label">Excerpt</label>
                    <textarea name="excerpt" class="form-control" rows="2">{{ old('excerpt', $item->excerpt) }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Body (optional)</label>
                    <textarea name="body" class="form-control" rows="6">{{ old('body', $item->body) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Cover Image</label>
                    <input type="file" name="cover_image" class="form-control" accept="image/*">
                    @if ($item->cover_image)
                        <img src="{{ media_url($item->cover_image) }}" class="img-thumbnail mt-2" style="max-height:100px">
                    @endif
                </div>
                <div class="col-md-3">
                    <label class="form-label">Published Date</label>
                    <input type="date" name="published_at" class="form-control" value="{{ old('published_at', $item->published_at?->format('Y-m-d')) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="published" @selected(old('status', $item->status ?? 'published') === 'published')>Published</option>
                        <option value="draft" @selected(old('status', $item->status ?? '') === 'draft')>Draft</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
        <a href="{{ route('admin.news.index') }}" class="btn btn-link mt-3">Cancel</a>
    </form>
@endsection
