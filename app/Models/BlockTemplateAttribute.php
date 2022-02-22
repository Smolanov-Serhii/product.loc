<?php

namespace App\Models;

use App\Traits\HasSoftDeletedRelation;
use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlockTemplateAttribute extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes, HasSoftDeletedRelation;

    protected $fillable = [
        'name',
        'key',
        'type',
        'enabled',
        'default_value',
    ];

    //    NEW TYPE APPEND TO THE END
    const TYPE_LIST = [
        'image', // 0
        'input', // 1
        'textarea', // 2
        'editor', // 3
        'repeater', // 4
        'file', // 5
        'color', // 6
        'selector', // 7
        'widget', // 8
        'checkbox' // 9
    ];

    protected $softDelete_relations = [
        'contents'
    ];

    // OWNER REPEATER

    /**
     * @return MorphTo
     */
    public function repeater(): MorphTo
    {
        return $this->morphTo();
//        return $this
//            ->hasOne(Block_template_repeaters::class, 'id', 'model_id');
    }

    /**
     * @return MorphTo
     */
    public function template(): MorphTo
    {
        return $this->morphTo();
    }


    /**
     * @return HasMany
     */
    public function contents(): HasMany
    {
        return $this
            ->hasMany(BlockContent::class, 'block_template_attribute_id', 'id');
    }

    /**
     * @return MorphOne
     */
    public function setting(): MorphOne
    {
        return $this
            ->morphOne(Setting::class, 'customizable');
    }

}
