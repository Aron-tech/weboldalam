<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'body',
        'github',
        'demo',
        'visible',
        'slug',
        'status',
        'images',
        'start_date',
        'end_date',
        'cover'
    ];

    protected $casts = [
        'images' => 'json',
        'visible' => 'boolean',
    ];
}
