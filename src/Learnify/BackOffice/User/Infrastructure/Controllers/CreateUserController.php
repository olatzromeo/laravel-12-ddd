<?php

namespace Learnify\BackOffice\User\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Learnify\BackOffice\User\Application\CreateUser;
use Learnify\BackOffice\User\Infrastructure\Validators\CreateUserRequest;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CreateUserController extends Controller
{
    public function __construct(private readonly CreateUser $createUser) {}

    public function __invoke(CreateUserRequest $userRequest): Response
    {
        ($this->createUser)($userRequest->username, $userRequest->email);

        return response([], ResponseAlias::HTTP_OK);
    }
}
