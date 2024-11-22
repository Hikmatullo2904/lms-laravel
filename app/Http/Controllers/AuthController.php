<?php

namespace App\Http\Controllers;

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
