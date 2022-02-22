<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelSeo extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $table = 'seo';

    protected $fillable = [
        'alias',
        'title',
        'meta_keywords',
        'meta_description',
        'thumbnail',
        'lang_id',
        'model'
    ];

    /**
     * @return MorphTo
     */
    public function seoable(): MorphTo
    {
        return $this->morphTo();
//            ->hasOne(
//                'App\Models\\' . $this->model,
//                'id',
//                'model_id'
//            );
    }
}
