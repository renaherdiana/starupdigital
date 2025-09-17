<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    // Field yang boleh diisi mass assignment
    protected $fillable = [
        'photo',
        'title',
        'description',
        'experience',
        'customers',
        'phone',
        'is_active',
    ];
}
