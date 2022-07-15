<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ModelSeo
 *
 * @property int $id
 * @property string|null $seoable_type
 * @property int|null $seoable_id
 * @property int|null $lang_id
 * @property string $title
 * @property string $alias
 * @property string|null $thumbnail
 * @property string $meta_keywords
 * @property string $meta_description
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read Model|\Eloquent $seoable
 * @method static \Illuminate\Database\Eloquent\Builder|ModelSeo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelSeo newQuery()
 * @method static \Illuminate\Database\Query\Builder|ModelSeo onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelSeo query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelSeo whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelSeo whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelSeo whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelSeo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelSeo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelSeo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelSeo whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelSeo whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelSeo whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelSeo whereSeoableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelSeo whereSeoableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelSeo whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelSeo whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelSeo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ModelSeo withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ModelSeo withoutTrashed()
 * @mixin \Eloquent
 */
class ModelSeo extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $table = 'seo';

    protected $fillable = [
        'alias',
        'title',
        'meta_keywords',
        'meta_description',
        'thumbnail',
        'lang_id',
        'model'
    ];

    /**
     * @return MorphTo
     */
    public function seoable(): MorphTo
    {
        return $this->morphTo();
//            ->hasOne(
//                'App\Models\\' . $this->model,
//                'id',
//                'model_id'
//            );
    }
}
