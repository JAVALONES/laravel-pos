<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::insert([
            ['username' => 'admin', 'full_name' => 'Admin User', 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'cashier1', 'full_name' => 'Cashier One', 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'cashier2', 'full_name' => 'Cashier Two', 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'inventory', 'full_name' => 'Inventory Staff', 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'manager', 'full_name' => 'Manager User', 'created_at' => now(), 'updated_at' => now()],
        ]);

        Customer::insert([
            ['full_name' => 'Juan Dela Cruz', 'email' => 'juan@example.com', 'phone' => '09171234567', 'created_at' => now(), 'updated_at' => now()],
            ['full_name' => 'Maria Santos', 'email' => 'maria@example.com', 'phone' => '09181234567', 'created_at' => now(), 'updated_at' => now()],
            ['full_name' => 'Carlo Reyes', 'email' => 'carlo@example.com', 'phone' => '09191234567', 'created_at' => now(), 'updated_at' => now()],
            ['full_name' => 'Anne Cruz', 'email' => 'anne@example.com', 'phone' => '09201234567', 'created_at' => now(), 'updated_at' => now()],
            ['full_name' => 'Mark Garcia', 'email' => 'mark@example.com', 'phone' => '09211234567', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
