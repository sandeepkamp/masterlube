@extends('admin.layouts.admin')

@section('title', $dealer->exists ? 'Edit Dealer' : 'Add Dealer')

@section('content')
    <h1 class="h4 mb-4">{{ $dealer->exists ? 'Edit Dealer' : 'Add Dealer' }}</h1>

    <form method="POST" action="{{ $dealer->exists ? route('admin.dealers.update', $dealer) : route('admin.dealers.store') }}" enctype="multipart/form-data">
        @csrf
        @if ($dealer->exists) @method('PUT') @endif

        <div class="card">
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $dealer->name) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Website URL</label>
                    <input type="url" name="url" class="form-control" value="{{ old('url', $dealer->url) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">City</label>
                    <input type="text" name="city" class="form-control" value="{{ old('city', $dealer->city) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">State</label>
                    <input type="text" name="state" class="form-control" value="{{ old('state', $dealer->state) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Logo Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    @if ($dealer->image)
                        <img src="{{ media_url($dealer->image) }}" class="img-thumbnail mt-2" style="max-height:100px">
                    @endif
                </div>
                <div class="col-md-4">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $dealer->order ?? 0) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="published" @selected(old('status', $dealer->status ?? 'published') === 'published')>Published</option>
                        <option value="draft" @selected(old('status', $dealer->status ?? '') === 'draft')>Draft</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
        <a href="{{ route('admin.dealers.index') }}" class="btn btn-link mt-3">Cancel</a>
    </form>
@endsection
