<?php

namespace App\Modules\Users\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;

class UsersServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Modules\Users\Domain\Repositories\UserRepositoryInterface',
                         'App\Modules\Users\Infrastructure\Persistence\Repositories\EloquentUserRepository');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(
            __DIR__ . '/../../Presentation/view',
            'users'
        );
        
        $this->loadRoutesFrom(
            __DIR__ . '/../../Presentation/Http/routes.php'
            
        );
    }
}

