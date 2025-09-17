<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact'; // nama tabel di database

    // Field yang bisa diisi lewat mass assignment
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'is_active',
    ];

    // Tipe data default / casting
    protected $casts = [
        'is_active' => 'boolean',
    ];
}
