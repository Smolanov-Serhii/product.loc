<?php

namespace App\Models;

use App\Traits\HasSoftDeletedRelation;
use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaxonomyAttribute extends Model
{
    use HasSystemFields, SoftDeletes, HasSoftDeletedRelation;

    protected $fillable = [
        'type',
        'key',
        'name',
    ];

    const TYPE_LIST = [
        'image',
        'input',
        'textarea',
        'editor',
        'time',
        'file',
    ];

    protected $softDelete_relations = [
        'props',
    ];

    /**
     * @return HasMany
     */
    public function props(): HasMany
    {
        return $this
            ->hasMany(
                TaxonomyItemProperty::class,
                'taxonomy_attribute_id',
                'id'
            );
    }
}
