<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

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
