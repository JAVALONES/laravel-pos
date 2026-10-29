<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('task_date', 'asc')->get();

        return view('tasks.index', compact('tasks'));
    }
}
