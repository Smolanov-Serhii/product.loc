<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Templates
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Templates newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Templates newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Templates query()
 * @mixin \Eloquent
 */
class Templates extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'settings'
    ];
}
