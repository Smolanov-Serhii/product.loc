<?php

namespace App\Repositories;

use App\Models\PermissionGroup;

class PermissionGroupRepository
{
    public function all()
    {
        return PermissionGroup::all();
    }
}