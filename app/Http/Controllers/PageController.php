<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;

class PageController extends Controller
{
    public function home()
    {
        $today = Carbon::today();
        $tasks = Task::whereDate('task_date', $today)->get();

        return view('welcome', compact('tasks', 'today'));
    }

    public function about()
    {
        return view('about');
    }
}