<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\App;

class Language extends Model
{
    use HasFactory, HasSystemFields;

    protected $fillable = [
        'iso',
        'enabled',
    ];

    public function scopeEnabled($query) {
        return $query->where('enabled', true);
    }

    public function scopeCurrent($query) {
        return $query->where('iso', App::getLocale());
    }

    /**
     * @return HasMany
     */
    public function pages():HasMany
    {
        return $this->hasMany(PageProperty::class, 'lang_id');
    }
}
