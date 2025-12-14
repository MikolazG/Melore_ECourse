<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'name',
        'email',
        'specialization',
        'bio',
        'image_url',
        'social_links'
    ];

    protected $casts = [
        'social_links' => 'array',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
