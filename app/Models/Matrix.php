<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matrix extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'schema',
        'sections',
    ];

    protected $casts = [
        'sections' => 'array',
    ];
}
