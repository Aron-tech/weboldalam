<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $guarded = ['id'];
    protected $fillable = [
        'email',
        'name',
        'subject',
        'phone',
        'message',
        'read',
    ];

    protected $casts = [
        'read' => 'boolean',
    ];
}
