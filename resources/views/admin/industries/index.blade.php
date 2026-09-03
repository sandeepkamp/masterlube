@extends('admin.layouts.admin')

@section('title', 'Industries')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0">Industries / Applications</h1>
        <a href="{{ route('admin.industries.create') }}" class="btn btn-primary btn-sm">Add Industry</a>
    </div>

    <div class="card">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($industries as $industry)
                    <tr>
                        <td>{{ $industry->order }}</td>
                        <td>{{ $industry->name }}</td>
                        <td><code>{{ $industry->slug }}</code></td>
                        <td>
                            <span class="badge {{ $industry->status === 'published' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($industry->status) }}</span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('applications.show', $industry) }}" target="_blank" class="btn btn-sm btn-outline-secondary">View</a>
                            <a href="{{ route('admin.industries.edit', $industry) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.industries.destroy', $industry) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this industry?');">
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
