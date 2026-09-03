@extends('admin.layouts.admin')

@section('title', 'Accessories')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0">Accessories</h1>
        <a href="{{ route('admin.accessories.create') }}" class="btn btn-primary btn-sm">Add Accessory</a>
    </div>

    <div class="card">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Name</th>
                    <th>Custom Hose Featured</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accessories as $accessory)
                    <tr>
                        <td>{{ $accessory->order }}</td>
                        <td>{{ $accessory->name }}</td>
                        <td>@if ($accessory->is_featured_on_custom_hose)<span class="badge bg-warning text-dark">Featured</span>@endif</td>
                        <td><span class="badge {{ $accessory->status === 'published' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($accessory->status) }}</span></td>
                        <td class="text-end">
                            <a href="{{ route('admin.accessories.edit', $accessory) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.accessories.destroy', $accessory) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this accessory?');">
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
