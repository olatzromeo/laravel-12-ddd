<?php

namespace Learnify\BackOffice\User\Application;

use Learnify\BackOffice\User\Domain\Entities\User;
use Learnify\BackOffice\User\Domain\Contracts\UserRepositoryInterface;

readonly class CreateUser
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
    ){}

    public function __invoke(string $username, string $email): ?User
    {
        $user = User::create($username, $email);

        $this->userRepository->save($user);

        return $user;
    }
}
