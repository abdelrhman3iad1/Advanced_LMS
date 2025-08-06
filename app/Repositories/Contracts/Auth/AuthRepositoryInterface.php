<?php

namespace App\Repositories\Contracts\Auth;

use App\DTOs\Auth\LoginDTO;
use App\DTOs\Auth\RegisterDTO;
use App\Models\User;

interface AuthRepositoryInterface {
    public function login(array $data);

    public function findEmail(string $email);
    public function checkPassword(User $user , string $password);
    public function createToken(User $user);

    public function register(array $data);
    public function refresh();
    public function me();
}
