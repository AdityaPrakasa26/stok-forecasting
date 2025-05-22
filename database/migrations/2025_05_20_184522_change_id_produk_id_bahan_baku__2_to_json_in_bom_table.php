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
        Schema::table('bom', function (Blueprint $table) {
            $table->dropForeign(['id_produk']); // jika foreign key masih ada
            $table->dropForeign(['id_bahan_baku']); // jika foreign key masih ada

            $table->json('id_produk')->change();
            $table->json('id_bahan_baku')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bom', function (Blueprint $table) {
            //
        });
    }
};
