<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Learnify\BackOffice\User\Domain\Contracts\UserRepositoryInterface;
use Learnify\BackOffice\User\Infrastructure\Repositories\Eloquent\EloquentUserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
