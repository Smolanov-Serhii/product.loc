<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ModuleItemProperty
 *
 * @property int $id
 * @property string|null $value
 * @property int|null $properable_id
 * @property string|null $properable_type
 * @property int|null $module_attribute_id
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\ModuleItem|null $item
 * @property-read \App\Models\ModuleRepeaterIteration|null $iteration
 * @property-read \App\Models\ModuleAttribute|null $type
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleItemProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleItemProperty newQuery()
 * @method static \Illuminate\Database\Query\Builder|ModuleItemProperty onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleItemProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleItemProperty whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleItemProperty whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleItemProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleItemProperty whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleItemProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleItemProperty whereModuleAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleItemProperty whereProperableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleItemProperty whereProperableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleItemProperty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleItemProperty whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|ModuleItemProperty withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ModuleItemProperty withoutTrashed()
 * @mixin \Eloquent
 */
class ModuleItemProperty extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $fillable = [
        'value',
        'module_attribute_id'
    ];

    /**
     * @return HasOne
     */
    public function type(): HasOne
    {
        return $this
            ->hasOne(ModuleAttribute::class, 'id', 'module_attribute_id');
    }

    /**
     * @return MorphOne
     */
    public function item(): MorphOne
    {
        return $this->morphOne(ModuleItem::class, 'properable');
//            ->hasOne(Module_items::class, 'id', 'module_item_id');
    }

    /**
     * @return MorphOne
     */
    public function iteration(): MorphOne
    {
        return $this->morphOne(ModuleRepeaterIteration::class, 'properable');
    }


}
