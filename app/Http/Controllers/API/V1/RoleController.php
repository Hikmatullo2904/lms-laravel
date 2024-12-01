<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\Role\RoleCreateAction;
use App\Actions\Role\RoleAddPermissionAction;
use App\Actions\Role\RoleGetAllAction;
use App\Actions\Role\RoleRemovePermissionAction;
use App\Http\Requests\RoleCrudPermissionRequest;
use App\Http\Requests\RoleRequest;
use App\Http\Resources\RoleCollection;
use App\Http\Resources\RoleResource;
use App\Models\Role;

class RoleController extends Controller
{
    public function __construct(
        protected RoleCreateAction $roleAddAction,
        protected RoleAddPermissionAction $roleAddPermissionAction,
        protected RoleRemovePermissionAction $roleRemovePermissionAction,
        protected RoleGetAllAction $roleGetAllAction
    ){}
    public function create(RoleRequest $request) {
       $this->roleAddAction->handle($request->validated());
    }

    public function addPermission($id, RoleCrudPermissionRequest $request) {
        $this->roleAddPermissionAction->handle($id, $request->validated());
    }

    public function removePermission($id, RoleCrudPermissionRequest $request) {
        $this->roleRemovePermissionAction->handle($id, $request->validated());
    }

    public function index() {
        return new RoleCollection($this->roleGetAllAction->handle());
    }

    public function show($id) {
        return new RoleResource(Role::findOrFail($id));
    }


}
