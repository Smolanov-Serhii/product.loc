<?php

namespace App\Models;

use App\Traits\HasSoftDeletedRelation;
use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\BlockContent
 *
 * @property int $id
 * @property int $contentable_id
 * @property string $contentable_type
 * @property int $block_template_attribute_id
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\BlockTemplateAttribute|null $attr
 * @property-read \App\Models\Block|null $block
 * @property-read \App\Models\BlockTemplateRepeaterIteration|null $iteration
 * @property-read \App\Models\BlockContentTranslation|null $translate
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BlockContentTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContent attribute($attr_id)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContent newQuery()
 * @method static \Illuminate\Database\Query\Builder|BlockContent onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContent query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContent whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContent whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContent whereBlockTemplateAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContent whereContentableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContent whereContentableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContent whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContent whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|BlockContent withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BlockContent withoutTrashed()
 * @mixin \Eloquent
 */
class BlockContent extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes, HasSoftDeletedRelation;

    protected $fillable = [
        'block_id',
        'block_template_attribute_id',
        'enabled',
    ];

    protected $softDelete_relations = [
        'translations'
    ];

    // OWNER BLOCK

    /**
     * @return HasOne
     */
    public function block(): HasOne
    {
        return $this
            ->hasOne(Block::class, 'id', 'block_id')
            ->with('contents');
    }

    // PROPERTY TRANSLATE

    /**
     * @return HasMany
     */
    public function translations(): HasMany
    {
        return $this
            ->hasMany(BlockContentTranslation::class, 'block_content_id', 'id');
//            ->with('options');
    }

    /**
     * @return HasOne
     */
    public function translate(): HasOne
    {

        return $this
            ->hasOne(BlockContentTranslation::class, 'block_content_id', 'id')
            ->current()
            ;
    }

    public function mappedByLang()
    {
        return $this
            ->translations
            ->mapWithKeys(function ($translation) {
                return [$translation->lang_id => $translation];
            });
    }

    public function scopeAttribute($query, $attr_id)
    {
        return $query->where('block_template_attribute_id', $attr_id);
    }

    // OWNER TEMPLATE ATTRIBUTE

    /**
     * @return HasOne
     */
    public function attr(): HasOne
    {
        return $this
            ->hasOne(BlockTemplateAttribute::class, 'id', 'block_template_attribute_id')//            ->with('contents')
            ;
    }

    // OWNER ITERATION

    /**
     * @return MorphOne
     */
    public function iteration(): MorphOne
    {
        return $this
            ->morphOne(BlockTemplateRepeaterIteration::class, 'contentable');
//        return $this
//            ->hasOne(Block_template_repeater_iterations::class, 'id', 'block_template_repeater_iteration_id')
//            ->with('contents')
//            ;
    }
}
