<?php

namespace Tots\Role\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Tots\Auth\Guards\AuthGuard;
use Tots\Auth\Services\AuthService;

class RoleServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register migrations
        if($this->app->runningInConsole()){
            $this->registerMigrations();
        }
    }
    /**
     * Register migrations library
     *
     * @return void
     */
    protected function registerMigrations()
    {
        $mainPath = database_path('migrations');
        $paths = array_merge([
            './vendor/tots/role-lumen/database/migrations'
        ], [$mainPath]);
        $this->loadMigrationsFrom($paths);
    }

    /**
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
