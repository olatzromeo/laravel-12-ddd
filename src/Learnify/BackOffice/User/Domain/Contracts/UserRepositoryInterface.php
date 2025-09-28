<?php

    namespace Learnify\BackOffice\User\Domain\Contracts;

use Learnify\BackOffice\User\Domain\Entities\User;

interface UserRepositoryInterface
{
    public function findById(string $uuid): ?User;
    public function save(User $user): void;
}
