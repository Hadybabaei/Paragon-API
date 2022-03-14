<?php

namespace App\Providers;

use App\Repositories\Interfaces\userInterface;
use App\Repositories\UserRepository;
use App\Repositories\Interfaces\articleInterface;
use App\Repositories\ArticleRepository;
use Illuminate\Support\Facades\Schema;
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
        
        $this->app->singleton(userInterface::class,UserRepository::class);
        $this->app->singleton(articleInterface::class,ArticleRepository::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
