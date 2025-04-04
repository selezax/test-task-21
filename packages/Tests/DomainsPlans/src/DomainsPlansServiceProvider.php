<?php
namespace Tests\DomainsPlans;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class DomainsPlansServiceProvider extends ServiceProvider
{
    const NAMESPACE_CR = 'Tests\DomainsPlans\Http\Controllers';
    const PREFIX_PACKAGE = 'tdp';

    public function register()
    {
        // ---
        $this->mergeConfigFrom(realpath(__DIR__ . '/../config/' . self::PREFIX_PACKAGE . '.php'), self::PREFIX_PACKAGE);

    }

    public function boot()
    {
        \Illuminate\Pagination\Paginator::useBootstrapFive();

        // ---
        $this->publishes([
            __DIR__ . '/../config/' . self::PREFIX_PACKAGE . '.php' => config_path(self::PREFIX_PACKAGE . '.php')
        ], 'config');

        // ---
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations/');
        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations')
        ], 'migrations');

        // ---
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang/', self::PREFIX_PACKAGE);
        $this->loadJsonTranslationsFrom(__DIR__ . '/../resources/lang/');
        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/' . self::PREFIX_PACKAGE),
        ]);

        // ---
        $this->loadViewsFrom([
            __DIR__ . '/../resources/views/custom',
            __DIR__ . '/../resources/views'
        ], self::PREFIX_PACKAGE);
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/' . self::PREFIX_PACKAGE),
        ]);

        // ---
        if (!$this->app->routesAreCached()) {
            $this->mapWebRoutes();
        }

        Blade::component(self::PREFIX_PACKAGE . '-domains', \Tests\DomainsPlans\View\Components\DomainsView::class);

    }

    private function mapWebRoutes()
    {
        // WEB AUTH
        Route::name(self::PREFIX_PACKAGE . '.auth.')
            ->namespace(self::NAMESPACE_CR)
            ->middleware(['web', 'auth'])
            ->prefix(self::PREFIX_PACKAGE)
            ->group(function ($router) {
                require __DIR__ . '/routes/auth.php';
            });
    }
}
