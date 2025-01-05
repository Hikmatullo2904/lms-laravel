<?php
namespace App\Actions\Auth;

use App\Exceptions\CustomUnAuthorized;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthLoginAction
{

    public function __construct(protected UserRepositoryInterface $repository)
    {
    }

    /**
     * Handles the authentication process for a user.
     *
     * @param array $request The request data containing 'email' and 'password'.
     * @return string The generated API token for the authenticated user.
     * @throws CustomUnAuthorized If authentication fails due to invalid credentials.
     */
    public function handle(array $request): string
    {
        $credentials = array_intersect_key($request, array_flip(['email', 'password']));
        $user = $this->repository->getByEmail($request['email']);

        if (!Auth::attempt($credentials)) {
            if (!$user || !Hash::check($request['password'], $user->password)) {
                throw new CustomUnAuthorized();
            }
        }

        // Revoke all existing tokens for the user
        $user->tokens()->delete();

        // Generate a new token
        $token = $user->createToken('token')->plainTextToken;

        return $token;
    }

}