@extends('admin.layouts.admin')

@section('title', $testimonial->exists ? 'Edit Testimonial' : 'Add Testimonial')

@section('content')
    <h1 class="h4 mb-4">{{ $testimonial->exists ? 'Edit Testimonial' : 'Add Testimonial' }}</h1>

    <form method="POST" action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}">
        @csrf
        @if ($testimonial->exists) @method('PUT') @endif

        <div class="card">
            <div class="card-body row g-3">
                <div class="col-12">
                    <label class="form-label">Quote</label>
                    <textarea name="quote" class="form-control" rows="4" required>{{ old('quote', $testimonial->quote) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Author Name</label>
                    <input type="text" name="author_name" class="form-control" value="{{ old('author_name', $testimonial->author_name) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Author Role (optional)</label>
                    <input type="text" name="author_role" class="form-control" value="{{ old('author_role', $testimonial->author_role) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $testimonial->order ?? 0) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="published" @selected(old('status', $testimonial->status ?? 'published') === 'published')>Published</option>
                        <option value="draft" @selected(old('status', $testimonial->status ?? '') === 'draft')>Draft</option>
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <div class="form-check">
                        <input type="checkbox" name="is_featured" value="1" class="form-check-input" id="is_featured" @checked(old('is_featured', $testimonial->is_featured))>
                        <label class="form-check-label" for="is_featured">Featured (shown on Home / Our Advantages)</label>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-link mt-3">Cancel</a>
    </form>
@endsection
