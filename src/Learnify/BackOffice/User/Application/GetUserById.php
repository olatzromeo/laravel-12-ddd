<?php

namespace Learnify\BackOffice\User\Application;

use Learnify\BackOffice\User\Domain\Entities\User;
use Learnify\BackOffice\User\Domain\Contracts\UserRepositoryInterface;

readonly class GetUserById
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
    ){}

    public function __invoke(string $uuid): ?User
    {
        return $this->userRepository->findById($uuid);
    }
}
