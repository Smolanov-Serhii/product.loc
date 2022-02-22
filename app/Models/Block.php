<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Block extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $fillable = [
        'block_template_id',
        'order',
        'enabled',
        'deleted'
    ];


    /**
     * Owner model con be
     * Pages, Module_items, Widget....
     *
     * @return MorphTo
     */
    public function blockable(): MorphTo
    {
        return $this->morphTo();
    }

    // PROPERTY TEMPLATE

    /**
     * @return HasOne
     */
    public function template(): HasOne
    {
        return $this
            ->hasOne(BlockTemplate::class, 'id', 'block_template_id')
            ->with(['attrs', 'repeaters.attrs']);
    }

    public function attrs()
    {
        return $this
            ->template
            ->attrs()
            ->with('setting');
    }

    public function repeaters()
    {
        return $this
            ->template
            ->repeaters();
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
            ->template
            ->attrs
            ->mapWithKeys(function ($attr) use ($contents) {
                $value = $contents[$attr->id]->translations[0] ?? $attr;
//                $value = $contents[$attr->id]->translations[0] ?? $attr;
//                dd($contents);
//                if(!$contents[$attr->id]) {
//                    dd($contents[$attr->id]);
//                }
//                dd([$contents[$attr->id] => $value]);
                return [$attr->key => $value];
            });
    }

//    public function mappedRepeator () {
//        return $this->
//    }

    // PROPERTIES CONTENT
    /**
     * @return MorphMany
     */
    public function contents(): MorphMany
    {
        return $this
            ->morphMany(BlockContent::class, 'contentable');
//        return $this
//            ->hasMany(Block_contents::class,'block_id', 'id');
    }

    // PROPERTIES ITERATIONS

    /**
     * @return MorphMany
     */
    public function iterations(): MorphMany
    {
        return $this->morphMany(BlockTemplateRepeaterIteration::class, 'iterable')->with('iterations');
    }

    public function groupedIterationsByRepeaterId($model)
    {
        $groupedByRepeater = $model
            ->iterations()
            ->orderBy('order')
            ->with('contents.translate')
            ->get()
            ->groupBy('block_template_repeater_id');

        foreach ($groupedByRepeater as $iterations) {
            foreach ($iterations as $iteration) {
                if ($iteration->iterations()->count()) {
                    $iteration['iterations'] = $this->groupedIterationsByRepeaterId($iteration);
                }
            }
        }
        return $groupedByRepeater;
    }

    public function scopeEnabled($query)
    {
        return $this->where('enabled');
    }

    /**
     * @return Collection
     */
    public function fillings(): Collection
    {
        $fillings = collect([
            'contents' => $this
                ->contents()
                ->with('translate')
                ->get(),
            'iterations' => $this->groupedIterationsByRepeaterId($this)
        ]);

        return $fillings;
    }
}
