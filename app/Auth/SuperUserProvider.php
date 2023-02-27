<?php

namespace App\Auth;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class SuperUserProvider implements UserProvider
{
    public function __construct(Root $user)
    {
        $this->user = $user;
    }

    public function retrieveById($identifier)
    {
        return $this->user;
    }

    public function retrieveByToken($identifier, $token) {
        return $this->user;
    }
    
    public function updateRememberToken(Authenticatable $user, $token)
    {
        $this->user->setRememberToken($token);
    }

    public function retrieveByCredentials(array $credentials)
    {
        return $this->user;
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return $credentials['password'] === $user->getAuthPassword();
    }
}
