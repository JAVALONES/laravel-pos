<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Admin User',
                'email' => 'admin@laravelpos.com',
                'role' => 'Administrator',
            ],
            [
                'id' => 2,
                'name' => 'Cashier One',
                'email' => 'cashier1@laravelpos.com',
                'role' => 'Cashier',
            ],
            [
                'id' => 3,
                'name' => 'Cashier Two',
                'email' => 'cashier2@laravelpos.com',
                'role' => 'Cashier',
            ],
            [
                'id' => 4,
                'name' => 'Inventory Staff',
                'email' => 'inventory@laravelpos.com',
                'role' => 'Inventory Staff',
            ],
            [
                'id' => 5,
                'name' => 'Manager User',
                'email' => 'manager@laravelpos.com',
                'role' => 'Manager',
            ],
        ];

        return view('users.index', compact('users'));
    }
}