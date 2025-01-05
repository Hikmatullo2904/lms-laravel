<?php

namespace App\Actions\Auth;

use Illuminate\Support\Facades\Auth;

class AuthLogoutAction 
{

    public function handle() : void 
    {
        $user = Auth::user();
        $user->currentAccessToken()->delete();
    }

}