<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $fillable = [
        'properties'
    ];

    protected $casts = [
        'properties' => 'array',
    ];
}
