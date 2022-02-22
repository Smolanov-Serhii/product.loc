<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variable extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $fillable = [
        'key',
        'name',
        'type',
        'section'
    ];

    // PROPERTIES ATTRIBUTES

    /**
     * @return HasMany
     */
    public function translations(): HasMany
    {
        return $this
            ->hasMany(VariableTranslation::class,'variable_id', 'id');
    }

    public function translate() {

        return $this
            ->hasOne(VariableTranslation::class, 'variable_id', 'id')
            ->current();
    }

    const TYPE_LIST = [
        'image',
        'input',
        'textarea',
        'editor'
    ];

//    public function translate() {
//        return $this
//            ->hasOne(Variable_translations::class,'variable_id', 'id')
//            ->current();
//    }
}
