<?php

namespace App\Http\Controllers;

use App\Http\Actions\PermissionCreateAction;
use App\Http\Actions\PermissionGetAllAction;
use App\Http\Actions\RoleCreateAction;
use App\Http\Requests\PermissionRequest;
use App\Http\Resources\ApiResponse;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct(
        protected PermissionCreateAction $permissionCreateAction,
        protected PermissionGetAllAction $permissionGetAllAction
    ){}

    public function create(PermissionRequest $request) {
        $this->permissionCreateAction->handle($request->validated());
        return new ApiResponse(null);
    }

    public function index() {
        return new ApiResponse($this->permissionGetAllAction->handle());
    }
}
