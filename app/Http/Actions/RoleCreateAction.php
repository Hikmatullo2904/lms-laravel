<?php

namespace App\Http\Actions;

use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;

class RoleCreateAction 
{
    public function handle(RoleRequest $request) {
        $role = Role::create([
            'name' => $request->name
        ]);

        foreach($request->permissions as $permission) {
            $permission = Permission::where('name', $permission)->firstOrFail();
            $role->permissions()->attach($permission);
        }
    }
}