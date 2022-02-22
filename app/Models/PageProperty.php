<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PageProperty extends Model
{
    use HasFactory, HasSystemFields;

    protected $fillable = [
        'lang_id',
        'page_id',
        'enabled',
        'title',
        'keywords',
        'description',
        'h1',
        'h2',
        'alias',
    ];

    /**
     * @return HasOne
     */
    public function page(): HasOne {
        return $this->hasOne(Page::class, 'id', 'page_id')->with('blocks');
    }

    /**
     * @return BelongsTo
     */
    public function lang(): BelongsTo {
        return $this->belongsTo(Language::class, 'lang_id');
    }

    public function scopeCurrentTranslate($query)
    {
        return $this->where('lang_id' , $this->lang);
    }
}
