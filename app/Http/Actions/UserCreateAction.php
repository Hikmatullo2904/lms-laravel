<?php

namespace App\Http\Actions;

use App\Models\User;

class UserCreateAction {
    public function handle(array $request) {
        return User::create($request);
    }
}