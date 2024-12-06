<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\Permission\PermissionCreateAction;
use App\Actions\Permission\PermissionGetAllAction;
use App\Http\Requests\PermissionRequest;
use App\Http\Resources\ApiResponse;

class PermissionController extends Controller
{
    public function __construct(
        protected PermissionCreateAction $permissionCreateAction,
        protected PermissionGetAllAction $permissionGetAllAction
    ){}

    /**
     * Create a new permission.
     *
     * @param \App\Http\Requests\PermissionRequest $request
     * @return \App\Http\Resources\ApiResponse
     */
    public function create(PermissionRequest $request) {
        $this->permissionCreateAction->handle($request->validated());
        return new ApiResponse(null);
    }

    /**
     * Retrieve a list of all permissions.
     *
     * @return \App\Http\Resources\ApiResponse
     */
    public function index() {
        return new ApiResponse($this->permissionGetAllAction->handle());
    }
}
