<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewslettersController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    // Users
    Route::get('/user', [UsersController::class, 'getAuthenticatedUser']);

    // Newsletters
    Route::resource('newsletters', NewslettersController::class)->only([
        'index',    // GET     /newsletters
        'show',     // GET     /newsletters/{id}
        'store',    // POST    /newsletters
        'destroy',  // DELETE  /newsletters/{id}
    ]);
});
