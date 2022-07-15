<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Models\BlockTemplateGroup
 *
 * @property int $id
 * @property string $key
 * @property string|null $groupable_type
 * @property int|null $groupable_id
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $groupable
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BlockTemplate[] $templates
 * @property-read int|null $templates_count
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateGroup whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateGroup whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateGroup whereGroupableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateGroup whereGroupableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateGroup whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockTemplateGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BlockTemplateGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
    ];

    const PAGES_GROUP_ID = 1;

    /**
     * @return BelongsToMany
     */
    public function templates(): BelongsToMany
    {
        return $this
            ->belongsToMany(
                BlockTemplate::class,
                'template_groups',
                'block_template_group_id',
                'block_template_id'
            );

    }

    /**
     * @return MorphTo
     */
    public function groupable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return BlockTemplateGroup
     */
    static function pagesGroup(): BlockTemplateGroup
    {
        return (new self)::find(self::PAGES_GROUP_ID);
    }
}
