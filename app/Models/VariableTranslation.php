<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

/**
 * App\Models\VariableTranslation
 *
 * @property int $id
 * @property string $value
 * @property int|null $variable_id
 * @property int|null $lang_id
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Variable|null $variable
 * @method static \Illuminate\Database\Eloquent\Builder|VariableTranslation current()
 * @method static \Illuminate\Database\Eloquent\Builder|VariableTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VariableTranslation newQuery()
 * @method static \Illuminate\Database\Query\Builder|VariableTranslation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|VariableTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|VariableTranslation whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariableTranslation whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariableTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariableTranslation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariableTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariableTranslation whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariableTranslation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariableTranslation whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariableTranslation whereVariableId($value)
 * @method static \Illuminate\Database\Query\Builder|VariableTranslation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|VariableTranslation withoutTrashed()
 * @mixin \Eloquent
 */
class VariableTranslation extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $fillable = [
        'lang_id',
        'value'
    ];

    protected $lang_id;

    public function __construct(array $attributes = [])
    {
        $this->lang_id = Language::where('iso', App::getLocale())->first()->id;

        parent::__construct($attributes);
    }

    /**
     * @return HasOne
     */
    public function variable(): HasOne
    {
        return $this->hasOne(Variable::class, 'id', 'variable_id');
    }

    public function scopeCurrent($query) {
        return $query->where('lang_id', $this->lang_id);
    }
}
