<?php

namespace Learnify\BackOffice\User\Domain\ValueObjects;

use InvalidArgumentException;

readonly class UserName
{
    private function __construct(
        private string $name
    ){
        if (strlen($this->name) < 4) {
            throw new InvalidArgumentException('Username must be at least 4 characters');
        }

        if (strlen($this->name) > 30) {
            throw new InvalidArgumentException('Username must not exceed 30 characters');
        }

        if (!preg_match('/^[a-zA-Z0-9_]+$/', $this->name)) {
            throw new InvalidArgumentException('Username can only contain letters, numbers, and underscores');
        }

        if (trim($this->name) !== $this->name) {
            throw new InvalidArgumentException('Username must not start or end with spaces');
        }
    }

    public static function create(String $name): self
    {
        return new self($name);
    }

    public function value(): string
    {
        return $this->name;
    }
}
