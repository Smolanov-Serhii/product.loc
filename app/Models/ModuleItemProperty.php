<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModuleItemProperty extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $fillable = [
        'value',
        'module_attribute_id'
    ];

    /**
     * @return HasOne
     */
    public function type(): HasOne
    {
        return $this
            ->hasOne(ModuleAttribute::class, 'id', 'module_attribute_id');
    }

    /**
     * @return MorphOne
     */
    public function item(): MorphOne
    {
        return $this->morphOne(ModuleItem::class, 'properable');
//            ->hasOne(Module_items::class, 'id', 'module_item_id');
    }

    /**
     * @return MorphOne
     */
    public function iteration(): MorphOne
    {
        return $this->morphOne(ModuleRepeaterIteration::class, 'properable');
    }


}
