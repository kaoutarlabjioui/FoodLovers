<?php

namespace App\Providers;

use App\Models\Tag;
use App\Repositories\CategoryRepository;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\IngredientRepository;
use App\Repositories\IngredientRepositoryInterface;
use App\Repositories\RecetteRepository;
use App\Repositories\RecetteRepositoryInterface;
use App\Repositories\RoleRepositoryInterface;
use App\Repositories\RoleRepository;
use App\Repositories\TagRepository;
use App\Repositories\TagRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use App\Services\AuthService;
use App\Services\IAuthService;
use App\Services\IRoleService;
use App\Services\CategoryService;
use App\Services\ICategoryService;
use App\Services\IIngredientService;
use App\Services\IngredientService;
use App\Services\IProduitService;
use App\Services\IRecetteService;
use App\Services\RecetteService;
use App\Services\TagService;
use App\Services\ITagService;
use App\Services\ProduitService;
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
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
       $this->app->bind(IRoleService::class, RoleService::class);
       $this->app->bind(IAuthService::class, AuthService::class);
       $this->app->bind(UserRepositoryInterface::class , UserRepository::class);
       $this->app->bind(CategoryRepositoryInterface::class,CategoryRepository::class);
       $this->app->bind(ICategoryService::class,CategoryService::class);
       $this->app->bind(IRecetteService::class,RecetteService::class);
       $this->app->bind(RecetteRepositoryInterface::class,RecetteRepository::class);
       $this->app->bind(TagRepositoryInterface::class,TagRepository::class);
       $this->app->bind(ITagService::class,TagService::class);
       $this->app->bind(IIngredientService::class,IngredientService::class);
       $this->app->bind(IngredientRepositoryInterface::class,IngredientRepository::class);
       $this->app->bind(ProduitRepositoryInterface::class,ProduitRepository::class);
       $this->app->bind(IProduitService::class,ProduitService::class);


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
