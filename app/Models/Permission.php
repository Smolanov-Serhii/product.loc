<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'permission_group_id'
    ];

    /**
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this
            ->belongsToMany(
                Role::class,
                'roles_permissions'
            );
    }

    /**
     * @return BelongsTo
     */
    public function group(): BelongsTo
    {
        return $this
            ->belongsTo(
                PermissionGroup::class,
                'permission_group_id',
            );
    }
}
