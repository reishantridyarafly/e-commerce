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
        Schema::table('checkouts', function (Blueprint $table) {
            $table->string('kode_checkout', 100)->after('id');
            $table->string('kurir', 100)->nullable()->after('tanggal_pembayaran');
            $table->string('resi', 100)->nullable()->after('kurir');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('checkouts', function (Blueprint $table) {
            $table->dropColumn('kode_checkout');
            $table->dropColumn('kurir');
            $table->dropColumn('resi');
        });
    }
};
