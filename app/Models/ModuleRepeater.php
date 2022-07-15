<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ModuleRepeater
 *
 * @property int $id
 * @property string $key
 * @property string|null $name
 * @property string $repeatable_type
 * @property int $repeatable_id
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ModuleAttribute[] $attrs
 * @property-read int|null $attrs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ModuleRepeaterIteration[] $iterations
 * @property-read int|null $iterations_count
 * @property-read Model|\Eloquent $repeatable
 * @property-read \Illuminate\Database\Eloquent\Collection|ModuleRepeater[] $repeaters
 * @property-read int|null $repeaters_count
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeater newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeater newQuery()
 * @method static \Illuminate\Database\Query\Builder|ModuleRepeater onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeater query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeater whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeater whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeater whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeater whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeater whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeater whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeater whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeater whereRepeatableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeater whereRepeatableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleRepeater whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ModuleRepeater withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ModuleRepeater withoutTrashed()
 * @mixin \Eloquent
 */
class ModuleRepeater extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $fillable = [
        'name',
        'key',
        'model'
    ];

    /**
     * @return MorphTo
     */
    public function repeatable(): MorphTo
    {
        return $this->morphTo();
    }

    // PROPERTIES ITEMS

    /**
     * @return MorphMany
     */
    public function repeaters(): MorphMany
    {
        return $this->morphMany(ModuleRepeater::class, 'repeatable');
//            ->hasMany(Module_repeaters::class,'model_id', 'id')
//            ->where('model', class_basename(self::class));
    }
    // PROPERTIES ATTRIBUTES

    /**
     * @return MorphMany
     */
    public function attrs(): MorphMany
    {
        return $this->morphMany(ModuleAttribute::class, 'attributable');
//            ->hasMany(Module_attributes::class,'model_id', 'id')
//            ->where('model', class_basename(self::class));
    }

    /**
     * @return MorphMany
     */
    public function iterations(): MorphMany
    {
        return $this->morphMany(ModuleRepeaterIteration::class, 'iterable');
//            ->hasMany(Module_repeater_iterations::class,'module_repeater_id', 'id')
//            ->where('model', class_basename(self::class));
    }
}
