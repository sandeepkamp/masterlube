@extends('admin.layouts.admin')

@section('title', 'News')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0">News</h1>
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary btn-sm">Add News Item</a>
    </div>

    <div class="card">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Badge</th>
                    <th>Published</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->badge }}</td>
                        <td>{{ $item->published_at?->format('M j, Y') }}</td>
                        <td><span class="badge {{ $item->status === 'published' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($item->status) }}</span></td>
                        <td class="text-end">
                            <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.news.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this news item?');">
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
