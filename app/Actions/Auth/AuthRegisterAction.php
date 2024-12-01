<?php

namespace App\Actions\Auth;

use App\Repositories\UserRepository;

class AuthRegisterAction {

    public function __construct(protected UserRepository $repository)
    {}
    
    public function handle(array $request) {
        return $this->repository->create($request);
    }

}