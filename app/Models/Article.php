<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sevendays\FilamentPageBuilder\Models\Contracts\Blockable;
use Sevendays\FilamentPageBuilder\Models\Traits\HasBlocks;

class Article extends Model implements Blockable
{
    use HasFactory, HasBlocks;

    protected $guarded = ['id'];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'images',
        'cover',
    ];

    protected $casts = [
        'images' => 'json',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
