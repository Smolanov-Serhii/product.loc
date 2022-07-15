<?php

namespace App\Models;

use App\Models\Forum\Topic;
use App\Traits\HasSoftDeletedRelation;
use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Module
 *
 * @property int $id
 * @property string $name
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ModuleAttribute[] $attrs
 * @property-read int|null $attrs_count
 * @property-read \App\Models\BlockTemplateGroup|null $group
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ModuleItem[] $items
 * @property-read int|null $items_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Module[] $modules
 * @property-read int|null $modules_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ModuleRepeater[] $repeaters
 * @property-read int|null $repeaters_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Taxonomy[] $taxonomies
 * @property-read int|null $taxonomies_count
 * @method static \Illuminate\Database\Eloquent\Builder|Module newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Module newQuery()
 * @method static \Illuminate\Database\Query\Builder|Module onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Module query()
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Module withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Module withoutTrashed()
 * @mixin \Eloquent
 */
class Module extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes, HasSoftDeletedRelation;

    protected $fillable = [
        'name',
        'excerpt'
    ];

    protected $softDelete_relations = [
        'attrs',
        'items',
        'repeaters',
        'group'
    ];

    //        Event listeners for update or create related Block_template_group
    protected static function booted()
    {
        static::created(function ($module) {
            $module
                ->group()
                ->create([
                    'key' => $module->name,
                ]);
        });

        static::updated(function ($module) {

            $module->group->update([
                'key' => $module->name,
            ]);
        });
    }

    // PROPERTIES ATTRIBUTES

    /**
     * @return MorphMany
     */
    public function attrs(): MorphMany
    {
        return $this->morphMany(ModuleAttribute::class, 'attributable');
//        return $this
//            ->hasMany(Module_attributes::class, 'model_id', 'id')
//            ->where('model', class_basename(self::class));
    }

    // PROPERTIES ITEMS

    /**
     * @return HasMany
     */
    public function items(): HasMany
    {

//        if($this->name == config('modules.topic_module_name')){
//            return $this
//                ->hasMany(Topic::class, 'module_id', 'id');
//        }

        return $this
            ->hasMany(ModuleItem::class, 'module_id', 'id');
    }

    // PROPERTIES ITEMS

    /**
     * @return MorphMany
     */
    public function repeaters(): MorphMany
    {
        return $this->morphMany(ModuleRepeater::class, 'repeatable');
//            ->hasMany(Module_repeaters::class, 'model_id', 'id');
//            ->where('model', class_basename(self::class));
    }

    /**
     * @return BelongsToMany
     */
    public function taxonomies(): BelongsToMany
    {
        return $this->belongsToMany(Taxonomy::class, 'module_taxonomies', 'module_id');
    }


    public function mappedTaxonomiesById()
    {
        return $this->taxonomies->mapWithKeys(function ($item) {
            return [$item->id => $item];
        });
    }

    /**
     * @return BelongsToMany
     */
    public function modules(): BelongsToMany
    {
        return $this
            ->belongsToMany(
                Module::class,
                'module_modules',
                'parent_module_id',
                'child_module_id'
            );
    }

    public function mappedModulesById()
    {
        return $this->modules->mapWithKeys(function ($item) {
            return [$item->id => $item];
        });
    }

    /**
     * @return MorphOne
     */
    public function group(): MorphOne
    {
        return $this->morphOne(BlockTemplateGroup::class, 'groupable');
//        return $this
//            ->hasOne(
//                Block_template_group::class,
//                'model_id',
//                'id'
//            )
//            ->where('model', class_basename(self::class));
    }
}
