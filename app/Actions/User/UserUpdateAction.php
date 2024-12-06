<?php

namespace App\Actions\User;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserUpdateAction
{


    public function __construct(
       protected UserRepositoryInterface $userRepository
    ){}



    
    /**
     * Handles the update of an existing user.
     *
     * @param User $user The user instance to be updated.
     * @param array $request The validated request data containing user attributes.
     * @return User The updated user instance.
     */
    public function handle(User $user, array $request) {
        return $this->userRepository->update($user, $request);
    }
}