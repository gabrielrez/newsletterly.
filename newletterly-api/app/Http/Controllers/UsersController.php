<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getAuthenticatedUser(Request $request)
    {
        return response()->json($request->user());
    }
}
