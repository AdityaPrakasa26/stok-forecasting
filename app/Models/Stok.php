<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    protected $table = 'stok'; // Sesuaikan dengan nama tabel kamu (bukan default 'stoks')

    protected $fillable = [
        'id_bom',
        'jumlah_ketersediaan',
        'jumlah_minimum',
    ];
    protected $casts = [
        'id_bom' => 'array',
    ];
    public function bom()
    {
        return $this->belongsTo(BOM::class, 'id_bom', 'id');
    }
}
