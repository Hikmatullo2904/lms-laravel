<?php

namespace App\Http\Actions;

use App\Models\User;

class UserDeleteAction {
    public function handle(User $user) {
        return $user->delete();
    }
}