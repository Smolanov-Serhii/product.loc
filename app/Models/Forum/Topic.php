<?php

namespace App\Models\Forum;

use App\Models\ModuleItem;
use App\Scopes\TopicScope;


/**
 * App\Models\Forum\Topic
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
 * @property-read mixed $theme
 * @property-read mixed $title
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
 * @method static \Illuminate\Database\Eloquent\Builder|Topic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic newQuery()
 * @method static \Illuminate\Database\Query\Builder|Topic onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic query()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Topic withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Topic withoutTrashed()
 * @mixin \Eloquent
 */
class Topic extends ModuleItem
{

    protected $table = 'module_items';

    protected static function booted()
    {
        static::addGlobalScope(new TopicScope);
    }

    public function getTitleAttribute($value)
    {
        return $this->properties['title'];
    }

    public function getThemeAttribute()
    {
        return $this->properties['theme'];
    }
}