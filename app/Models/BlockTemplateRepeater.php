<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\BlockTemplateRepeater
 *
 * @property int $id
 * @property string $name
 * @property string $key
 * @property string|null $class
 * @property string $repeatable_type
 * @property int $repeatable_id
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BlockTemplateAttribute[] $attrs
 * @property-read int|null $attrs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BlockTemplateRepeaterIteration[] $iterations
 * @property-read int|null $iterations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|BlockTemplateRepeater[] $repeaters
 * @property-read int|null $repeaters_count
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateRepeater newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateRepeater newQuery()
 * @method static \Illuminate\Database\Query\Builder|BlockTemplateRepeater onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateRepeater query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateRepeater whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateRepeater whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateRepeater whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateRepeater whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateRepeater whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateRepeater whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateRepeater whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateRepeater whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateRepeater whereRepeatableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateRepeater whereRepeatableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateRepeater whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|BlockTemplateRepeater withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BlockTemplateRepeater withoutTrashed()
 * @mixin \Eloquent
 */
class BlockTemplateRepeater extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $fillable = [
        'name',
        'key',
        'class',
        'enabled',
        'default_value',
        'model',
    ];

    // PROPERTIES ATTRIBUTES

    /**
     * @return MorphMany
     */
    public function attrs(): MorphMany
    {
        return $this->morphMany(BlockTemplateAttribute::class, 'attributable');
//            ->hasMany(Block_template_attributes::class,'model_id', 'id')
//            ->where('model', 'Block_template_repeaters');
    }

    // PROPERTIES REPEATERS

    /**
     * @return MorphMany
     */
    public function repeaters(): MorphMany
    {
        return $this->morphMany(BlockTemplateRepeater::class, 'repeatable');
//            ->hasMany(Block_template_repeaters::class,'model_id', 'id')
//            ->where('model', 'Block_template_repeaters');
    }

    // PROPERTIES ITERATIONS

    /**
     * @return HasMany
     */
    public function iterations(): HasMany
    {
        return $this
            ->hasMany(BlockTemplateRepeaterIteration::class,'block_template_repeater_id', 'id');
    }
}
