<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'testimonial', // ini kolom utama untuk isi testimoni
        'photo',
        'is_active',
        ];
}
