<?php

namespace App\Models;

use App\Traits\HasSoftDeletedRelation;
use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaxonomyItem extends Model
{
    use HasSystemFields, SoftDeletes, HasSoftDeletedRelation;

    protected $fillable = [
        'name',
        'key',
    ];

    protected $softDelete_relations = [
        'props'
    ];

    /**
     * @return HasOne
     */
    public function taxonomy(): HasOne
    {
        return $this
            ->hasOne(
                Taxonomy::class,
                'id',
                'taxonomy_id'
            );
    }

    /**
     * @return BelongsToMany
     */
    public function module_items(): BelongsToMany
    {
        return $this
            ->belongsToMany(
                ModuleItem::class,
                'model_item_taxonomy_items',
                'taxonomy_item_id',
                'module_item_id'
            );
    }

    /**
     * @return HasMany
     */
    public function props(): HasMany
    {
        return $this
            ->hasMany(
                TaxonomyItemProperty::class,
                'taxonomy_item_id',
                'id'
            );
    }
}
