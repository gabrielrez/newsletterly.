<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UsersController extends Controller
{
    public function getAuthenticatedUser(Request $request): JsonResponse
    {
        return response()->json($request->user());
    }
}
