<?php

namespace Learnify\BackOffice\User\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Learnify\BackOffice\User\Application\GetUserById;

final class GetUserController extends Controller
{
    public function __construct(
        private readonly GetUserById $getUserById
    ) {}

    public function __invoke(string $id): JsonResponse
    {
        $user = ($this->getUserById)($id);

        return response()->json([
            'status' => true,
            'data' => $user,
            'message' => 'SUCCESS'
        ]);
    }
}
