<?php

namespace App\Repositories\Contracts;

use App\Models\User;
use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function getByEmail(string $email);

    public function getAll(int $page, int $size);

    public function create(array $request);

    public function update(User $user, array $request);
}