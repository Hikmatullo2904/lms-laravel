<?php

namespace App\Http\Actions;

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