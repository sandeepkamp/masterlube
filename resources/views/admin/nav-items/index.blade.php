@extends('admin.layouts.admin')

@section('title', 'Navigation')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0">Navigation</h1>
        <a href="{{ route('admin.nav-items.create') }}" class="btn btn-primary btn-sm">Add Nav Item</a>
    </div>

    @php
        $menuLabels = [
            'header' => 'Header',
            'footer_products' => 'Footer — Products',
            'footer_company' => 'Footer — Company',
            'footer_connect' => 'Footer — Connect',
        ];
    @endphp

    @foreach ($menus as $menu)
        <div class="card mb-4">
            <div class="card-header">{{ $menuLabels[$menu] }}</div>
            <table class="table table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Label</th>
                        <th>Target</th>
                        <th>Active</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse (($items[$menu] ?? []) as $item)
                        <tr>
                            <td>{{ $item->order }}</td>
                            <td>{{ $item->label }}</td>
                            <td><code>{{ $item->route_name ?: ($item->url ?: '#') }}</code></td>
                            <td>{!! $item->is_active ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>' !!}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.nav-items.edit', $item) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{ route('admin.nav-items.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this nav item and any submenu items under it?');">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @foreach ($item->allChildren as $child)
                            <tr>
                                <td>{{ $child->order }}</td>
                                <td class="ps-4">— {{ $child->label }}</td>
                                <td><code>{{ $child->route_name ?: ($child->url ?: '#') }}</code></td>
                                <td>{!! $child->is_active ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>' !!}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.nav-items.edit', $child) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                    <form action="{{ route('admin.nav-items.destroy', $child) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this nav item?');">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @empty
                        <tr><td colspan="5" class="text-muted">No items in this menu.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endforeach
@endsection
