<?php

namespace App\DTO\Auth;

final class SignInDTO
{
    public function __construct(
        private string $email,
        private string $password,
    ) {
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public static function fromArray(array $data): static
    {
        return new static(
            email: (string) $data['email'],
            password: (string) $data['password'],
        );
    }
}
