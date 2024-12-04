<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RecipeController extends Controller
{
    function getHome(){
        return view('home');
    }

    function getRecipesView(){
        $recipes = Recipe::all();
        $categories = Category::all();
        return view('recipe', compact("recipes",'categories'));
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
            'RecipeImage' => 'required'
        ],[
            "RecipeName.required" => "Recipe is required",
            "Ingredients.required" => "Ingredients is required",
            "Steps" => "Steps on how to cook is required",
            "CategoryId.required" => "Category is required",
            "RecipeImage.required"=>"Pe gambar pls"
        ]);

        $now = now()->format('Y-m-d_H.i.s');
        $filename = $now.'_'.$request->file('RecipeImage')->getClientOriginalName();
        $request->file('RecipeImage')->storeAs('public', $filename);
    
        Recipe::create([
            "RecipeName" => $request->RecipeName,
            "Ingredients" => $request->Ingredients,
            "Steps" => $request->Steps,
            "CategoryId" => $request->CategoryId,
            "RecipeImage" => $filename,
        ]);

        // return response()->json(['message' => 'Request reached the controller', 'data' => $request->all()]);
        return redirect()->route('getCreateRecipes');
    }

    //Update
    function getEditRecipePage($recipeId){
        $recipe = Recipe::findOrFail($recipeId);
        $categories = Category::all();
        return view('recipes.edit', compact("recipe",'categories'));
    }

    function editRecipe(Request $request, $recipeId) {
        $request->validate([
            'RecipeName' => 'required',
            'Ingredients' => 'required',
            'Steps' => 'required',
            'CategoryId' => 'required|exists:categories,id',
            'RecipeImage' => 'required'
        ],[
            "RecipeName.required" => "Recipe is required",
            "Ingredients.required" => "Ingredients is required",
            "Steps" => "Steps on how to cook is required",
            "CategoryId.required" => "Category is required",
            "RecipeImage.required"=>"Pe gambar pls"
        ]);
        $recipe = Recipe::findOrFail($recipeId);
        $now = now()->format('Y-m-d_H.i.s');
        $filename = $now.'_'.$request->file('RecipeImage')->getClientOriginalName();
        $request->file('RecipeImage')->storeAs('public', $filename);

        $recipe->update([
            "RecipeName" => $request->RecipeName,
            "Ingredients" => $request->Ingredients,
            "Steps" => $request->Steps,
            "CategoryId" => $request->CategoryId,
            "RecipeImage" => $filename,
        ]);

        return redirect(route('recipe'));
    }

    //Delete
    function deleteRecipe($recipeId){
        $recipe = Recipe::findOrFail($recipeId);
        Recipe::destroy($recipeId);
        return redirect(route('recipe'));
    }
}
