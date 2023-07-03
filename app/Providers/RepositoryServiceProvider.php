<?php

namespace App\Providers;

use App\Repositories\Contracts\PasteRepositoryContract;
use App\Repositories\PasteRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PasteRepositoryContract::class, PasteRepository::class);
    }
}
