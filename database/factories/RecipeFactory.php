<?php

namespace Database\Factories;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Recipe::class;

    public function definition(): array
    {
        return [
            'RecipeName' => fake()->name(),
            'Ingredients' => fake()->words($nb = 5, $asText = true),
            'Steps' => fake()->sentences($nb = 3, $asText = true),
            'CategoryId' => rand(1, 3),
            // 'DishImage' => fake()->image(), 
        ];
    }
}
