<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Variable
 *
 * @property int $id
 * @property string $key
 * @property string $name
 * @property int|null $type
 * @property string $section
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\VariableTranslation|null $translate
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\VariableTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Variable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Variable newQuery()
 * @method static \Illuminate\Database\Query\Builder|Variable onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Variable query()
 * @method static \Illuminate\Database\Eloquent\Builder|Variable whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variable whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variable whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variable whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variable whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variable whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variable whereSection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variable whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variable whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Variable withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Variable withoutTrashed()
 * @mixin \Eloquent
 */
class Variable extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $fillable = [
        'key',
        'name',
        'type',
        'section'
    ];

    // PROPERTIES ATTRIBUTES

    /**
     * @return HasMany
     */
    public function translations(): HasMany
    {
        return $this
            ->hasMany(VariableTranslation::class,'variable_id', 'id');
    }

    public function translate() {

        return $this
            ->hasOne(VariableTranslation::class, 'variable_id', 'id')
            ->current();
    }

    const TYPE_LIST = [
        'image',
        'input',
        'textarea',
        'editor'
    ];

//    public function translate() {
//        return $this
//            ->hasOne(Variable_translations::class,'variable_id', 'id')
//            ->current();
//    }
}
