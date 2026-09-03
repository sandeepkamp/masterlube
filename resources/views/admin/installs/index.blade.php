@extends('admin.layouts.admin')

@section('title', 'Install Gallery')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0">Install Gallery</h1>
        <a href="{{ route('admin.installs.create') }}" class="btn btn-primary btn-sm">Add Install</a>
    </div>

    <div class="card">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Title</th>
                    <th>Photos</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($installs as $install)
                    <tr>
                        <td>{{ $install->order }}</td>
                        <td>{{ $install->title }}</td>
                        <td>{{ $install->photos_count }}</td>
                        <td><span class="badge {{ $install->status === 'published' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($install->status) }}</span></td>
                        <td class="text-end">
                            <a href="{{ route('admin.installs.edit', $install) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.installs.destroy', $install) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this install and all its photos?');">
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
