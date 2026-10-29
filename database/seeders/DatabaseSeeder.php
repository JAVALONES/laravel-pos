<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Exactly one user record
        User::insert([
            'username' => 'valon',
            'full_name' => 'Joseph Victor A. Valones',
            'email' => 'valon@example.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        $lastWeek = Carbon::now()->subWeek();

        // At least 8 tasks spanning at least 3 different dates, including today
        Task::insert([
            [
                'title' => 'Complete TSA3 Laravel implementation',
                'status' => 'pending',
                'task_date' => $today,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Review TFA6 Eloquent code',
                'status' => 'completed',
                'task_date' => $today,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Deploy to Byet.host',
                'status' => 'pending',
                'task_date' => $today,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Push TFA6 to GitHub',
                'status' => 'completed',
                'task_date' => $yesterday,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Fix Laravel bootstrap on shared hosting',
                'status' => 'pending',
                'task_date' => $yesterday,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Create TSA3 migrations and models',
                'status' => 'completed',
                'task_date' => $yesterday,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Update documentation for TSA3',
                'status' => 'pending',
                'task_date' => $lastWeek,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Test Eloquent queries and date filtering',
                'status' => 'completed',
                'task_date' => $lastWeek,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Prepare submission links',
                'status' => 'pending',
                'task_date' => $lastWeek,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
