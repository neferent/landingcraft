<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Matrix extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'name',
        'schema',
        'sections',
    ];

    protected $casts = [
        'sections' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
