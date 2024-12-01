<?php

namespace App\Actions\Role;

use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;

class RoleCreateAction 
{
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