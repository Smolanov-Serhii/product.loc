<?php

namespace App\Models;

use App\Traits\HasSoftDeletedRelation;
use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\TaxonomyItem
 *
 * @property int $id
 * @property string $key
 * @property string $name
 * @property int|null $taxonomy_id
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ModuleItem[] $module_items
 * @property-read int|null $module_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TaxonomyItemProperty[] $props
 * @property-read int|null $props_count
 * @property-read \App\Models\Taxonomy|null $taxonomy
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyItem newQuery()
 * @method static \Illuminate\Database\Query\Builder|TaxonomyItem onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyItem whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyItem whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyItem whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyItem whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyItem whereTaxonomyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|TaxonomyItem withTrashed()
 * @method static \Illuminate\Database\Query\Builder|TaxonomyItem withoutTrashed()
 * @mixin \Eloquent
 */
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
