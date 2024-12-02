<?php

namespace App\Actions\Permission;

use App\Models\Permission;

class PermissionGetAllAction 
{

    
    /**
     * Return all permissions.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[]
     */
    public function handle() {
        return Permission::all();
    }
}