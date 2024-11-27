<?php

namespace App\Http\Actions;

use App\Models\Permission;

class PermissionGetAllAction 
{
    public function handle() {
        return Permission::all();
    }
}