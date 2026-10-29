@extends('layouts.app')

@section('content')
    <h1>My Profile</h1>

    @if($user)
        <table>
            <tbody>
                <tr>
                    <th>Username</th>
                    <td>{{ $user->username }}</td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td>{{ $user->full_name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
            </tbody>
        </table>
    @else
        <p>No user record found.</p>
    @endif
@endsection
