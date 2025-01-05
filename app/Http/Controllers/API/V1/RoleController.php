<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\Role\RoleCreateAction;
use App\Actions\Role\RoleAddPermissionAction;
use App\Actions\Role\RoleGetAllAction;
use App\Actions\Role\RoleRemovePermissionAction;
use App\Http\Requests\RoleCrudPermissionRequest;
use App\Http\Requests\RoleRequest;
use App\Http\Resources\ApiResponse;
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
    ) {
    }
    /**
     * Create a new role with the specified attributes.
     *
     * @param RoleRequest $request The request containing the validated role data.
     * @return void
     */
    public function create(RoleRequest $request)
    {
        $this->roleAddAction->handle($request->validated());
    }

    /**
     * Add permissions to a role.
     *
     * @param int $id The id of the role.
     * @param RoleCrudPermissionRequest $request The validated request data containing 'permissions'.
     * @return void
     */
    public function addPermission(int $id, RoleCrudPermissionRequest $request)
    {
        $this->roleAddPermissionAction->handle($id, $request->validated());
    }

    /**
     * Remove permissions from a role.
     *
     * @param int $id The id of the role.
     * @param RoleCrudPermissionRequest $request The validated request data containing 'permissions'.
     * @return ApiResponse
     */
    public function removePermission(int $id, RoleCrudPermissionRequest $request)
    {
        $this->roleRemovePermissionAction->handle($id, $request->validated());
        return new ApiResponse(null);
    }


    /**
     * Return a list of all roles.
     *
     * @return \App\Http\Resources\RoleCollection
     */
    public function index()
    {
        return new RoleCollection($this->roleGetAllAction->handle());
    }

    /**
     * Get a role by the specified id.
     *
     * @param int $id The id of the role.
     * @return \App\Http\Resources\RoleResource
     */
    public function show(int $id) : RoleResource
    {
        return new RoleResource(Role::findOrFail($id));
    }


}
