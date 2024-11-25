<?php
namespace App\Http\Actions;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthLoginAction {

    public function __construct(protected UserRepository $repository)
    {}
    
    public function handle(LoginRequest $request) {
        $credentials = $request->only('email', 'password');
        $user = $this->repository->getByEmail($request->email);
        if (!Auth::attempt($credentials)) {
            if(!$user || !Hash::check($request->password, $user->password)) {
                
            }
        }
        $token = $user->createToken('token')->plainTextToken;
        return $token;

    }
}