<?php

namespace App\Providers;

use App\Repositories\RoleRepositoryInterface;
use App\Repositories\ProduitRepositoryInterface;
use App\Repositories\RoleRepository;
use App\Repositories\ProduitRepository;
use App\Services\IRoleService;
use App\Services\IProduitService;
use Illuminate\Support\ServiceProvider;
use RoleService;
use ProduitService;

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
       $this->app->bind( ProduitRepositoryInterface::class,ProduitRepository::class);
       $this->app->bind(IProduitService::class, ProduitService::class);
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
