<?php

namespace Learnify\BackOffice\User\Domain\ValueObjects;

use InvalidArgumentException;

readonly class Email
{
    public function __construct(
        private string $email
    ) {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("Invalid email");
        }
    }

    public static function create(string $email): self
    {
        return new self($email);
    }

    public function value(): string
    {
        return $this->email;
    }
}
