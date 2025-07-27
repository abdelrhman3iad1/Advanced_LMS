<?php

namespace App\DTOs\Auth;

class RegisterDTO {
    public function __construct(
        public string $email,
        public string $password,
    ){}
}
