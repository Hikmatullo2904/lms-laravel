<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function getByEmail(string $email);

    public function getAll(Request $request);

    public function create(array $request);

    public function update(User $user, array $request);
}