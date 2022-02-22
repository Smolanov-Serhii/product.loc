<?php

namespace App\Models;

use App\Traits\HasSoftDeletedRelation;
use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;

class BlockTemplate extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes, HasSoftDeletedRelation;

    protected $fillable = [
        'path',
        'name',
        'enabled',
        'image_path',
    ];

    protected $softDelete_relations = [
        'attrs',
        'blocks'
    ];

    public static function template_list() {
        $path = resource_path('views/client/block_templates/templates');
        $templates = File::allFiles($path);
        return $templates;
    }

    public function blocks() {
        return $this
            ->hasMany(Block::class, 'block_template_id', 'id');
    }

    // PROPERTIES ATTRIBUTES

    /**
     * @return MorphMany
     */
    public function attrs():MorphMany
    {
        return $this->morphMany(BlockTemplateAttribute::class, 'attributable');
//            ->hasMany(Block_template_attributes::class,'model_id', 'id')
//            ->where('model','Block_templates');
    }

    // PROPERTIES REPEATERS

    /**
     * @return MorphMany
     */
    public function repeaters(): MorphMany
    {
        return $this->morphMany(BlockTemplateRepeater::class, 'repeatable');
//            ->hasMany(Block_template_repeators::class,'model_id', 'id')
//            ->where('model','Block_templates');
    }

    public function groups()
    {
        return $this
            ->belongsToMany(
                BlockTemplateGroup::class,
                'template_groups',
                'block_template_id'
            );
    }

    public function mappedGroupsById()
    {
        return $this->groups->mapWithKeys(function ($item) {
            return [$item->id => $item];
        });
    }
}
