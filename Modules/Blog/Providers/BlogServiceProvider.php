<?php

namespace Modules\Blog\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Blog\App\Providers\AuthServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'Blog');
        $this->registerRoutes();
    }

    public function register()
    {
        $this->app->register(AuthServiceProvider::class);
    }

    protected function registerRoutes()
    {
        if (!$this->app->routesAreCached()) {
            $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        }
    }
}
