<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeAPIController extends Controller
{
    function getRecipes(){
        $recipes = Recipe::all();
        return response()->json([    
            'data' => $recipes,
            'status'=> 200
        ]);
    }

    function createRecipeAPI(Request $request){
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

        return response('New Recipe Inputted Successfully', 201);
    }

    function updateRecipeAPI(Request $request, $recipeId) {
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

        return response('Recipe Updated Successfully', 201);
    }

    function deleteRecipeAPI($recipeId){
        $recipe = Recipe::findOrFail($recipeId);
        Recipe::destroy($recipeId);
        return response('Recipe Deleted Successfully', 201);
    }
}
