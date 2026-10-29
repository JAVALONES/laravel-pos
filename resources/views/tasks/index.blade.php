@extends('layouts.app')

@section('content')
    <h1>All Tasks</h1>

    @if($tasks->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ ucfirst($task->status) }}</td>
                        <td>{{ \Carbon\Carbon::parse($task->task_date)->format('F j, Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No tasks found.</p>
    @endif
@endsection
