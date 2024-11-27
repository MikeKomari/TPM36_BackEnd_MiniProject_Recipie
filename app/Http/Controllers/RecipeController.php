<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    function getHome(){
        return view('home');
    }
    
    function getCreateRecipes(){
        $recipes = Recipe::all();
        $categories = Category::all();
        return view('recipes.create', compact("recipes",'categories'));
    }

    function getStoreRecipes(Request $request){
        $request->validate([
            'RecipeName' => 'required',
            'Ingredients' => 'required',
            'Steps' => 'required',
            'CategoryId' => 'required|exists:categories,id',
            
        ],[
            "RecipeName.required" => "Recipe is required",
            "Ingredients.required" => "Ingredients is required",
            "Steps" => "Steps on how to cook is required",
            "CategoryId.required" => "Category is required"
        ]);
    
        Recipe::create([
            "RecipeName" => $request->RecipeName,
            "Ingredients" => $request->Ingredients,
            "Steps" => $request->Steps,
            "CategoryId" => $request->CategoryId
        ]);
        return redirect()->route('getCreateRecipes');
    }
}
