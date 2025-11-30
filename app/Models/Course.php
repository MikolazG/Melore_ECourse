<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'level',
        'description',
        'price',
        'thumbnail_url',
        'video_url',
    ];


    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class)->orderBy('order');
    }


    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }


    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
