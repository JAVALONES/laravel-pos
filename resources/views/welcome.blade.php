@extends('layouts.app')

@section('content')
    <h1>Tasks for Today</h1>

    <p>Here are your tasks for <strong>{{ $today->format('F j, Y') }}</strong>.</p>

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
        <p>No tasks for today.</p>
    @endif
@endsection
