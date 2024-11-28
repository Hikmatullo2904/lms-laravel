<?php

namespace App\Http\Actions;

use App\Models\Role;

class RoleGetAllAction
{
    public function handle() {
        return Role::all();
    }
}