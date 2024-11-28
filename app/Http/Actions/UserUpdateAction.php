<?php

namespace App\Http\Actions;

use App\Models\User;
use App\Repositories\UserRepository;

class UserUpdateAction
{
    public function __construct(
       protected UserRepository $userRepository
    ){}
    public function handle(User $user, array $request) {
        return $this->userRepository->update($user, $request);
    }
}