<?php

namespace App\Models;

use App\Traits\HasSoftDeletedRelation;
use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Taxonomy extends Model
{
    use HasSystemFields, SoftDeletes, HasSoftDeletedRelation;

    protected $fillable = [
        'name',
        'key',
    ];

    protected $softDelete_relations = [
        'items',
        'attrs'
    ];

    /**
     * @return HasMany
     */
    public function items(): HasMany {
        return $this
            ->hasMany(TaxonomyItem::class, 'taxonomy_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function modules(): BelongsToMany
    {
        return $this->belongsToMany(Module::class, 'module_taxonomies');
    }

    // PROPERTIES ATTRIBUTES

    /**
     * @return HasMany
     */
    public function attrs(): HasMany
    {
        return $this
            ->hasMany(TaxonomyAttribute::class, 'taxonomy_id', 'id');
    }
}
