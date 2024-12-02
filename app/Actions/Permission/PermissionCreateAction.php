<?php

namespace App\Actions\Permission;

use App\Models\Permission;

class PermissionCreateAction {

        
    /**
     * Handle the creation of a new permission.
     *
     * @param array $request The validated request data containing permission attributes.
     * @return void
     */
    public function handle(array $request) {
        Permission::create($request);
    }
}