@extends('admin.layouts.admin')

@section('title', $navItem->exists ? 'Edit Nav Item' : 'Add Nav Item')

@section('content')
    <h1 class="h4 mb-4">{{ $navItem->exists ? 'Edit Nav Item' : 'Add Nav Item' }}</h1>

    <form method="POST" action="{{ $navItem->exists ? route('admin.nav-items.update', $navItem) : route('admin.nav-items.store') }}">
        @csrf
        @if ($navItem->exists) @method('PUT') @endif

        <div class="card mb-4">
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Menu</label>
                    <select name="menu" class="form-select">
                        @foreach ($menus as $menu)
                            <option value="{{ $menu }}" @selected(old('menu', $navItem->menu) === $menu)>{{ $menu }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Parent (leave blank for a top-level item)</label>
                    <select name="parent_id" class="form-select">
                        <option value="">— None —</option>
                        @foreach ($parents as $parent)
                            <option value="{{ $parent->id }}" @selected((string) old('parent_id', $navItem->parent_id) === (string) $parent->id)>{{ $parent->label }} ({{ $parent->menu }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Label</label>
                    <input type="text" name="label" class="form-control" value="{{ old('label', $navItem->label) }}" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $navItem->order ?? 0) }}">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <div class="form-check">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active" @checked(old('is_active', $navItem->is_active ?? true))>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Route Name (takes priority over URL if valid)</label>
                    <input type="text" name="route_name" class="form-control" list="routeNamesList" value="{{ old('route_name', $navItem->route_name) }}">
                    <datalist id="routeNamesList">
                        @foreach ($routeNames as $name)
                            <option value="{{ $name }}">
                        @endforeach
                    </datalist>
                </div>
                <div class="col-md-6">
                    <label class="form-label">URL (used when Route Name is blank or invalid — use "#" for a placeholder link)</label>
                    <input type="text" name="url" class="form-control" value="{{ old('url', $navItem->url) }}">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.nav-items.index') }}" class="btn btn-link">Cancel</a>
    </form>
@endsection
