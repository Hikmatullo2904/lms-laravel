<?php

namespace App\Repositories\Impl;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserRepository implements UserRepositoryInterface {

    public function getByEmail(string $email) {
        return User::where('email', $email)->first();
    }

    public function getAll(int $page, int $size) {
        $users = User::query()->paginate($size, ['*'], 'page', $page);
        return $users;
    }

    public function create(array $request) {
        return User::create($request);
    }

    public function update(User $user, array $request) {
        $user->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'image' => $request['image']
        ]);
        return $user;
    }

  

}