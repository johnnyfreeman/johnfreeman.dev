<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'excerpt',
        'url',
        'published_at'
    ];

    public $timestamps = false;

    protected $casts = [
        'published_at' => 'datetime'
    ];
}