<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Seo extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'meta_title',
        'meta_description',
        'canonical',
        'og_title',
        'og_description',
        'og_image',
        'allow_robots',
        'keywords',
    ];

    protected $casts = [
        'keywords' => 'array',
    ];

    protected $attributes = [
        'keywords' => [],
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
