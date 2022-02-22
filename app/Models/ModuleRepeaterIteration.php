<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModuleRepeaterIteration extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $fillable = [
        'name',
        'key',
        'class',
        'enabled',
        'default_value',
        'module_repeater_id',
        'model',
        'model_id',
    ];

    // PROPERTIES ATTRIBUTES

    /**
     * @return MorphMany
     */
    public function props(): MorphMany
    {
        return $this->morphMany(ModuleItemProperty::class, 'properable');
//            ->hasMany(Module_item_properties::class,'model_id', 'id')
//            ->where('model', class_basename(self::class));
    }

    /**
     * @return MorphMany
     */
    public function iterations(): MorphMany
    {
        return $this->morphMany(ModuleRepeaterIteration::class, 'iterable');
//            ->hasMany(Module_repeater_iterations::class,'model_id', 'id')
//            ->where('model', class_basename(self::class));
    }

    // PROPERTIES ITEMS

    /**
     * @return HasOne
     */
    public function repeater():HasOne
    {
        return $this
            ->hasOne(ModuleRepeater::class,'id', 'module_repeater_id');
    }
}
