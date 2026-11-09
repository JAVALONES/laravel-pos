@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h2>Users</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Avatar</th>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            @if($user->avatar && Storage::disk('public')->exists($user->avatar))
                                <img src="{{ Storage::disk('public')->url($user->avatar) }}" width="50" height="50" class="rounded-circle">
                            @else
                                <img src="https://via.placeholder.com/50" width="50" height="50" class="rounded-circle text-muted">
                            @endif
                        </td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->full_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this user?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <h3>Create New User</h3>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>
    </div>
</div>
@endsection