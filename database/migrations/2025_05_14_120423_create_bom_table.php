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
        Schema::create('bom', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_produk');
            $table->unsignedBigInteger('id_bahan_baku');
            $table->decimal('jumlah_bahan', 8, 2);
            $table->string('satuan')->default('gram'); // optional, bisa 'ml', 'pcs', dll
            $table->decimal('harga_satuan', 10, 2)->nullable(); // bisa null jika tidak diisi
            $table->decimal('total_harga', 10, 2)->nullable(); // = jumlah x harga
            $table->unsignedBigInteger('id_stok')->nullable(); // optional, jika pakai stok
            $table->timestamps();

            // Foreign key opsional
            $table->foreign('id_produk')->references('id')->on('produk')->onDelete('cascade');
            $table->foreign('id_bahan_baku')->references('id')->on('bahan_baku')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bom');
    }
};
