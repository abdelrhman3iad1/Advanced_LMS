<?php

namespace App\Repositories\Contracts\Auth;

use App\DTOs\Auth\LoginDTO;
use App\DTOs\Auth\RegisterDTO;

interface AuthRepositoryInterface {
    public function login(LoginDTO $login);
    public function register(RegisterDTO $register);
    public function refresh();
    public function me();
}
