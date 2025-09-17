<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    // 👇 tambahin ini biar cocok sama nama tabel di migrasi
    protected $table = 'social_medias';

    protected $fillable = [
        'title',
        'description',
        'twitter',
        'twitter_image',
        'facebook',
        'facebook_image',
        'linkedin',
        'linkedin_image',
        'instagram',
        'instagram_image',
        'is_active',
    ];

    // accessor buat tampilkan gambar full path (optional)
    public function getTwitterImageUrlAttribute()
    {
        return $this->twitter_image ? asset('storage/' . $this->twitter_image) : null;
    }

    public function getFacebookImageUrlAttribute()
    {
        return $this->facebook_image ? asset('storage/' . $this->facebook_image) : null;
    }

    public function getLinkedinImageUrlAttribute()
    {
        return $this->linkedin_image ? asset('storage/' . $this->linkedin_image) : null;
    }

    public function getInstagramImageUrlAttribute()
    {
        return $this->instagram_image ? asset('storage/' . $this->instagram_image) : null;
    }
}
