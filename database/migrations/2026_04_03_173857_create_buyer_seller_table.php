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
        Schema::create('buyer_seller', function (Blueprint $table) {
            $table->foreignId('buyer_id')->index()->constrained('users');
            $table->foreignId('seller_id')->index()->constrained('users');
            $table->unique(['buyer_id', 'seller_id']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buyer_seller');
    }
};
