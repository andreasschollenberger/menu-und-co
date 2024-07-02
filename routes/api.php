<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\User;

use App\Http\Controllers\TokenController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipesController; // Import the RecipesController class

Route::post('/sanctum/token', TokenController::class);


/**
 * AUTH ROUTES
 */
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users/auth', [UserController::class, 'show']);
});

Route::post('/auth/register', [UserController::class, 'register']);

Route::get('/recipes', [RecipesController::class, 'index']);

Route::post('/recipes', [RecipesController::class, 'store']);

Route::get('/recipes/{id}', [RecipesController::class, 'show']);

