<?php

namespace App\Providers;

use App\Interfaces\CandidatesRepositoryInterface;
use App\Repositories\CandidatesRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CandidatesRepositoryInterface::class, CandidatesRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
