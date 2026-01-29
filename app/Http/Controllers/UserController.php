<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::all();
        return Inertia::render('User/UserIndex', [
            'users' => $users
        ]);
    }
}
