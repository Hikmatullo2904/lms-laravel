<?php
namespace App\Http\Actions;

use App\Models\Permission;
use App\Models\Role;

class RoleAddPermissionAction {
    public function handle($id, $permissions) {
        $role = Role::findOrFail($id);
        foreach($permissions as $permission) {
            $permission = Permission::findOrFail($permission);
            $role->permissions()->attach($permission);
        }
    }
}