<?php

namespace App\Models;

use App\Traits\HasSoftDeletedRelation;
use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\TaxonomyAttribute
 *
 * @property int $id
 * @property int $type
 * @property string $key
 * @property string $name
 * @property int|null $taxonomy_id
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TaxonomyItemProperty[] $props
 * @property-read int|null $props_count
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyAttribute newQuery()
 * @method static \Illuminate\Database\Query\Builder|TaxonomyAttribute onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyAttribute whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyAttribute whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyAttribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyAttribute whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyAttribute whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyAttribute whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyAttribute whereTaxonomyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyAttribute whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyAttribute whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|TaxonomyAttribute withTrashed()
 * @method static \Illuminate\Database\Query\Builder|TaxonomyAttribute withoutTrashed()
 * @mixin \Eloquent
 */
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
