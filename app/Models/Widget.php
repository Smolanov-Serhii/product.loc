<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Widget extends Model
{
    use HasFactory, HasSystemFields, softDeletes;

    protected $fillable = [
        'slug',
        'enable',
    ];

    /**
     * @return MorphMany
     */
    public function blocks(): MorphMany
    {
        return $this
            ->morphMany(Block::class, 'blockable')
            ->orderBy('order', 'ASC');
    }
}
