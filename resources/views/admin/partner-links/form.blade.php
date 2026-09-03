@extends('admin.layouts.admin')

@section('title', $link->exists ? 'Edit Partner Link' : 'Add Partner Link')

@section('content')
    <h1 class="h4 mb-4">{{ $link->exists ? 'Edit Partner Link' : 'Add Partner Link' }}</h1>

    <form method="POST" action="{{ $link->exists ? route('admin.partner-links.update', $link) : route('admin.partner-links.store') }}" enctype="multipart/form-data">
        @csrf
        @if ($link->exists) @method('PUT') @endif

        <div class="card">
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Label</label>
                    <input type="text" name="label" class="form-control" value="{{ old('label', $link->label) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">URL</label>
                    <input type="url" name="url" class="form-control" value="{{ old('url', $link->url) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Logo Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    @if ($link->image)
                        <img src="{{ media_url($link->image) }}" class="img-thumbnail mt-2" style="max-height:100px">
                    @endif
                </div>
                <div class="col-md-4">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $link->order ?? 0) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="published" @selected(old('status', $link->status ?? 'published') === 'published')>Published</option>
                        <option value="draft" @selected(old('status', $link->status ?? '') === 'draft')>Draft</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
        <a href="{{ route('admin.partner-links.index') }}" class="btn btn-link mt-3">Cancel</a>
    </form>
@endsection
