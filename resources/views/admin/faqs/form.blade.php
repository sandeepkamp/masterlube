@extends('admin.layouts.admin')

@section('title', $faq->exists ? 'Edit FAQ' : 'Add FAQ')

@section('content')
    <h1 class="h4 mb-4">{{ $faq->exists ? 'Edit FAQ' : 'Add FAQ' }}</h1>

    <form method="POST" action="{{ $faq->exists ? route('admin.faqs.update', $faq) : route('admin.faqs.store') }}">
        @csrf
        @if ($faq->exists) @method('PUT') @endif

        <div class="card">
            <div class="card-body row g-3">
                <div class="col-12">
                    <label class="form-label">Question</label>
                    <input type="text" name="question" class="form-control" value="{{ old('question', $faq->question) }}" required>
                </div>
                <div class="col-12">
                    <label class="form-label">Answer (blank line between paragraphs)</label>
                    <textarea name="answer" class="form-control" rows="6" required>{{ old('answer', $faq->answer) }}</textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-select">
                        @foreach (['general' => 'General (faq.html)', 'masterlube' => 'MasterLube Kits', 'turbolube' => 'TurboLube Kits', 'quick_connect' => 'TurboLube "Quick" Kits', 'commercial' => 'Commercial Kits'] as $value => $label)
                            <option value="{{ $value }}" @selected(old('category', $faq->category ?? 'general') === $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $faq->order ?? 0) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="published" @selected(old('status', $faq->status ?? 'published') === 'published')>Published</option>
                        <option value="draft" @selected(old('status', $faq->status ?? '') === 'draft')>Draft</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
        <a href="{{ route('admin.faqs.index') }}" class="btn btn-link mt-3">Cancel</a>
    </form>
@endsection
