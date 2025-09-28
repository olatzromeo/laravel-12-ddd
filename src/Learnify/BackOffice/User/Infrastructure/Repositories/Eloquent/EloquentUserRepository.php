<?php

namespace Learnify\BackOffice\User\Infrastructure\Repositories\Eloquent;

use Learnify\BackOffice\User\Domain\Contracts\UserRepositoryInterface;
use Learnify\BackOffice\User\Domain\Entities\User;
use App\Models\User as EloquentUser;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function findById(string $uuid): ?User
    {
        $user = EloquentUser::find($uuid);
        if (null === $user) {
            return null;
        }

        return User::create(
            $user->id,
            $user->username,
            $user->email
        );
    }

    public function save(User $user): void
    {
        EloquentUser::updateOrCreate(
            ['id' => $user->id()],
            [
                'username' => $user->username()->value(),
                'email' => $user->email()->value(),
            ],
        );
    }
}
