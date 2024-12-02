<?php
namespace App\Actions\Role;

use App\Models\Permission;
use App\Models\Role;

class RoleAddPermissionAction {

    
    /**
     * Handle the incoming request.
     *
     * @param int $id
     * @param array $request
     * @return void
     */
    public function handle($id, array $request) {
        $role = Role::findOrFail($id);
        foreach($request['permissions'] as $permission) {
            $permission = Permission::findOrFail($permission);
            $role->permissions()->attach($permission);
        }
    }
}