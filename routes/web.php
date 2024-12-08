<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\RecipeController;
use App\Http\Middleware\isLogin;
use Illuminate\Support\Facades\Auth;
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
Route::get('/recipes/create', [RecipeController::class, 'getCreateRecipes'])->name('getCreateRecipes')->middleware(isLogin::class);
Route::post('/recipes/store', [RecipeController::class, 'getStoreRecipes'])->name('getStoreRecipes');

// Update
Route::get('/recipes/edit/{recipeId}', [RecipeController::class, 'getEditRecipePage'])->name('getEditRecipePage');
Route::post('/recipes/edit/{recipeId}', [RecipeController::class, 'editRecipe'])->name('editRecipe');

//Delete
Route::post('/recipes/delete/{recipeId}', [RecipeController::class, 'deleteRecipe'])->name('deleteRecipe');

// API
Route::get('/recipes/api', [RecipeController::class, 'recipesAPI'])->name('recipesAPI'); 


//AUTH
Route::get('/register', [AuthenticationController::class, 'getRegister'])->name('getRegister');
Route::post('/register', [AuthenticationController::class, 'register'])->name('register');
Route::get('/login', [AuthenticationController::class, 'getLogin'])->name('getLogin');
Route::post('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

//Sending Email
Route::get('/send-email/{email}', [EmailController::class, 'sendEmail'])->name('sendEmail');