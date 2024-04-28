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
        Schema::create('address', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->string('no_telepon');
            $table->char('provinsi_id', '10');
            $table->char('kabupaten_id', '10');
            $table->char('kecamatan_id', '10');
            $table->char('desa_id', '10');
            $table->string('kode_pos');
            $table->text('jalan');
            $table->text('detail_alamat');
            $table->boolean('default_alamat')->default(1)->comment('0 = Default, 1 = Non Default');
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address');
    }
};
