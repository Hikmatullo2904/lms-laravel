<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\Auth\AuthLoginAction;
use App\Actions\Auth\AuthRegisterAction;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\ApiResponse;

class AuthController extends Controller
{
    public function __construct(
        protected AuthLoginAction $loginAction,
        protected AuthRegisterAction $registerAction
    ) {}

    /**
     * Handle a login request for the application.
     *
     * @param LoginRequest $request The request containing the validated user credentials.
     * @return \App\Http\Resources\ApiResponse
     */
    public function login(LoginRequest $request){
        $token = $this->loginAction->handle($request->validated());
        return new ApiResponse($token);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param UserRequest $request The request containing the validated user data.
     * @return \App\Http\Resources\ApiResponse
     */
    public function register(UserRequest $request){
        $user = $this->registerAction->handle($request->validated());
        if(!$user){
            return response()->json([
                'success' => false,
                'message' => 'Failed to register user'
            ]);
        }
        $token = $user->createToken('token')->plainTextToken;
        return new ApiResponse($token);
    }
}
