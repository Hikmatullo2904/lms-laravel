<?php

namespace App\Http\Actions;

use App\Models\Permission;
use App\Models\Role;

class RoleRemovePermissionAction
{
    public function handle($id, array $request) {
        $role = Role::findOrFail($id);
        foreach($request['permissions'] as $permission) {
            $permission = Permission::findOrFail($permission);
            $role->permissions()->detach($permission);
        }
    }
}