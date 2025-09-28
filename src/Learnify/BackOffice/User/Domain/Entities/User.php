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

    public function create(String $username, String $email): self
    {
        return new self(Uuid::uuid4()->toString(), UserName::create($username), Email::create($email));
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
