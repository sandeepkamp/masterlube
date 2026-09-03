@extends('admin.layouts.admin')

@section('title', 'CMS Pages')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0">CMS Pages</h1>
        <a href="{{ route('admin.cms-pages.create') }}" class="btn btn-primary btn-sm">Add Page</a>
    </div>

    <div class="card">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                    <tr>
                        <td>{{ $page->title }}</td>
                        <td><code>/{{ $page->slug }}</code></td>
                        <td><span class="badge {{ $page->status === 'published' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($page->status) }}</span></td>
                        <td class="text-end">
                            <a href="{{ route('cms.show', $page) }}" target="_blank" class="btn btn-sm btn-outline-secondary">View</a>
                            <a href="{{ route('admin.cms-pages.edit', $page) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.cms-pages.destroy', $page) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this page?');">
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
