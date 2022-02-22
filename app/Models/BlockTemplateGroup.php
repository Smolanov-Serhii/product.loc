<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

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
