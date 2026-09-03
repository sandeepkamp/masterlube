@extends('admin.layouts.admin')

@section('title', $magazine->exists ? 'Edit Magazine' : 'Add Magazine')

@section('content')
    <h1 class="h4 mb-4">{{ $magazine->exists ? 'Edit Magazine' : 'Add Magazine' }}</h1>

    <form method="POST" action="{{ $magazine->exists ? route('admin.magazines.update', $magazine) : route('admin.magazines.store') }}" enctype="multipart/form-data">
        @csrf
        @if ($magazine->exists) @method('PUT') @endif

        <div class="card mb-4">
            <div class="card-body row g-3">
                <div class="col-md-8">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $magazine->title) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Cover Image</label>
                    <input type="file" name="cover_image" class="form-control" accept="image/*">
                    @if ($magazine->cover_image)
                        <img src="{{ media_url($magazine->cover_image) }}" class="img-thumbnail mt-2" style="max-height:100px">
                    @endif
                </div>
                <div class="col-md-4">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $magazine->order ?? 0) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="published" @selected(old('status', $magazine->status ?? 'published') === 'published')>Published</option>
                        <option value="draft" @selected(old('status', $magazine->status ?? '') === 'draft')>Draft</option>
                    </select>
                </div>
            </div>
        </div>

        @if ($magazine->exists)
            <div class="card mb-4">
                <div class="card-header">Existing Pages</div>
                <div class="card-body">
                    <div class="row g-3">
                        @forelse ($magazine->pages as $page)
                            <div class="col-md-2 col-4 text-center">
                                <img src="{{ media_url($page->image) }}" class="img-thumbnail mb-1" style="max-height:100px">
                                <form action="{{ route('admin.magazines.pages.destroy', $page) }}" method="POST" onsubmit="return confirm('Remove this page image?');">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger w-100">Remove</button>
                                </form>
                            </div>
                        @empty
                            <p class="text-muted mb-0">No pages yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">Add Page Images</div>
            <div class="card-body">
                <input type="file" name="new_pages[]" class="form-control" accept="image/*" multiple>
                <div class="form-text">Select one or more images to append as new pages, in order.</div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.magazines.index') }}" class="btn btn-link">Cancel</a>
    </form>
@endsection
