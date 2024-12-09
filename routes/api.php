<?php

use App\Http\Controllers\AuthenticationAPIController;
use App\Http\Controllers\RecipeAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//CRUD WITH API
Route::get('/get-recipes', [RecipeAPIController::class, 'getRecipes']);
Route::post('/create-recipes', [RecipeAPIController::class, 'createRecipeAPI']);
Route::post('/update-recipes/{recipeId}', [RecipeAPIController::class, 'updateRecipeAPI']);
Route::post('/delete-recipes/{recipeId}', [RecipeAPIController::class, 'deleteRecipeAPI']);

Route::post('/register', [AuthenticationAPIController::class, 'register']);
Route::post('/login', [AuthenticationAPIController::class, 'login']);
Route::post('/logout', [AuthenticationAPIController::class, 'logout'])->middleware('auth:sanctum');