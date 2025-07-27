<?php

namespace App\Services\Auth;

use App\Repositories\Eloquent\Auth\AuthRepository;

class AuthService {
    public function __construct(private AuthRepository $authRepository){}

    public function login($data){
        return $this->authRepository->login($data);
    }

}
