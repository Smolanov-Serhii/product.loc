<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class BlockContentTranslation extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $fillable = [
        'value',
//        'sub_title',
//        'content',
//        'link',
//        'image_path',
        'lang_id',
        'block_content_id',
    ];

    protected $lang_id;

    public function __construct(array $attributes = [])
    {
        $this->lang_id = Language::where('iso', App::getLocale())->first()->id;

        parent::__construct($attributes);
    }

    public function __get($key) {
        return $this->getAttributeValue($key) ?? $this->getRelationValue($key) ?? '';
    }

    // OWNER CONTENT

    /**
     * @return HasOne
     */
    public function content (): HasOne
    {
        return $this
            ->hasOne(BlockContent::class, 'id', 'block_id')
            ->with('contents');
    }


    // PROPERTY OPTION
//    public function options () {
//        return $this->hasMany(Block_option_content_translations::class,'block_content_translation_id', 'id');
//    }

//    public function optionContent($type_name) {
//        return $this->options->mapToGroups(function ($item, $key) {
//            $type_name = Block_option_content_translations::TYPE_LIST[$item['type']];
//            return [$type_name => $item['value']];
//        })[$type_name];
//    }

    public function scopeCurrent($query) {
        return $query->where('lang_id', $this->lang_id);
    }
}
