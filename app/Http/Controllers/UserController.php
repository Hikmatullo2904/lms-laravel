<?php

namespace App\Http\Controllers;

use App\Http\Actions\UserCreateAction;
use App\Http\Requests\UserRequest;
use App\Http\Resources\ApiResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(
        protected UserCreateAction $userCreateAction
    ) {}
    
    public function create(UserRequest $request) {
        $user = $this->userCreateAction->handle($request->validated());
        return new ApiResponse($user);
    }

    public function index() {
        
    }



}
