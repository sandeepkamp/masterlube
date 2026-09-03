@extends('admin.layouts.admin')

@section('title', 'My Profile')

@section('content')
    <h1 class="h4 mb-4">My Profile</h1>

    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="card mb-4">
            <div class="card-header">Account</div>
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
                    <label class="form-label">Profile Image</label>
                    <input type="file" name="avatar" class="form-control" accept="image/*">
                    @if ($user->avatar)
                        <img src="{{ media_url($user->avatar) }}" class="img-thumbnail mt-2 rounded-circle" style="max-height:100px">
                    @endif
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Change Password</div>
            <div class="card-body row g-3">
                <p class="text-muted small mb-0">Leave blank to keep your current password.</p>
                <div class="col-md-6">
                    <label class="form-label">New Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Confirm New Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
