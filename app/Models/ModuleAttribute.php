<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ModuleAttribute
 *
 * @property int $id
 * @property string $type
 * @property string $key
 * @property string $name
 * @property int|null $attributable_id
 * @property string|null $attributable_type
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleAttribute newQuery()
 * @method static \Illuminate\Database\Query\Builder|ModuleAttribute onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleAttribute whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleAttribute whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleAttribute whereAttributableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleAttribute whereAttributableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleAttribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleAttribute whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleAttribute whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleAttribute whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleAttribute whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleAttribute whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ModuleAttribute withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ModuleAttribute withoutTrashed()
 * @mixin \Eloquent
 */
class ModuleAttribute extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $fillable = [
        'type',
        'key',
        'name',
        'model'
    ];

    // PROPERTIES ATTRIBUTES
//    public function attrs() {
//        return $this
//            ->hasMany(Variable_translations::class,'variable_id', 'id');
//    }

    const TYPE_LIST = [
        'image',
        'input',
        'textarea',
        'editor',
        'repeater',
        'time',
        'file',
    ];
}
