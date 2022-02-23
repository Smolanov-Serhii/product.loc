<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlockTemplateRepeaterIteration extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $fillable = [
        'block_template_repeater_id',
        'order'
    ];


    // PROPERTIES CONTENT

    /**
     * @return MorphMany
     */
    public function contents(): MorphMany
    {
        return $this
            ->morphMany(BlockContent::class, 'contentable');
//            ->hasMany(Block_contents::class,'block_template_repeater_iteration_id', 'id');
    }

    public function mappedByKey()
    {

        $contents = $this
            ->contents()
            ->with('translations')
            ->get()
            ->mapWithKeys(function ($content) {
                return [$content->block_template_attribute_id => $content];
            });

        return $this
            ->repeater
            ->attrs
            ->mapWithKeys(function ($attr) use ($contents) {
                $value = optional($contents[$attr->id]->translate)->value ?? $attr;
                return [$attr->key => $value];
            });
    }
//    public function mappedByKey ()
//    {
//        $contents = $this->contents()->with('translations')->get()->mapWithKeys(function ($content) {
//            return [$content->block_template_attribute_id => $content];
//        });
//        return $this
//            ->repeater
//            ->attrs
//            ->mapWithKeys(function($attr) use ($contents) {
//                $value = $contents[$attr->id]->translations[0] ?? $attr;
////                $value = $contents[$attr->id]->translations[0] ?? $attr;
////                dd($contents);
////                if(!$contents[$attr->id]) {
////                    dd($contents[$attr->id]);
////                }
////                dd([$contents[$attr->id] => $value]);
//                return [$attr->key => $value];
//            });
//    }

    // PROPERTY TEMPLATE

    /**
     * @return HasOne
     */
    public function repeater(): HasOne
    {
        return $this
            ->hasOne(BlockTemplateRepeater::class, 'id', 'block_template_repeater_id')
            ;
    }

    // PROPERTIES ITERATIONS

    /**
     * @return MorphMany
     */
    public function iterations(): MorphMany
    {
        return $this->morphMany(BlockTemplateRepeaterIteration::class, 'iterable');
    }
}
