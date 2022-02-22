<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModuleRepeater extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $fillable = [
        'name',
        'key',
        'model'
    ];

    /**
     * @return MorphTo
     */
    public function repeatable(): MorphTo
    {
        return $this->morphTo();
    }

    // PROPERTIES ITEMS

    /**
     * @return MorphMany
     */
    public function repeaters(): MorphMany
    {
        return $this->morphMany(ModuleRepeater::class, 'repeatable');
//            ->hasMany(Module_repeaters::class,'model_id', 'id')
//            ->where('model', class_basename(self::class));
    }
    // PROPERTIES ATTRIBUTES

    /**
     * @return MorphMany
     */
    public function attrs(): MorphMany
    {
        return $this->morphMany(ModuleAttribute::class, 'attributable');
//            ->hasMany(Module_attributes::class,'model_id', 'id')
//            ->where('model', class_basename(self::class));
    }

    /**
     * @return MorphMany
     */
    public function iterations(): MorphMany
    {
        return $this->morphMany(ModuleRepeaterIteration::class, 'iterable');
//            ->hasMany(Module_repeater_iterations::class,'module_repeater_id', 'id')
//            ->where('model', class_basename(self::class));
    }
}
