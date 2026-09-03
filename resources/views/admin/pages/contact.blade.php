@extends('admin.layouts.admin')

@section('title', 'Contact Page')

@section('content')
    <h1 class="h4 mb-4">Contact Page</h1>

    <form method="POST" action="{{ route('admin.pages.contact.update') }}">
        @csrf @method('PUT')

        <div class="card mb-4">
            <div class="card-header">Contact Channels</div>
            <div class="card-body row g-3">
                <div class="col-12">
                    <label class="form-label">Intro Text</label>
                    <textarea name="intro_text" class="form-control" rows="3">{{ old('intro_text', $page->intro_text) }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Shipping / Mailing Address</label>
                    <textarea name="shipping_address" class="form-control" rows="3">{{ old('shipping_address', $page->shipping_address) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Ordering Phone</label>
                    <input type="text" name="ordering_phone" class="form-control" value="{{ old('ordering_phone', $page->ordering_phone) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Ordering Email</label>
                    <input type="text" name="ordering_email" class="form-control" value="{{ old('ordering_email', $page->ordering_email) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tech Support Phone</label>
                    <input type="text" name="tech_phone" class="form-control" value="{{ old('tech_phone', $page->tech_phone) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tech Support Email</label>
                    <input type="text" name="tech_email" class="form-control" value="{{ old('tech_email', $page->tech_email) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Dealer Phone</label>
                    <input type="text" name="dealer_phone" class="form-control" value="{{ old('dealer_phone', $page->dealer_phone) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Dealer Email</label>
                    <input type="text" name="dealer_email" class="form-control" value="{{ old('dealer_email', $page->dealer_email) }}">
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
