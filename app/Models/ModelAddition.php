<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ModelAddition
 *
 * @property int $id
 * @property string|null $additable_type
 * @property int|null $additable_id
 * @property int|null $lang_id
 * @property string $title
 * @property string|null $content
 * @property string|null $excerpt
 * @property string|null $thumbnail
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ModelAddition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelAddition newQuery()
 * @method static \Illuminate\Database\Query\Builder|ModelAddition onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelAddition query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelAddition whereAdditableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelAddition whereAdditableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelAddition whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelAddition whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelAddition whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelAddition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelAddition whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelAddition whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelAddition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelAddition whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelAddition whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelAddition whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelAddition whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ModelAddition withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ModelAddition withoutTrashed()
 * @mixin \Eloquent
 */
class ModelAddition extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'thumbnail',
        'excerpt',
        'lang_id',
    ];

    /**
     * @return HasOne
     */
    public function owner(): HasOne
    {
        return $this
            ->hasOne($this->model, 'id', 'model_id');
    }
}
