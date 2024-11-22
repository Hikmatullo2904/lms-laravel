<?php

namespace App\Http\Actions;

use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;

class AuthRegisterAction {

    public function __construct(protected UserRepository $repository)
    {}
    
    public function handle(array $request) {
        return $this->repository->create($request);
    }

}