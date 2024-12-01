<?php

namespace App\Actions\User;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserGetAllAction {

    public function __construct(
        protected UserRepository $userRepository
    ) {}

    public function handle(Request $request) {
        return $this->userRepository->getAll($request);
    }
}