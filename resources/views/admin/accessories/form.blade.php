@extends('admin.layouts.admin')

@section('title', $accessory->exists ? 'Edit Accessory' : 'Add Accessory')

@section('content')
    <h1 class="h4 mb-4">{{ $accessory->exists ? 'Edit Accessory' : 'Add Accessory' }}</h1>

    <form method="POST" action="{{ $accessory->exists ? route('admin.accessories.update', $accessory) : route('admin.accessories.store') }}" enctype="multipart/form-data">
        @csrf
        @if ($accessory->exists) @method('PUT') @endif

        <div class="card">
            <div class="card-body row g-3">
                <div class="col-md-8">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $accessory->name) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    @if ($accessory->image)
                        <img src="{{ media_url($accessory->image) }}" class="img-thumbnail mt-2" style="max-height:100px">
                    @endif
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="5">{{ old('description', $accessory->description) }}</textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $accessory->order ?? 0) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="published" @selected(old('status', $accessory->status ?? 'published') === 'published')>Published</option>
                        <option value="draft" @selected(old('status', $accessory->status ?? '') === 'draft')>Draft</option>
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <div class="form-check">
                        <input type="checkbox" name="is_featured_on_custom_hose" value="1" class="form-check-input" id="featured" @checked(old('is_featured_on_custom_hose', $accessory->is_featured_on_custom_hose))>
                        <label class="form-check-label" for="featured">Featured on Custom Hose page</label>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
        <a href="{{ route('admin.accessories.index') }}" class="btn btn-link mt-3">Cancel</a>
    </form>
@endsection
