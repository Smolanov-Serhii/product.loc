<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\PageProperty
 *
 * @property int $id
 * @property int|null $lang_id
 * @property int|null $page_id
 * @property int $enabled
 * @property string|null $title
 * @property string|null $keywords
 * @property string|null $description
 * @property string|null $h1
 * @property string|null $h2
 * @property string|null $alias
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Language|null $lang
 * @property-read \App\Models\Page|null $page
 * @method static \Illuminate\Database\Eloquent\Builder|PageProperty currentTranslate()
 * @method static \Illuminate\Database\Eloquent\Builder|PageProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|PageProperty whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageProperty whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageProperty whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageProperty whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageProperty whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageProperty whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageProperty whereH1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageProperty whereH2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageProperty whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageProperty whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageProperty wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageProperty whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageProperty whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
