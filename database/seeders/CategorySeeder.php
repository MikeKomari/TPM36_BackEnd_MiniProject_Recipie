<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(["CategoryType" => "Appetizer", 'created_at' => now(), 'updated_at' => now()]);
        Category::create(["CategoryType" => "Main Course", 'created_at' => now(), 'updated_at' => now() ]);
        Category::create(["CategoryType" => "Dessert", 'created_at' => now(), 'updated_at' => now() ]);
    }
}
