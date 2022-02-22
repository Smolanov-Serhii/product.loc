<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaxonomyItemProperty extends Model
{
    use HasSystemFields, SoftDeletes;

    protected $fillable = [
        'value',
        'taxonomy_attribute_id',
    ];
}
