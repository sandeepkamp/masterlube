@extends('admin.layouts.admin')

@section('title', 'Testimonials')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0">Testimonials</h1>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary btn-sm">Add Testimonial</a>
    </div>

    <div class="card">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th>Author</th>
                    <th>Quote</th>
                    <th>Featured</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($testimonials as $testimonial)
                    <tr>
                        <td>{{ $testimonial->author_name }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($testimonial->quote, 80) }}</td>
                        <td>@if ($testimonial->is_featured)<span class="badge bg-warning text-dark">Featured</span>@endif</td>
                        <td><span class="badge {{ $testimonial->status === 'published' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($testimonial->status) }}</span></td>
                        <td class="text-end">
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this testimonial?');">
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
