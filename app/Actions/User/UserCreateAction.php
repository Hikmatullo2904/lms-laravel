<?php

namespace App\Actions\User;

use App\Repositories\UserRepository;

class UserCreateAction {

    public function __construct(
        protected UserRepository $userRepository
    ){}

    public function handle(array $request) {
        return $this->userRepository->create($request);
    }
}