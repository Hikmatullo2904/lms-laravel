<?php

namespace App\Actions\Auth;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class AuthRegisterAction {

    public function __construct(protected UserRepositoryInterface $repository)
    {}
    
    
    /**
     * Handle the registration of a new user.
     *
     * @param array $request The request data containing 'first_name', 'last_name', 'email', 'password', 'password_confirmation', 'image'.
     * @return \App\Models\User The newly registered user.
     * @throws \Illuminate\Validation\ValidationException If validation fails.
     */
    public function handle(array $request) : User {
        return $this->repository->create($request);
    }

}