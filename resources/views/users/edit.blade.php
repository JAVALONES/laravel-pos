@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h2>Edit User</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $user->username) }}" required>
            </div>
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" name="full_name" id="full_name" class="form-control" value="{{ old('full_name', $user->full_name) }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>
            @if($user->avatar && Storage::disk('public')->exists($user->avatar))
                <div class="form-group">
                    <label>Current Avatar</label>
                    <img src="{{ Storage::disk('public')->url($user->avatar) }}" width="100" height="100" class="rounded-circle mt-2">
                </div>
            @else
                <div class="form-group">
                    <label>Current Avatar</label>
                    <img src="https://via.placeholder.com/100" width="100" height="100" class="rounded-circle text-muted mt-2">
                </div>
            @endif
            <div class="form-group">
                <label for="avatar">Profile Picture (max 2MB, image only)</label>
                <input type="file" name="avatar" id="avatar" class="form-control-file" accept="image/*">
                <small class="form-text text-muted">Leave empty to keep current avatar.</small>
            </div>
            <button type="submit" class="btn btn-primary">Update User</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection