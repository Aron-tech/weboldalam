<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
        'title',
        'description',
        'body',
        'cover',
        'slug',
        'status',
        'github',
        'images',
        'demo',
        'start_date',
        'end_date',
        'visible',
    ];

    protected $casts = [
        'images' => 'json',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'project_tag')->withTimestamps();
    }
}
