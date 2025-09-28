<?php

namespace Learnify\BackOffice\User\Domain\Repositories;

use Learnify\BackOffice\User\Domain\Entities\User;

interface UserRepositoryInterface
{
    public function findById(string $id): User;
    public function save(User $user): void;
}
