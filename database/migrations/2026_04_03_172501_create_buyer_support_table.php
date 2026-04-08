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
        Schema::create('buyer_support', function (Blueprint $table) {
            $table->foreignId('buyer_id')->constrained('users')->cascadeOnDelete();;
            $table->foreignId('support_id')->constrained('users')->cascadeOnDelete();;
            $table->unique(['buyer_id', 'support_id']);
            // $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buyer_support');
    }
};
