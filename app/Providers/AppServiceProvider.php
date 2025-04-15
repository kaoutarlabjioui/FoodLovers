<?php

namespace App\Providers;

use App\Repositories\RoleRepositoryInterface;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use App\Services\AuthService;
use App\Services\IAuthService;
use App\Services\IRoleService;
use Illuminate\Support\ServiceProvider;
use RoleService;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind( RoleRepositoryInterface::class, RoleRepository::class);
       $this->app->bind(IRoleService::class, RoleService::class);
       $this->app->bind(IAuthService::class, AuthService::class);
       $this->app->bind(UserRepositoryInterface::class , UserRepository::class);
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
