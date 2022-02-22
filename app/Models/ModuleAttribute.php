<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModuleAttribute extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $fillable = [
        'type',
        'key',
        'name',
        'model'
    ];

    // PROPERTIES ATTRIBUTES
//    public function attrs() {
//        return $this
//            ->hasMany(Variable_translations::class,'variable_id', 'id');
//    }

    const TYPE_LIST = [
        'image',
        'input',
        'textarea',
        'editor',
        'repeater',
        'time',
        'file',
    ];
}
