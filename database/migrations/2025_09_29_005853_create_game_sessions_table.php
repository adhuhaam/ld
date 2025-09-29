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
        Schema::create('game_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('qr_code_id')->constrained()->onDelete('cascade'); // which QR code triggered this
            $table->foreignId('game_id')->constrained()->onDelete('cascade'); // which game was played
            $table->string('session_id', 64)->unique(); // unique session identifier
            $table->string('name', 120); // player name
            $table->string('phone', 32); // player phone
            $table->boolean('consent')->default(false); // consent given
            $table->json('game_data')->nullable(); // game-specific data (scores, moves, etc.)
            $table->integer('final_score')->nullable(); // final game score
            $table->integer('attempts_used')->default(0); // how many attempts used
            $table->boolean('completed')->default(false); // game completed successfully
            $table->boolean('qualified_for_prize')->default(false); // meets prize criteria
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            
            $table->index(['qr_code_id', 'game_id']);
            $table->index(['session_id']);
            $table->index(['phone', 'game_id']);
            $table->index(['completed', 'qualified_for_prize']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_sessions');
    }
};