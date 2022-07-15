<?php

namespace App\Services;

use App\Models\Module;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * create user
     * @param array $data
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

        $profile = Module::where('name', 'profile')
            ->first()
            ->items()
            ->create();

        $user->profiles()->sync([$profile->id]);

        return $user;
    }

}