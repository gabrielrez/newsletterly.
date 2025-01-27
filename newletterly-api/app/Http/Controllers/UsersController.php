<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required',
            'password' => 'required'
        ]);

        return User::create($fields);
    }

    public function show(User $user)
    {
        return $user;
    }
}
