<?php

namespace Learnify\BackOffice\User\Domain\Entities;

use Learnify\BackOffice\User\Domain\ValueObjects\Email;
use Learnify\BackOffice\User\Domain\ValueObjects\UserName;
use Ramsey\Uuid\Uuid;

readonly class User {
    private function __construct(
        private string $uuid,
        private UserName $username,
        private Email $email
    ) {}

    public static function create(string $username, string $email, ?string $uuid): self
    {
        return new self($uuid ?? Uuid::uuid4()->toString(), UserName::create($username), Email::create($email));
    }

    public function id(): string
    {
        return $this->uuid;
    }

    public function username(): UserName
    {
        return $this->username;
    }

    public function email(): Email
    {
        return $this->email;
    }
}
