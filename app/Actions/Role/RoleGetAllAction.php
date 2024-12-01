<?php

namespace App\Actions\Role;

use App\Models\Role;

class RoleGetAllAction
{
    public function handle() {
        return Role::all();
    }
}