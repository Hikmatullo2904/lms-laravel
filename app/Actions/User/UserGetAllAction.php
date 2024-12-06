<?php

namespace App\Actions\User;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserGetAllAction {

    public function __construct(
        protected UserRepositoryInterface $userRepository
    ) {}


    
    /**
     * Handle the retrieval of all users.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\App\Models\User[]
     */
    public function handle(Request $request) {
        return $this->userRepository->getAll($request);
    }
}