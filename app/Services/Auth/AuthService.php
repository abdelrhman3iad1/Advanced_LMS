<?php

namespace App\Services\Auth;

use App\Repositories\Eloquent\Auth\AuthRepository;

class AuthService {
    public function __construct(private AuthRepository $authRepository){}

    

}
