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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100); // e.g., "Wheel Spinner", "Match 3", "Memory Game"
            $table->string('slug', 50)->unique(); // e.g., "wheel-spinner", "match-3"
            $table->text('description')->nullable();
            $table->string('icon', 50)->nullable(); // emoji or icon class
            $table->enum('type', ['wheel', 'puzzle', 'memory', 'trivia', 'arcade']); // game category
            $table->json('config')->nullable(); // game-specific configuration
            $table->boolean('is_active')->default(true);
            $table->integer('difficulty_level')->default(1); // 1-5 difficulty
            $table->integer('max_attempts')->default(3); // max attempts per session
            $table->integer('time_limit')->nullable(); // time limit in seconds
            $table->integer('min_score')->nullable(); // minimum score to qualify for prizes
            $table->timestamps();
            
            $table->index(['is_active', 'type']);
            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};