@extends('admin.layouts.admin')

@section('title', 'FAQs')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0">FAQs</h1>
        <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary btn-sm">Add FAQ</a>
    </div>

    <form class="mb-3" method="GET">
        <select name="category" class="form-select w-auto d-inline-block" onchange="this.form.submit()">
            <option value="">All categories</option>
            @foreach (['general' => 'General (faq.html)', 'masterlube' => 'MasterLube Kits', 'turbolube' => 'TurboLube Kits', 'quick_connect' => 'TurboLube "Quick" Kits', 'commercial' => 'Commercial Kits'] as $value => $label)
                <option value="{{ $value }}" @selected($category === $value)>{{ $label }}</option>
            @endforeach
        </select>
    </form>

    <div class="card">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Question</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($faqs as $faq)
                    <tr>
                        <td><span class="badge bg-light text-dark">{{ $faq->category }}</span></td>
                        <td>{{ \Illuminate\Support\Str::limit($faq->question, 80) }}</td>
                        <td><span class="badge {{ $faq->status === 'published' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($faq->status) }}</span></td>
                        <td class="text-end">
                            <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this FAQ?');">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
