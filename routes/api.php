<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\User;

use App\Http\Controllers\TokenController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipesController; // Import the RecipesController class
use App\Http\Controllers\RecipesGroupsController; // Import the RecipesGroupsController class
use App\Http\Controllers\DishController; // Import the DishController class
use App\Http\Controllers\CountryController;
use App\Http\Controllers\AllergyController; // Import the AllergyController class
use App\Http\Controllers\VitaminController;


Route::post('/sanctum/token', TokenController::class);




/**
 * AUTH ROUTES
 */
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users/auth', [UserController::class, 'show']);
    Route::get('/users/auth/recipes', [UserController::class, 'recipes']);
});

Route::get('/users/{user_id}/recipes', [UserController::class, 'getRecipesByUserId']);
Route::post('/auth/register', [UserController::class, 'register']);




Route::get('/recipes/groups/{id}', [RecipesGroupsController::class, 'show']);

Route::put('/recipes/groups/{id}', [RecipesGroupsController::class, 'update']);

Route::delete('/recipes/groups/{id}', [RecipesGroupsController::class, 'destroy']);
Route::get('/recipes/groups', [RecipesGroupsController::class, 'index']);


Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/recipes', [RecipesController::class, 'store']);

    Route::post('/recipes/groups', [RecipesGroupsController::class, 'store']);
});
Route::get('/recipes', [RecipesController::class, 'index']);
Route::get('/recipes/{id}', [RecipesController::class, 'show']);


Route::get('/dishes', [DishController::class, 'index']);
Route::get('/countries', [CountryController::class, 'index']);

Route::get('/allergies', [AllergyController::class, 'index']);
Route::get('/vitamins', [VitaminController::class, 'index']);


