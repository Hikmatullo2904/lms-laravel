<?php

namespace App\Actions\User;

use App\Models\User;

class UserDeleteAction {
    public function handle(User $user) {
        return $user->delete();
    }
}