@extends('admin.layouts.admin')

@section('title', $user->exists ? 'Edit Admin User' : 'Add Admin User')

@section('content')
    <h1 class="h4 mb-4">{{ $user->exists ? 'Edit Admin User' : 'Add Admin User' }}</h1>

    <form method="POST" action="{{ $user->exists ? route('admin.users.update', $user) : route('admin.users.store') }}">
        @csrf
        @if ($user->exists) @method('PUT') @endif

        <div class="card mb-4">
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select">
                        @foreach (\App\Enums\UserRole::cases() as $role)
                            <option value="{{ $role->value }}" @selected(old('role', $user->role?->value) === $role->value)>{{ $role->label() }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">{{ $user->exists ? 'New Password (leave blank to keep current)' : 'Password' }}</label>
                    <input type="password" name="password" class="form-control" @if (!$user->exists) required @endif>
                </div>
                <div class="col-md-6 offset-md-6">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-link">Cancel</a>
    </form>
@endsection
