<?php

namespace App\Models;

use App\Traits\HasSoftDeletedRelation;
use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\App;

/**
 * App\Models\Page
 *
 * @property int $id
 * @property string|null $image_path
 * @property int|null $auth_only
 * @property int|null $parent_page_id
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ModelAddition[] $additions
 * @property-read int|null $additions_count
 * @property-read Page|null $allParent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Block[] $blocks
 * @property-read int|null $blocks_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Page[] $child
 * @property-read int|null $child_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Page[] $childTree
 * @property-read int|null $child_tree_count
 * @property-read mixed $alias
 * @property-read mixed $title
 * @property-read Page|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PageProperty[] $properties
 * @property-read int|null $properties_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ModelSeo[] $seos
 * @property-read int|null $seos_count
 * @method static Builder|Page main()
 * @method static Builder|Page newModelQuery()
 * @method static Builder|Page newQuery()
 * @method static \Illuminate\Database\Query\Builder|Page onlyTrashed()
 * @method static Builder|Page query()
 * @method static Builder|Page whereAdminCreatedId($value)
 * @method static Builder|Page whereAdminUpdatedId($value)
 * @method static Builder|Page whereAuthOnly($value)
 * @method static Builder|Page whereCreatedAt($value)
 * @method static Builder|Page whereDeletedAt($value)
 * @method static Builder|Page whereId($value)
 * @method static Builder|Page whereImagePath($value)
 * @method static Builder|Page whereParentPageId($value)
 * @method static Builder|Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Page withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Page withoutTrashed()
 * @mixin \Eloquent
 */
class Page extends Model
{
    use HasFactory, HasSystemFields, softDeletes, HasSoftDeletedRelation;

    protected $fillable = [
        'parent_page_id',
        'auth_only',
        'is_main'
    ];

    protected $softDelete_relations = [
        'addition',
        'seo',
        'child'
    ];

    protected $lang_id;

    public function __construct(array $attributes = [])
    {
        $this->lang_id = Language::where('iso', App::getLocale())->first()->id;

        parent::__construct($attributes);
    }

    /**
     * @return HasMany
     */
    public function properties(): HasMany
    {
        return $this->hasMany(PageProperty::class, 'page_id', 'id')->where('enabled', true);
    }

    /**
     * @param $lang_id
     * @return Model
     */
    public function property($lang_id): ?Model
    {
        return $this
            ->hasOne(PageProperty::class, 'page_id', 'id')->where('lang_id', $lang_id)
            ->first();
    }

    /**
     * @return HasOne
     */
    public function parent(): HasOne
    {
        return $this->hasOne(Page::class, 'id', 'parent_page_id');
    }

    /**
     * @return HasOne
     */
    public function allParent(): HasOne {
        return $this->parent()->with('parent');
    }

    /**
     * @return HasMany
     */
    public function child(): HasMany
    {
        return $this->hasMany(Page::class, 'parent_page_id','id');
    }

    /**
     * @return HasMany
     */
    public function childTree(): HasMany
    {
        return $this->child()->with('childTree');
    }

    // PROPERTY BLOCK

    /**
     * @return MorphMany
     */
    public function blocks(): MorphMany
    {
        return $this
            ->morphMany(Block::class, 'blockable')
            ->orderBy('order', 'ASC');
//        return $this
//            ->hasMany(Block::class, 'model_id', 'id')
//            ->where('model', class_basename(self::class))
//            ->with('contents')
//            ->with('template')
//            ->orderBy('order', 'ASC');
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
//            $this->hasOne(Model_additions::class, 'model_id', 'id')
//            ->where('model', class_basename(self::class))
                ->where('lang_id', $lang_id);

    }

    /**
     * @return MorphMany
     */
    public function additions(): MorphMany
    {
        return $this->morphMany(ModelAddition::class, 'additable');
    }

    /**
     * Page seo current lang or $lang_id version
     *
     * @param null $lang_id
     * @return MorphOne
     */
    public function seo($lang_id = null): MorphOne
    {

        $lang_id = $lang_id ?? $this->lang_id;

        return
            $this->morphOne(ModelSeo::class, 'seoable')
//                ->hasOne(Model_seo::class, 'model_id', 'id')
//                ->where('model', class_basename(self::class))
                ->where('lang_id', $lang_id);

    }

    /**
     * Page seo all lang versions
     *
     * @return MorphMany
     */
    public function seos(): MorphMany
    {
        return $this->morphMany(ModelSeo::class, 'seoable');

    }
//
//    public function enabled_blocks() {
//        return $this->blocks();
//    }

//    CUSTOM ATTRIBUTES
    public function getTitleAttribute() {
        return $this->addition()->first()->title;
    }

    public function getAliasAttribute() {
        return $this->seo()->first()->alias;
    }

    /**
     * @param Builder $query
     * @return Page
     */
    public function scopeMain(Builder $query): Builder
    {
        return $query->where('parent_page_id', null);
    }

//    public function getPathAttribute() {
//        $path = [];
//        $parent = $this->allParent;
////        dd($parent);
////        if($this->id == 50) {
////
////            dd($parent);
////        }
//        if($parent) {
//            while($parent = $parent->parent) {
//                $path[] = $parent->alias;
//            }
//        }
//        return implode('/', array_reverse($path));
//        return (!empty($pathimplode))
//            ? implode('/', array_reverse($path))
//            : '/';
//    }
}
