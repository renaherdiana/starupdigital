<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    // Tabel yang digunakan (opsional, Laravel otomatis menggunakan 'partners')
    protected $table = 'partners';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'name',
        'description',
        'photo',
        'is_active',
    ];
}
