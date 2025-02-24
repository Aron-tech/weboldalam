<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaticContent extends Model
{
    protected $fillable = [
        'page',
        'key',
        'value',
    ];

    protected $casts = [
        'value' => 'json',
    ];
}
