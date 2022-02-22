<?php

namespace App\Models;

use App\Traits\HasRolesAndPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return BelongsToMany
     */
    public function profiles (): BelongsToMany
    {
        return $this
            ->belongsToMany(
                ModuleItem::class,
                'user_profile',
                'user_id',
                'module_item_id'
            );
    }

    public function getProfileAttribute ()
    {
        return $this
            ->profiles()
            ->first();
    }

//    public function instructors()
//    {
//        return $this->hasOne(Instructors::class);
//    }
//
//    public function students()
//    {
//        return $this->hasOne(Students::class);
//    }
//
//    public function profile()
//    {
//        return $this->instructors
//            ?: $this->students;
//    }
//
//
//    /**
//     * The attributes that should be class name of profile.
//     *
//     * @return string
//     */
//    public function type(): string
//    {
//        return strtolower(class_basename($this->profile()));
//    }

}
