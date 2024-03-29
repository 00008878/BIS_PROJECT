<?php

namespace App\DTO\Auth;

final class SignUpDTO
{
    public function __construct(
        private string $name,
        private string $surname,
        private string $email,
        private string $password,
    ) {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
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
            name: (string) $data['name'],
            surname: (string) $data['surname'],
            email: (string) $data['email'],
            password: (string) $data['password'],
        );
    }
}
