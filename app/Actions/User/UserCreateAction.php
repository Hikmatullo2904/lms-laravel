<?php

namespace App\Actions\User;

use App\Repositories\Contracts\UserRepositoryInterface;

class UserCreateAction {

    public function __construct(
        protected UserRepositoryInterface $userRepository
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