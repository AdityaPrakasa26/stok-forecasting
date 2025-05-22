<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('boms', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('produk_id');
    $table->unsignedBigInteger('bahan_baku_id');
    $table->float('jumlah_pemakaian');
    $table->timestamps();

    $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');
    $table->foreign('bahan_baku_id')->references('id')->on('bahan_bakus')->onDelete('cascade');
});

    }

    public function down(): void
    {
        Schema::table('boms', function (Blueprint $table) {
            $table->dropForeign(['produk_id']);
            $table->dropForeign(['bahan_baku_id']);
        });
    }
};


// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration {
//     public function up(): void
//     {
//         Schema::create('bom', function (Blueprint $table) {
//             $table->id();

//             // Foreign key ke produk dan bahan baku
//             $table->foreignId('id_produk')->constrained('produk')->onDelete('cascade');
//             $table->foreignId('id_bahan_baku')->constrained('bahan_baku')->onDelete('cascade');

//             $table->decimal('jumlah_bahan', 8, 2);
//             $table->string('satuan')->default('gram');
//             $table->decimal('harga_satuan', 10, 2)->nullable();
//             $table->decimal('total_harga', 10, 2)->nullable();
//             $table->unsignedBigInteger('id_stok')->nullable(); // jika perlu relasi ke stok

//             $table->timestamps();
//         });
//     }

//     public function down(): void
//     {
//         Schema::dropIfExists('bom');
//     }
// };
