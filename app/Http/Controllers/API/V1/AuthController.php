<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Actions\AuthLoginAction;
use App\Http\Actions\AuthRegisterAction;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\ApiResponse;

class AuthController extends Controller
{
    public function __construct(
        protected AuthLoginAction $loginAction,
        protected AuthRegisterAction $registerAction
    ) {}

    public function login(LoginRequest $request){
        $token = $this->loginAction->handle($request->validated());
        return new ApiResponse($token);
    }

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
