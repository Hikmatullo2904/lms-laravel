<?php

namespace App\Http\Actions;

use App\Models\Permission;

class PermissionCreateAction {
    public function handle(array $request) {
        Permission::create($request);
    }
}