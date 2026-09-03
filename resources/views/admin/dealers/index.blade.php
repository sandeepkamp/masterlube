@extends('admin.layouts.admin')

@section('title', 'Dealers')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0">Dealers</h1>
        <a href="{{ route('admin.dealers.create') }}" class="btn btn-primary btn-sm">Add Dealer</a>
    </div>

    <div class="card">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>URL</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dealers as $dealer)
                    <tr>
                        <td>{{ $dealer->name }}</td>
                        <td><a href="{{ $dealer->url }}" target="_blank">{{ $dealer->url }}</a></td>
                        <td><span class="badge {{ $dealer->status === 'published' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($dealer->status) }}</span></td>
                        <td class="text-end">
                            <a href="{{ route('admin.dealers.edit', $dealer) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.dealers.destroy', $dealer) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this dealer?');">
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
