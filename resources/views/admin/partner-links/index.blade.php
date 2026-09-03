@extends('admin.layouts.admin')

@section('title', 'Partner Links')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0">Partner Links</h1>
        <a href="{{ route('admin.partner-links.create') }}" class="btn btn-primary btn-sm">Add Link</a>
    </div>

    <div class="card">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Label</th>
                    <th>URL</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($links as $link)
                    <tr>
                        <td>{{ $link->order }}</td>
                        <td>{{ $link->label }}</td>
                        <td><a href="{{ $link->url }}" target="_blank">{{ $link->url }}</a></td>
                        <td><span class="badge {{ $link->status === 'published' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($link->status) }}</span></td>
                        <td class="text-end">
                            <a href="{{ route('admin.partner-links.edit', $link) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.partner-links.destroy', $link) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this link?');">
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
