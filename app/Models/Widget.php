<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Widget
 *
 * @property int $id
 * @property string $slug
 * @property int $enable
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Block[] $blocks
 * @property-read int|null $blocks_count
 * @method static \Illuminate\Database\Eloquent\Builder|Widget newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Widget newQuery()
 * @method static \Illuminate\Database\Query\Builder|Widget onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Widget query()
 * @method static \Illuminate\Database\Eloquent\Builder|Widget whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Widget whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Widget whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Widget whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Widget whereEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Widget whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Widget whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Widget whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Widget withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Widget withoutTrashed()
 * @mixin \Eloquent
 */
class Widget extends Model
{
    use HasFactory, HasSystemFields, softDeletes;

    protected $fillable = [
        'slug',
        'enable',
    ];

    /**
     * @return MorphMany
     */
    public function blocks(): MorphMany
    {
        return $this
            ->morphMany(Block::class, 'blockable')
            ->orderBy('order', 'ASC');
    }
}
