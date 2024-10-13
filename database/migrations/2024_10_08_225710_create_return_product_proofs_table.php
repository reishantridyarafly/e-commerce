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
        Schema::create('return_product_proofs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('return_product_id');
            $table->string('file_return');
            $table->timestamps();
            $table->foreign('return_product_id')->references('id')->on('return_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_product_proofs');
    }
};
