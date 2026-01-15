<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // SELECT * FROM users
        return view('users.index', compact('users'));
    }
}
