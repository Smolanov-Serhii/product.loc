<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlockTemplateRepeater extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $fillable = [
        'name',
        'key',
        'class',
        'enabled',
        'default_value',
        'model',
    ];

    // PROPERTIES ATTRIBUTES

    /**
     * @return MorphMany
     */
    public function attrs(): MorphMany
    {
        return $this->morphMany(BlockTemplateAttribute::class, 'attributable');
//            ->hasMany(Block_template_attributes::class,'model_id', 'id')
//            ->where('model', 'Block_template_repeaters');
    }

    // PROPERTIES REPEATERS

    /**
     * @return MorphMany
     */
    public function repeaters(): MorphMany
    {
        return $this->morphMany(BlockTemplateRepeater::class, 'repeatable');
//            ->hasMany(Block_template_repeaters::class,'model_id', 'id')
//            ->where('model', 'Block_template_repeaters');
    }

    // PROPERTIES ITERATIONS

    /**
     * @return HasMany
     */
    public function iterations(): HasMany
    {
        return $this
            ->hasMany(BlockTemplateRepeaterIteration::class,'block_template_repeater_id', 'id');
    }
}
