<?php

namespace App\Actions\Permission;

use App\Models\Permission;

class PermissionGetAllAction 
{
    public function handle() {
        return Permission::all();
    }
}