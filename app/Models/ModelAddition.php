<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelAddition extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'thumbnail',
        'excerpt',
        'lang_id',
    ];

    /**
     * @return HasOne
     */
    public function owner(): HasOne
    {
        return $this
            ->hasOne('App\Models\\' . $this->model, 'id', 'model_id');
    }
}
