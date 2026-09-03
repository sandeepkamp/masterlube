@extends('admin.layouts.admin')

@section('title', 'Prelube Page')

@section('content')
    <h1 class="h4 mb-4">Pre Lubrication System Page</h1>

    <form method="POST" action="{{ route('admin.pages.prelube.update') }}" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="card mb-4">
            <div class="card-body row g-3">
                <div class="col-12">
                    <label class="form-label">Caption</label>
                    <textarea name="caption" class="form-control" rows="2">{{ old('caption', $page->caption) }}</textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Hero Image</label>
                    <input type="file" name="hero_image" class="form-control" accept="image/*">
                    @if ($page->hero_image)
                        <img src="{{ media_url($page->hero_image) }}" class="img-thumbnail mt-2" style="max-height:100px">
                    @endif
                </div>
                <div class="col-md-4">
                    <label class="form-label">Gallery Image 1</label>
                    <input type="file" name="gallery_image_1" class="form-control" accept="image/*">
                    @if ($page->gallery_image_1)
                        <img src="{{ media_url($page->gallery_image_1) }}" class="img-thumbnail mt-2" style="max-height:100px">
                    @endif
                </div>
                <div class="col-md-4">
                    <label class="form-label">Gallery Image 2</label>
                    <input type="file" name="gallery_image_2" class="form-control" accept="image/*">
                    @if ($page->gallery_image_2)
                        <img src="{{ media_url($page->gallery_image_2) }}" class="img-thumbnail mt-2" style="max-height:100px">
                    @endif
                </div>
                <div class="col-md-6">
                    <label class="form-label">Benefit 1 Text</label>
                    <input type="text" name="benefit_1_text" class="form-control" value="{{ old('benefit_1_text', $page->benefit_1_text) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Benefit 2 Text</label>
                    <input type="text" name="benefit_2_text" class="form-control" value="{{ old('benefit_2_text', $page->benefit_2_text) }}">
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
    </form>
@endsection
