<?php

namespace App\Models;

use App\Traits\HasSoftDeletedRelation;
use App\Traits\HasSystemFields;
use BeyondCode\Comments\Traits\HasComments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * App\Models\ModuleItem
 *
 * @property int $id
 * @property int|null $module_id
 * @property string|null $excerpt
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Block[] $blocks
 * @property-read int|null $blocks_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read mixed $properties
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ModuleRepeaterIteration[] $iterable
 * @property-read int|null $iterable_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ModuleRepeaterIteration[] $iterations
 * @property-read int|null $iterations_count
 * @property-read \App\Models\Module|null $module
 * @property-read \Illuminate\Database\Eloquent\Collection|ModuleItem[] $module_items
 * @property-read int|null $module_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ModuleItemProperty[] $props
 * @property-read int|null $props_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TaxonomyItem[] $taxonomy_items
 * @property-read int|null $taxonomy_items_count
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleItem newQuery()
 * @method static \Illuminate\Database\Query\Builder|ModuleItem onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleItem whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleItem whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleItem whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleItem whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleItem whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ModuleItem withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ModuleItem withoutTrashed()
 * @mixin \Eloquent
 */
class ModuleItem extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes, HasSoftDeletedRelation, HasComments;

    protected $fillable = [
        'module_id',
        'excerpt'
    ];

    protected $softDelete_relations = [
        'addition',
        'seo',
    ];

    protected $lang_id;

    public function __construct(array $attributes = [])
    {
        $this->lang_id = Language::where('iso', App::getLocale())->value('id');

        parent::__construct($attributes);
    }

    // PROPERTIES PROPERTIES

    /**
     * @return MorphMany
     */
    public function props(): MorphMany
    {
        return $this->morphMany(ModuleItemProperty::class, 'properable');
//            ->hasMany(
//                Module_item_properties::class,
//                'model_id',
//                'id'
//            )
//            ->where('model', class_basename(self::class));
    }
    public function getPropertiesAttribute()
    {
        return $this->props->mapWithKeys(function ($prop) {
            return [$prop->type->key => $prop->value];
        });
    }

    /**
     * @return BelongsTo
     */
    public function module(): BelongsTo
    {
        return $this
            ->belongsTo(
                Module::class,
                'module_id',
                'id',
            );
    }

    //    Property model_addition

    /**
     * @param null $lang_id
     * @return MorphOne
     */
    public function addition($lang_id = null): MorphOne
    {
        $lang_id = $lang_id ?? $this->lang_id;

        return
            $this->morphOne(ModelAddition::class, 'additable')
            ->where('lang_id', $lang_id);

    }

    /**
     * @return MorphMany
     */
    public function iterations(): MorphMany
    {
        return $this->morphMany(ModuleRepeaterIteration::class, 'iterable');
//            ->hasMany(Module_repeater_iterations::class, 'model_id', 'id')
//            ->where('model', class_basename(self::class));
    }

    /**
     * @return MorphMany
     */
    public function iterable(): MorphMany
    {
        return $this->morphMany(ModuleRepeaterIteration::class, 'iterable');
//            ->hasMany(Module_repeater_iterations::class, 'model_id', 'id')
//            ->where('model', class_basename(self::class));
    }

    /**
     * @param null $lang_id
     * @return MorphOne
     */
    public function seo($lang_id = null): MorphOne
    {

        $lang_id = $lang_id ?? $this->lang_id;

        return $this->morphOne(ModelSeo::class, 'seoable')
//            ->belongsTo(
//                Model_seo::class,
//                'id',
//                'model_id',
//            )
//            ->where('model', class_basename(self::class))
            ->where('lang_id', $lang_id);

    }

    /**
     * @return BelongsToMany
     */
    public function taxonomy_items(): BelongsToMany
    {
        return $this
            ->belongsToMany(
                TaxonomyItem::class,
                'model_item_taxonomy_items',
                'module_item_id'
            );
    }

    public function mappedTaxonomyItemsById()
    {
        return $this->taxonomy_items->mapWithKeys(function ($item) {
            return [$item->id => $item];
        });
    }

    /**
     * @return BelongsToMany
     */
    public function module_items(): BelongsToMany
    {
        return $this
            ->belongsToMany(
                ModuleItem::class,
                'module_item_module_items',
                'parent_module_item_id',
                'child_module_item_id'
            );
    }

    public function mappedModuleItemsById()
    {
        return $this->module_items->mapWithKeys(function ($item) {
            return [$item->id => $item];
        });
    }

    // PROPERTY BLOCK

    /**
     * @return MorphMany
     */
    public function blocks(): MorphMany
    {
        return $this
            ->morphMany(Block::class, 'blockable')
            ->with('contents')
            ->with('template')
            ->orderBy('order', 'ASC');
    }
}
