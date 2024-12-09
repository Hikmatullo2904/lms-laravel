<?php

namespace App\Actions\User;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

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
    public function handle(int $page, int $size) : LengthAwarePaginator {

        return $this->userRepository->getAll($page, $size);
    }
}