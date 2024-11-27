<?php

namespace App\Http\Actions;

use App\Repositories\UserRepository;

class UserGetAllAction {

    public function __construct(
        protected UserRepository $userRepository
    ) {}

    public function handle() {
        return $this->userRepository->getAll();
    }
}