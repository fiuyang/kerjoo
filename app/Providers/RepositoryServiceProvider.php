<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\AnnualLeaveInterface;
use App\Repositories\AnnualLeaveRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AnnualLeaveInterface::class,AnnualLeaveRepository::class);
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