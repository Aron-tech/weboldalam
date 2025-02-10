<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'content',
        'images',
        'videos',
        'visible',
    ];

    protected $casts = [
        'content' => 'json',
        'videos' => 'json',
        'images' => 'json',
    ];
}
