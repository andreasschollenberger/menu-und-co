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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('recipes_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->boolean('is_confirmed')->default(false);
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable();
            
            $table->json('ingredients');
            $table->json('instructions');
            $table->foreignId('dish_id')->constrained()->onDelete('cascade');
            $table->foreignId('recipes_group_id')->constrained()->onDelete('cascade');
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('allergies_recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('allergies_id')->constrained()->onDelete('cascade');
            $table->foreignId('recipe_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('vitamins_recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vitamins_id')->constrained()->onDelete('cascade');
            $table->foreignId('recipe_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
        Schema::dropIfExists('recipes_groups');
        Schema::dropIfExists('countries');
        Schema::dropIfExists('recipes');
        Schema::dropIfExists('allergies_recipes');
        Schema::dropIfExists('vitamins_recipes');
    }
};
