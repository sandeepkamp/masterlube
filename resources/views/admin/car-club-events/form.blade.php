@extends('admin.layouts.admin')

@section('title', $event->exists ? 'Edit Event' : 'Add Event')

@section('content')
    <h1 class="h4 mb-4">{{ $event->exists ? 'Edit Event' : 'Add Event' }}</h1>

    <form method="POST" action="{{ $event->exists ? route('admin.car-club-events.update', $event) : route('admin.car-club-events.store') }}" enctype="multipart/form-data">
        @csrf
        @if ($event->exists) @method('PUT') @endif

        <div class="card mb-4">
            <div class="card-body row g-3">
                <div class="col-md-8">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $event->title) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Cover Image</label>
                    <input type="file" name="cover_image" class="form-control" accept="image/*">
                    @if ($event->cover_image)
                        <img src="{{ media_url($event->cover_image) }}" class="img-thumbnail mt-2" style="max-height:100px">
                    @endif
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $event->description) }}</textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $event->order ?? 0) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="published" @selected(old('status', $event->status ?? 'published') === 'published')>Published</option>
                        <option value="draft" @selected(old('status', $event->status ?? '') === 'draft')>Draft</option>
                    </select>
                </div>
            </div>
        </div>

        @if ($event->exists)
            <div class="card mb-4">
                <div class="card-header">Existing Photos</div>
                <div class="card-body">
                    <div class="row g-3">
                        @forelse ($event->photos as $photo)
                            <div class="col-md-2 col-4 text-center">
                                <img src="{{ media_url($photo->image) }}" class="img-thumbnail mb-1" style="max-height:100px">
                                <form action="{{ route('admin.car-club-events.photos.destroy', $photo) }}" method="POST" onsubmit="return confirm('Remove this photo?');">
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
        <a href="{{ route('admin.car-club-events.index') }}" class="btn btn-link">Cancel</a>
    </form>
@endsection
