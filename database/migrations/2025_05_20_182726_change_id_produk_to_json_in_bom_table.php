<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('boms', function (Blueprint $table) {
            // Coba hapus foreign key jika ada
            try {
                DB::statement('ALTER TABLE boms DROP FOREIGN KEY bom_produk_id_foreign');
            } catch (\Exception $e) {
                // Abaikan error jika tidak ada foreign key
            }

            // Coba hapus kolom produk_id jika ada
            if (Schema::hasColumn('boms', 'produk_id')) {
                $table->dropColumn('produk_id');
            }

            // Tambahkan kolom JSON baru
            if (!Schema::hasColumn('boms', 'produk')) {
                $table->json('produk')->nullable(); // JSON untuk menyimpan data produk jika dibutuhkan
            }
        });
    }

    public function down(): void
    {
        Schema::table('boms', function (Blueprint $table) {
            if (Schema::hasColumn('boms', 'produk')) {
                $table->dropColumn('produk');
            }

            if (!Schema::hasColumn('boms', 'produk_id')) {
                $table->unsignedBigInteger('produk_id')->nullable();
                $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');
            }
        });
    }
};



// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     public function up(): void
//     {
//         Schema::table('bom', function (Blueprint $table) {
//             // Step 1: Drop foreign key dulu
//             $table->dropForeign(['id_produk']);
//         });

//         Schema::table('bom', function (Blueprint $table) {
//             // Step 2: Ubah kolom menjadi JSON
//             $table->json('id_produk')->change();
//         });
//     }

//     public function down(): void
//     {
//         Schema::table('bom', function (Blueprint $table) {
//             // Rollback ke tipe integer
//             $table->integer('id_produk')->change();

//             // (Opsional) Tambahkan kembali foreign key
//             $table->foreign('id_produk')->references('id')->on('produk');
//         });
//     }
// };
