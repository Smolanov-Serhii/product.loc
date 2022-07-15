<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ModuleTaxonomy
 *
 * @property int|null $taxonomy_id
 * @property int|null $module_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleTaxonomy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleTaxonomy newQuery()
 * @method static \Illuminate\Database\Query\Builder|ModuleTaxonomy onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleTaxonomy query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleTaxonomy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleTaxonomy whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleTaxonomy whereTaxonomyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleTaxonomy whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ModuleTaxonomy withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ModuleTaxonomy withoutTrashed()
 * @mixin \Eloquent
 */
class ModuleTaxonomy extends Model
{
    use HasSystemFields, SoftDeletes;
}
