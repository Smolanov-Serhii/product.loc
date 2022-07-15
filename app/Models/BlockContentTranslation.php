<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

/**
 * App\Models\BlockContentTranslation
 *
 * @property int $id
 * @property string|null $value
 * @property int|null $lang_id
 * @property int $block_content_id
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\BlockContent|null $content
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContentTranslation current()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContentTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContentTranslation newQuery()
 * @method static \Illuminate\Database\Query\Builder|BlockContentTranslation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContentTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContentTranslation whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContentTranslation whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContentTranslation whereBlockContentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContentTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContentTranslation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContentTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContentTranslation whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContentTranslation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlockContentTranslation whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|BlockContentTranslation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BlockContentTranslation withoutTrashed()
 * @mixin \Eloquent
 */
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

//    public function __get($key) {
//        return $this->getAttributeValue($key) ?? $this->getRelationValue($key) ?? '';
//    }

    // OWNER CONTENT

    /**
     * @return HasOne
     */
    public function content(): HasOne
    {
        return $this
            ->hasOne(BlockContent::class, 'id', 'block_content_id');
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
