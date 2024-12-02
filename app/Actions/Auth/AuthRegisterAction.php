<?php

namespace App\Actions\Auth;

use App\Repositories\UserRepository;

class AuthRegisterAction {

    public function __construct(protected UserRepository $repository)
    {}
    
    
    /**
     * Handle the registration of a new user.
     *
     * @param array $request The request data containing 'first_name', 'last_name', 'email', 'password', 'password_confirmation', 'image'.
     * @return \App\Models\User The newly registered user.
     * @throws \Illuminate\Validation\ValidationException If validation fails.
     */
    public function handle(array $request) {
        return $this->repository->create($request);
    }

}