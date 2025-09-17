<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaKerja extends Model
{
    use HasFactory;

    // Nama tabel (opsional, jika nama tabel bukan "tenaga_kerjas")
    protected $table = 'tenaga_kerja';

    // Field yang bisa diisi secara massal
    protected $fillable = [
        'name',       // nama tenaga kerja
        'photo',      // path foto
        'profession', // profesi
        'is_active',  // status aktif (0 atau 1)
    ];

    // Casting tipe data
    protected $casts = [
        'is_active' => 'boolean',
    ];
}
