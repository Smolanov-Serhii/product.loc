<?php

namespace App\Models;

use App\Traits\HasSoftDeletedRelation;
use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\BlockTemplateAttribute
 *
 * @property int $id
 * @property string $name
 * @property string $key
 * @property string|null $default_value
 * @property int $type
 * @property string $attributable_type
 * @property int $attributable_id
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BlockContent[] $contents
 * @property-read int|null $contents_count
 * @property-read Model|\Eloquent $repeater
 * @property-read \App\Models\Setting|null $setting
 * @property-read Model|\Eloquent $template
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateAttribute newQuery()
 * @method static \Illuminate\Database\Query\Builder|BlockTemplateAttribute onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateAttribute whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateAttribute whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateAttribute whereAttributableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateAttribute whereAttributableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateAttribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateAttribute whereDefaultValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateAttribute whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateAttribute whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateAttribute whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateAttribute whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateAttribute whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|BlockTemplateAttribute withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BlockTemplateAttribute withoutTrashed()
 * @mixin \Eloquent
 */
class BlockTemplateAttribute extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes, HasSoftDeletedRelation;

    protected $fillable = [
        'name',
        'key',
        'type',
        'enabled',
        'default_value',
    ];

    //    NEW TYPE APPEND TO THE END
    const TYPE_LIST = [
        'image', // 0
        'input', // 1
        'textarea', // 2
        'editor', // 3
        'repeater', // 4
        'file', // 5
        'color', // 6
        'selector', // 7
        'widget', // 8
        'checkbox', // 9
        'icon', // 10
    ];

    protected $softDelete_relations = [
        'contents'
    ];

    // OWNER REPEATER

    /**
     * @return MorphTo
     */
    public function repeater(): MorphTo
    {
        return $this->morphTo();
//        return $this
//            ->hasOne(Block_template_repeaters::class, 'id', 'model_id');
    }

    /**
     * @return MorphTo
     */
    public function template(): MorphTo
    {
        return $this->morphTo();
    }


    /**
     * @return HasMany
     */
    public function contents(): HasMany
    {
        return $this
            ->hasMany(BlockContent::class, 'block_template_attribute_id', 'id');
    }

    /**
     * @return MorphOne
     */
    public function setting(): MorphOne
    {
        return $this
            ->morphOne(Setting::class, 'customizable');
    }

}
