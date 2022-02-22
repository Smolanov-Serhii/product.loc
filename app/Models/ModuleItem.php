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
