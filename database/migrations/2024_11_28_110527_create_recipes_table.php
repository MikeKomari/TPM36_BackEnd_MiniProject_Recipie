<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('RecipeName');
            $table->text('Ingredients');
            $table->text('Steps');
            $table->foreignId('CategoryId')->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate();
        
            $table->string("RecipeImage")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
