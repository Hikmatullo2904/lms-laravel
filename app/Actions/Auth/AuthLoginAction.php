<?php
namespace App\Actions\Auth;

use App\Exceptions\CustomUnAuthorized;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthLoginAction {

    public function __construct(protected UserRepository $repository)
    {}
    
    public function handle(array $request) {
        $credentials = array_intersect_key($request, array_flip(['email', 'password']));
        $user = $this->repository->getByEmail($request['email']);
        if (!Auth::attempt($credentials)) {
            if(!$user || !Hash::check($request['password'], $user->password)) {
                throw new CustomUnAuthorized();
            }
        }
        $token = $user->createToken('token')->plainTextToken;
        return $token;

    }
}