<?php

namespace App\Actions\Role;

use App\Models\Permission;
use App\Models\Role;

class RoleRemovePermissionAction
{

    
    /**
     * Handle the incoming request to remove permissions from a role.
     *
     * @param int $id The id of the role.
     * @param array $request The validated request data containing 'permissions'.
     * @return void
     */
    public function handle($id, array $request) {
        $role = Role::findOrFail($id);
        foreach($request['permissions'] as $permission) {
            $permission = Permission::findOrFail($permission);
            $role->permissions()->detach($permission);
        }
    }
}