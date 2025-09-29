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
        Schema::create('prizes', function (Blueprint $table) {
            $table->id();
            $table->string('title', 120);
            $table->text('description')->nullable();
            $table->string('sponsor', 120)->nullable();
            $table->decimal('value_amount', 10, 2)->nullable();
            $table->char('value_currency', 3)->default('MVR');
            $table->enum('status', ['draft', 'active', 'awarded', 'archived'])->default('active');
            $table->timestamps();
            
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prizes');
    }
};
