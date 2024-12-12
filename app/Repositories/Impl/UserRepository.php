<?php

namespace App\Repositories\Impl;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepository implements UserRepositoryInterface {

    /**
     * Retrieve a user by their email address.
     *
     * @param string $email The email address to search for.
     * @return \App\Models\User|null The user with the given email address, or null if none found.
     */
    public function getByEmail(string $email) : User {
        return User::where('email', $email)->first();
    }

    /**
     * Retrieve a paginated list of users.
     *
     * @param int $page The page number to retrieve.
     * @param int $size The number of items per page.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator The paginated list of users.
     */
    public function getAll(int $page, int $size) : LengthAwarePaginator {
        $users = User::query()->paginate($size, ['*'], 'page', $page);
        return $users;
    }

    /**
     * Creates a new user with the given request data.
     *
     * @param array $request The request data containing user attributes.
     * @return \App\Models\User The newly created user instance.
     */
    public function create(array $request) : User {
        return User::create($request);
    }


    /**
     * Updates the specified user with the given request data.
     *
     * @param User $user The user instance to be updated.
     * @param array $request The request data containing user attributes to update.
     * @return User The updated user instance.
     */
    public function update(User $user, array $request) : User {
        $user->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'image' => $request['image']
        ]);
        return $user;
    }

  

}