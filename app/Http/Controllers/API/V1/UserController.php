<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\User\UserCreateAction;
use App\Actions\User\UserDeleteAction;
use App\Actions\User\UserGetAllAction;
use App\Actions\User\UserUpdateAction;
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
    
    /**
     * Create a new user in storage.
     *
     * @param \App\Http\Requests\UserRequest $request The request containing the validated user data.
     * @return \App\Http\Resources\UserResource
     */
    public function create(UserRequest $request) {
        $user = $this->userCreateAction->handle($request->validated());
        return new UserResource($user);
    }

    /**
     * Update the specified user in storage.
     *
     * @param int $id The ID of the user to update.
     * @param \App\Http\Requests\UserUpdateRequest $request The request containing the validated user data.
     * @return \App\Http\Resources\UserResource
     */
    public function update($id, UserUpdateRequest $request) {
        $user = User::findOrFail($id);
        $user = $this->userUpdateAction->handle($user, $request->validated());
        return new UserResource($user);
    }

    /**
     * Retrieve a list of all users.
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\UserCollection
     */
    public function index(Request $request) {
        return new UserCollection($this->userGetAllAction->handle($request));
    }

    /**
     * Delete the specified user by ID.
     *
     * @param int $id The ID of the user to delete.
     * @return \App\Http\Resources\ApiResponse
     */
    public function delete($id) {
        $this->userDeleteAction->handle(User::findOrFail($id));
        return new ApiResponse(null);
    }

}
