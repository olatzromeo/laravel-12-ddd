<?php

use Learnify\BackOffice\User\Infrastructure\Controllers\GetUserController;
use Learnify\BackOffice\User\Infrastructure\Controllers\CreateUserController;


Route::get('/{id}', GetUserController::class);
Route::post('/store', CreateUserController::class);

//Authenticathed route example
// Route::middleware(['auth:sanctum','activitylog'])->get('/', [ExampleGETController::class, 'index']);
