<?php

namespace App\Repositories;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserRepository {

    public function create(array $request) {
        return User::create($request);
    }

    public function getByEmail(string $email) {
        return User::where('email', $email)->first();
    }

}