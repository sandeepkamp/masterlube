@extends('admin.layouts.admin')

@section('title', 'Magazines')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0">Magazines</h1>
        <a href="{{ route('admin.magazines.create') }}" class="btn btn-primary btn-sm">Add Magazine</a>
    </div>

    <div class="card">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Title</th>
                    <th>Pages</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($magazines as $magazine)
                    <tr>
                        <td>{{ $magazine->order }}</td>
                        <td>{{ $magazine->title }}</td>
                        <td>{{ $magazine->pages_count }}</td>
                        <td><span class="badge {{ $magazine->status === 'published' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($magazine->status) }}</span></td>
                        <td class="text-end">
                            <a href="{{ route('admin.magazines.edit', $magazine) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.magazines.destroy', $magazine) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this magazine and all its pages?');">
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
