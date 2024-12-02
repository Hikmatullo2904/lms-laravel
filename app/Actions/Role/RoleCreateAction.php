<?php

namespace App\Actions\Role;

use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;

class RoleCreateAction 
{

    
    /**
     * Handle the creation of a new role with associated permissions.
     *
     * @param array $request The validated request data containing 'name' and 'permissions'.
     * @return void
     */
    public function handle(array $request) {
        $role = Role::create([
            'name' => $request['name']
        ]);

        foreach($request['permissions'] as $permission) {
            $permission = Permission::findOrFail($permission);
            $role->permissions()->attach($permission);
        }
    }
}