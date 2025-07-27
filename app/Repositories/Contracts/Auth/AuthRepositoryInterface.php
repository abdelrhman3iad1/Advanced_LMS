<?php

namespace App\Repositories\Contracts\Auth;

use App\DTOs\Auth\LoginDTO;
use App\DTOs\Auth\RegisterDTO;

interface AuthRepositoryInterface {
    public function login(array $data);
    public function register(array $data);
    public function refresh();
    public function me();
}
