@extends('admin.layouts.admin')

@section('title', $install->exists ? 'Edit Install' : 'Add Install')

@section('content')
    <h1 class="h4 mb-4">{{ $install->exists ? 'Edit Install' : 'Add Install' }}</h1>

    <form method="POST" action="{{ $install->exists ? route('admin.installs.update', $install) : route('admin.installs.store') }}" enctype="multipart/form-data">
        @csrf
        @if ($install->exists) @method('PUT') @endif

        <div class="card mb-4">
            <div class="card-body row g-3">
                <div class="col-md-8">
                    <label class="form-label">Title (vehicle name)</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $install->title) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $install->order ?? 0) }}">
                </div>
                <div class="col-12">
                    <label class="form-label">Caption</label>
                    <textarea name="caption" class="form-control" rows="2">{{ old('caption', $install->caption) }}</textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="published" @selected(old('status', $install->status ?? 'published') === 'published')>Published</option>
                        <option value="draft" @selected(old('status', $install->status ?? '') === 'draft')>Draft</option>
                    </select>
                </div>
            </div>
        </div>

        @if ($install->exists)
            <div class="card mb-4">
                <div class="card-header">Existing Photos</div>
                <div class="card-body">
                    <div class="row g-3">
                        @forelse ($install->photos as $photo)
                            <div class="col-md-2 col-4 text-center">
                                <img src="{{ media_url($photo->image) }}" class="img-thumbnail mb-1" style="max-height:100px">
                                @if ($photo->is_featured)
                                    <span class="badge bg-warning text-dark d-block mb-1">Featured</span>
                                @endif
                                <form action="{{ route('admin.installs.photos.destroy', $photo) }}" method="POST" onsubmit="return confirm('Remove this photo?');">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger w-100">Remove</button>
                                </form>
                            </div>
                        @empty
                            <p class="text-muted mb-0">No photos yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">Add Photos</div>
            <div class="card-body">
                <input type="file" name="new_photos[]" class="form-control" accept="image/*" multiple>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.installs.index') }}" class="btn btn-link">Cancel</a>
    </form>
@endsection
