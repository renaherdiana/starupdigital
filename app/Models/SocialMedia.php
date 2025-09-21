<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $table = 'social_medias';

    protected $fillable = [
    
    'title',
    'description',
    'is_active',

    'twitter',
    'twitter_url',
    'twitter_username',
    'twitter_image',

    'facebook',
    'facebook_url',
    'facebook_username',
    'facebook_image',

    'linkedin',
    'linkedin_url',
    'linkedin_username',
    'linkedin_image',

    'instagram',
    'instagram_url',
    'instagram_username',
    'instagram_image',
    ];


    // Accessor untuk gambar
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
