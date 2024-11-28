<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Actions\UserCreateAction;
use App\Http\Actions\UserDeleteAction;
use App\Http\Actions\UserGetAllAction;
use App\Http\Actions\UserUpdateAction;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\ApiResponse;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(
        protected UserCreateAction $userCreateAction,
        protected UserGetAllAction $userGetAllAction,
        protected UserUpdateAction $userUpdateAction,
        protected UserDeleteAction $userDeleteAction
    ) {}
    
    public function create(UserRequest $request) {
        $user = $this->userCreateAction->handle($request->validated());
        return new UserResource($user);
    }

    public function update($id, UserUpdateRequest $request) {
        $user = User::findOrFail($id);
        $user = $this->userUpdateAction->handle($user, $request->validated());
        return new UserResource($user);
    }

    public function index(Request $request) {
        return new UserCollection($this->userGetAllAction->handle($request));
    }

    public function delete($id) {
        $this->userDeleteAction->handle(User::findOrFail($id));
        return new ApiResponse(null);
    }

}
