<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ModuleRepeaterIteration
 *
 * @property int $id
 * @property int $module_repeater_id
 * @property int $iterable_id
 * @property string $iterable_type
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|ModuleRepeaterIteration[] $iterations
 * @property-read int|null $iterations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ModuleItemProperty[] $props
 * @property-read int|null $props_count
 * @property-read \App\Models\ModuleRepeater|null $repeater
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeaterIteration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeaterIteration newQuery()
 * @method static \Illuminate\Database\Query\Builder|ModuleRepeaterIteration onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeaterIteration query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeaterIteration whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeaterIteration whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeaterIteration whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeaterIteration whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeaterIteration whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeaterIteration whereIterableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeaterIteration whereIterableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeaterIteration whereModuleRepeaterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeaterIteration whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ModuleRepeaterIteration withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ModuleRepeaterIteration withoutTrashed()
 * @mixin \Eloquent
 */
class ModuleRepeaterIteration extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $fillable = [
        'name',
        'key',
        'class',
        'enabled',
        'default_value',
        'module_repeater_id',
        'model',
        'model_id',
    ];

    // PROPERTIES ATTRIBUTES

    /**
     * @return MorphMany
     */
    public function props(): MorphMany
    {
        return $this->morphMany(ModuleItemProperty::class, 'properable');
//            ->hasMany(Module_item_properties::class,'model_id', 'id')
//            ->where('model', class_basename(self::class));
    }

    /**
     * @return MorphMany
     */
    public function iterations(): MorphMany
    {
        return $this->morphMany(ModuleRepeaterIteration::class, 'iterable');
//            ->hasMany(Module_repeater_iterations::class,'model_id', 'id')
//            ->where('model', class_basename(self::class));
    }

    // PROPERTIES ITEMS

    /**
     * @return HasOne
     */
    public function repeater():HasOne
    {
        return $this
            ->hasOne(ModuleRepeater::class,'id', 'module_repeater_id');
    }
}
