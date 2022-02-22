<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class VariableTranslation extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $fillable = [
        'lang_id',
        'value'
    ];

    protected $lang_id;

    public function __construct(array $attributes = [])
    {
        $this->lang_id = Language::where('iso', App::getLocale())->first()->id;

        parent::__construct($attributes);
    }

    /**
     * @return HasOne
     */
    public function variable(): HasOne
    {
        return $this->hasOne(Variable::class, 'id', 'variable_id');
    }

    public function scopeCurrent($query) {
        return $query->where('lang_id', $this->lang_id);
    }
}
