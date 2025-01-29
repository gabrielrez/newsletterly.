<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EditionsController;
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
    Route::get('/newsletters', [NewslettersController::class, 'index']);
    Route::get('/newsletters/{id}', [NewslettersController::class, 'show']);
    Route::post('/newsletters', [NewslettersController::class, 'store']);
    Route::delete('/newsletters/{id}', [NewslettersController::class, 'destroy']);

    // Editions
    Route::get('/editions/newsletter/{newsletter_id}', [EditionsController::class, 'index']);
    Route::get('/editions/{id}', [EditionsController::class, 'show']);
    Route::post('/editions', [EditionsController::class, 'store']);
});
