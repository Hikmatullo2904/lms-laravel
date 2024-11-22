<?php
namespace App\Http\Actions;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\UserRepository;

class AuthLoginAction {

    public function __construct(protected UserRepository $repository)
    {}
    
    public function handle(LoginRequest $request) {
        $credentials = $request->only('email', 'password');
        $user = $this->repository->getByEmail($request->email);
        if (!$user) {
            
        }
        return $user;

    }
}