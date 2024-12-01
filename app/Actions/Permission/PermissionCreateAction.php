<?php

namespace App\Actions\Permission;

use App\Models\Permission;

class PermissionCreateAction {
    public function handle(array $request) {
        Permission::create($request);
    }
}