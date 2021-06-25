<?php

namespace App\Providers;

use App\Repository\CustomerRepositoryImpl;
use App\Repository\Eloquent\EloquentRepository;
use App\Repository\Impl\CustomerRepository;
use App\Repository\Repository;
use App\Service\CustomerServiceImpl;
use App\Service\Impl\CustomerService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Repository::class , EloquentRepository::class);
        $this->app->singleton(CustomerServiceImpl::class , CustomerService::class);
        $this->app->singleton(CustomerRepositoryImpl::class , CustomerRepository::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
