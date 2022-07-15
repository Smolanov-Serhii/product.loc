<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\BlockOptionContentTranslation
 *
 * @property-read \App\Models\BlockContent|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection|BlockOptionContentTranslation[] $options
 * @property-read int|null $options_count
 * @method static \Illuminate\Database\Eloquent\Builder|BlockOptionContentTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockOptionContentTranslation newQuery()
 * @method static \Illuminate\Database\Query\Builder|BlockOptionContentTranslation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockOptionContentTranslation query()
 * @method static \Illuminate\Database\Query\Builder|BlockOptionContentTranslation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BlockOptionContentTranslation withoutTrashed()
 * @mixin \Eloquent
 */
class BlockOptionContentTranslation extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $fillable = [
        'type',
        'value',
        'block_content_translation_id'
    ];

//    NEW TYPE APPEND TO THE END
//    const TYPE_LIST = [
//        'image',
//        'input',
//        'textarea',
//    ];

    public function __get($key) {
        return $this->getAttributeValue($key) ?? $this->getRelationValue($key) ?? '';
    }

    /**
     * @return HasOne
     */
    public function content (): HasOne
    {
        return $this->hasOne(BlockContent::class,'id', 'block_id');
    }


    /**
     * @return HasMany
     */
    public function options (): HasMany
    {
        return $this->hasMany(BlockOptionContentTranslation::class,'block_content_translation_id');
    }


}
