<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    // Nama tabel
    protected $table = 'heros';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'title',       // Judul hero
        'subtitle',    // Subjudul / tagline
        'description', // Deskripsi panjang
        'image',       // Nama file gambar / path
        'is_active',   // Status aktif/inaktif
    ];

    // Timestamps otomatis
    public $timestamps = true;

    /**
     * Scope untuk mengambil hero yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
