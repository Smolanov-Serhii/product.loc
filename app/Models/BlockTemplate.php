<?php

namespace App\Models;

use App\Traits\HasSoftDeletedRelation;
use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;

/**
 * App\Models\BlockTemplate
 *
 * @property int $id
 * @property string $image_path
 * @property string $path
 * @property string $name
 * @property int $enabled
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BlockTemplateAttribute[] $attrs
 * @property-read int|null $attrs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Block[] $blocks
 * @property-read int|null $blocks_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BlockTemplateGroup[] $groups
 * @property-read int|null $groups_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BlockTemplateRepeater[] $repeaters
 * @property-read int|null $repeaters_count
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplate newQuery()
 * @method static \Illuminate\Database\Query\Builder|BlockTemplate onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplate query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplate whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplate whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplate whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplate whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplate whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplate wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|BlockTemplate withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BlockTemplate withoutTrashed()
 * @mixin \Eloquent
 */
class BlockTemplate extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes, HasSoftDeletedRelation;

    protected $fillable = [
        'path',
        'name',
        'enabled',
        'image_path',
    ];

    protected $softDelete_relations = [
        'attrs',
        'blocks'
    ];

    public static function template_list() {
        $path = resource_path('views/client/block_templates/templates');
        $templates = File::allFiles($path);
        return $templates;
    }

    public function blocks() {
        return $this
            ->hasMany(Block::class, 'block_template_id', 'id');
    }

    // PROPERTIES ATTRIBUTES

    /**
     * @return MorphMany
     */
    public function attrs():MorphMany
    {
        return $this->morphMany(BlockTemplateAttribute::class, 'attributable');
//            ->hasMany(Block_template_attributes::class,'model_id', 'id')
//            ->where('model','Block_templates');
    }

    // PROPERTIES REPEATERS

    /**
     * @return MorphMany
     */
    public function repeaters(): MorphMany
    {
        return $this->morphMany(BlockTemplateRepeater::class, 'repeatable');
//            ->hasMany(Block_template_repeators::class,'model_id', 'id')
//            ->where('model','Block_templates');
    }

    public function groups()
    {
        return $this
            ->belongsToMany(
                BlockTemplateGroup::class,
                'template_groups',
                'block_template_id'
            );
    }

    public function mappedGroupsById()
    {
        return $this->groups->mapWithKeys(function ($item) {
            return [$item->id => $item];
        });
    }
}
