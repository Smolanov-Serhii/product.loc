<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\TaxonomyItemProperty
 *
 * @property int $id
 * @property string $value
 * @property int|null $taxonomy_item_id
 * @property int|null $taxonomy_attribute_id
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyItemProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyItemProperty newQuery()
 * @method static \Illuminate\Database\Query\Builder|TaxonomyItemProperty onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyItemProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyItemProperty whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyItemProperty whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyItemProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyItemProperty whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyItemProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyItemProperty whereTaxonomyAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyItemProperty whereTaxonomyItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyItemProperty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaxonomyItemProperty whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|TaxonomyItemProperty withTrashed()
 * @method static \Illuminate\Database\Query\Builder|TaxonomyItemProperty withoutTrashed()
 * @mixin \Eloquent
 */
class TaxonomyItemProperty extends Model
{
    use HasSystemFields, SoftDeletes;

    protected $fillable = [
        'value',
        'taxonomy_attribute_id',
    ];
}
