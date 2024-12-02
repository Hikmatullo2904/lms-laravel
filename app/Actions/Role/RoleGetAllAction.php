<?php

namespace App\Actions\Role;

use App\Models\Role;

class RoleGetAllAction
{

    
    /**
     * Retrieve all roles.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\App\Models\Role[]
     */
    public function handle() {
        return Role::all();
    }
}