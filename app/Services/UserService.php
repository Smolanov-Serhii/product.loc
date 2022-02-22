<?php

namespace App\Services;

use App\Models\Modules;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * create user
     * @return User
     */
    public function createUser(array $data): User
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->setRole($data['role']);

        $profile = Modules::where('name', 'profile')
            ->first()
            ->items()
            ->create();

        $user->profiles()->sync([$profile->id]);

        return $user;
    }

}