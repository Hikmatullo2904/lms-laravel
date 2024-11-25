<?php

namespace App\Http\Controllers;

use App\Http\Actions\RoleCreateAction;
use App\Http\Actions\RoleAddPermissionAction;
use App\Http\Actions\RoleRemovePermissionAction;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct(
        protected RoleCreateAction $roleAddAction,
        protected RoleAddPermissionAction $roleAddPermissionAction,
        protected RoleRemovePermissionAction $roleRemovePermissionAction
    ){}
    public function create(RoleRequest $request) {
       $this->roleAddAction->handle($request);
    }
}
