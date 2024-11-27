<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RecipeController::class, 'getHome'])->name('home');
Route::get('/recipes/create', [RecipeController::class, 'getCreateRecipes'])->name('getCreateRecipes');
Route::post('/recipes/store', [RecipeController::class, 'getStoreRecipes'])->name('getStoreRecipes');