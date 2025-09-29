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
        Schema::create('winners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('qr_code_id')->constrained()->onDelete('cascade');
            $table->foreignId('entry_id')->nullable()->constrained()->nullOnDelete(); // if choosing a specific person
            $table->foreignId('prize_id')->constrained()->onDelete('cascade');
            $table->timestamp('announced_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            
            $table->index(['qr_code_id', 'prize_id']);
            $table->index('announced_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('winners');
    }
};
