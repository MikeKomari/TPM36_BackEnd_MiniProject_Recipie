<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::get('/private-file/{filename}', function ($filename) {
    $path = storage_path('app/private/public/' . $filename);

    // Check if file exists
    if (!file_exists($path)) {
        abort(404, 'File not found');
    }

    // Return the file
    return response()->file($path);
});

Route::get('/', [RecipeController::class, 'getHome'])->name('home');
Route::get('/recipes', [RecipeController::class, 'getRecipesView'])->name('recipe');
Route::get('/recipes/create', [RecipeController::class, 'getCreateRecipes'])->name('getCreateRecipes');
Route::post('/recipes/store', [RecipeController::class, 'getStoreRecipes'])->name('getStoreRecipes');

// Update
Route::get('/recipes/edit/{recipeId}', [RecipeController::class, 'getEditRecipePage'])->name('getEditRecipePage');
Route::post('/recipes/edit/{recipeId}', [RecipeController::class, 'editRecipe'])->name('editRecipe');

//Delete
Route::post('/recipes/delete/{recipeId}', [RecipeController::class, 'deleteRecipe'])->name('deleteRecipe');