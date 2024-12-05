<?php

namespace App\Actions\User;

use App\Models\User;

class UserDeleteAction {

    
    
    /**
     * Handles the deletion of a user.
     *
     * @param User $user The user instance to be deleted.
     * @return bool|null True if the deletion was successful, null otherwise.
     */
    public function handle(User $user) {
        return $user->delete();
    }
}