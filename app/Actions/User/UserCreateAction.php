<?php

namespace App\Actions\User;

use App\Repositories\UserRepository;

class UserCreateAction {

    public function __construct(
        protected UserRepository $userRepository
    ){}

    
    /**
     * Handles the creation of a new user.
     *
     * @param array $data The validated request data containing user attributes.
     * @return \App\Models\User The newly created user.
     */
    public function handle(array $data) {
        return $this->userRepository->create($data);
    }
}