<?php

namespace App\Providers;

use App\Repositories\Contracts\PasteRepositoryContract;
use App\Repositories\Contracts\UserRepositoryContract;
use App\Repositories\PasteRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PasteRepositoryContract::class, PasteRepository::class);
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
    }
}
