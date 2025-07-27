<?php

namespace App\Repositories\Eloquent\Auth;

use App\Repositories\Contracts\Auth\AuthRepositoryInterface;
use App\DTOs\Auth\LoginDTO;
use App\DTOs\Auth\RegisterDTO;

class AuthRepository implements AuthRepositoryInterface {
    public function login(LoginDTO $login){
        
    }
    public function register(RegisterDTO $register){

    }
    public function refresh(){

    }
    public function me(){

    }
}
