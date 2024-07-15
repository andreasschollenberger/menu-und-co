<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\User;

use App\Http\Controllers\TokenController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipesController; // Import the RecipesController class
use App\Http\Controllers\RecipesGroupsController; // Import the RecipesGroupsController class

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

Route::get('/recipes/groups', [RecipesGroupsController::class, 'index']);
Route::middleware(['auth:sanctum'])->group(function () {
});

Route::post('/recipes/groups', [RecipesGroupsController::class, 'store']);

Route::get('/recipes/groups/{id}', [RecipesGroupsController::class, 'show']);

Route::put('/recipes/groups/{id}', [RecipesGroupsController::class, 'update']);

Route::delete('/recipes/groups/{id}', [RecipesGroupsController::class, 'destroy']);