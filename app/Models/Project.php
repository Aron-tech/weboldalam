<?php
namespace App\Models;

use App\Enums\ProjectTypesEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Sevendays\FilamentPageBuilder\Models\Contracts\Blockable;
use Sevendays\FilamentPageBuilder\Models\Traits\HasBlocks;

class Project extends Model implements Blockable
{
    use HasFactory, HasBlocks;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
        'title',
        'description',
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
        'status' => ProjectTypesEnum::class,
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'project_tag')->withTimestamps();
    }
}
