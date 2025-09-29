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
        Schema::create('scans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('qr_code_id')->constrained()->onDelete('cascade');
            $table->string('ip', 45); // IPv6 compatible
            $table->string('user_agent', 255)->nullable();
            $table->string('referrer', 255)->nullable();
            $table->timestamps();
            
            $table->index(['qr_code_id', 'created_at']);
            $table->index('ip');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scans');
    }
};
