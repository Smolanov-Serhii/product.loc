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
    public function block (): HasOne
    {
        return $this
            ->hasOne(Block::class, 'id', 'block_id')
            ->with('contents');
    }

    // PROPERTY TRANSLATE

    /**
     * @return HasMany
     */
    public function translations (): HasMany
    {
        return $this
            ->hasMany(BlockContentTranslation::class,'block_content_id', 'id');
//            ->with('options');
    }

    /**
     * @return HasOne
     */
    public function translate(): HasOne
    {

        return $this
            ->hasOne(BlockContentTranslation::class, 'block_content_id', 'id')
            ->current();
    }

    public function mappedByLang () {
        return $this
            ->translations
            ->mapWithKeys(function($translation) {
                return [$translation->lang_id => $translation];
            });
    }

    public function scopeAttribute($query, $attr_id) {
        return $query->where('block_template_attribute_id', $attr_id);
    }

    // OWNER TEMPLATE ATTRIBUTE

    /**
     * @return HasOne
     */
    public function attr (): HasOne
    {
        return $this
            ->hasOne(BlockTemplateAttribute::class, 'id', 'block_template_attribute_id')
//            ->with('contents')
            ;
    }

    // OWNER ITERATION

    /**
     * @return MorphOne
     */
    public function iteration (): MorphOne {
        return $this
            ->morphOne(BlockTemplateRepeaterIteration::class, 'contentable');
//        return $this
//            ->hasOne(Block_template_repeater_iterations::class, 'id', 'block_template_repeater_iteration_id')
//            ->with('contents')
//            ;
    }
}
