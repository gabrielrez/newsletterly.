<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewslettersController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Users
Route::get('/users', [UsersController::class, 'index']);
Route::get('/users/{user}', [UsersController::class, 'show']);
Route::post('/users', [UsersController::class, 'store']);
Route::put('/users/{user}', [UsersController::class, 'update']);
Route::delete('/users/{user}', [UsersController::class, 'destroy']);

// Newsletters
Route::get('/newsletters', [NewslettersController::class, 'index']);
Route::get('/newsletters/{newsletter}', [NewslettersController::class, 'show']);
Route::post('/newsletters', [NewslettersController::class, 'store']);
Route::delete('/newsletters/{newsletter}', [NewslettersController::class, 'destroy']);
