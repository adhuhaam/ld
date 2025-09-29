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
        Schema::create('qr_codes', function (Blueprint $table) {
            $table->id();
            $table->char('code', 26)->unique(); // ULID/UUID stored; used in URL
            $table->string('lucky_id', 16)->unique(); // human short (e.g., BR-7F3K9A)
            $table->string('label', 100)->nullable(); // optional display name
            $table->string('location_hint', 120)->nullable(); // where sticker placed (admin only)
            $table->unsignedBigInteger('prize_id')->nullable();
            $table->boolean('is_winner')->default(false);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            
            $table->index(['code', 'status']);
            $table->index('lucky_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_codes');
    }
};
