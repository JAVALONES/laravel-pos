<?php

namespace App\Http\Controllers;

use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        $user = User::first();

        return view('profile.show', compact('user'));
    }
}
