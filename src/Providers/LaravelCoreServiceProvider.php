<?php

namespace PacerIT\LaravelCore\Providers;

use Illuminate\Support\ServiceProvider;
use PacerIT\LaravelCore\Entities\CoreEntity;
use PacerIT\LaravelCore\Entities\Interfaces\CoreEntityInterface;
use PacerIT\LaravelCore\Exceptions\CoreException;
use PacerIT\LaravelCore\Formatters\CoreFormatter;
use PacerIT\LaravelCore\Formatters\Interfaces\CoreFormatterInterface;
use PacerIT\LaravelCore\Interfaces\CoreExceptionInterface;
use PacerIT\LaravelCore\Repositories\CoreRepository;
use PacerIT\LaravelCore\Repositories\Criteria\CoreRepositoryCriteria;
use PacerIT\LaravelCore\Repositories\Criteria\Interfaces\CoreRepositoryCriteriaInterface;
use PacerIT\LaravelCore\Repositories\Interfaces\CoreRepositoryInterface;
use PacerIT\LaravelCore\Services\CoreService;
use PacerIT\LaravelCore\Services\Interfaces\CoreServiceInterface;

/**
 * Class LaravelCoreServiceProvider
 *
 * @package PacerIT\LaravelCore\Providers
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-05
 */
class LaravelCoreServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $path = __DIR__ . '/../../resources/config/laravel-core.php';
        $this->publishes([
            $path => config_path('laravel-core.php')
        ]);

        $this->mergeConfigFrom($path, 'laravel-core');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Entities.
        $this->app->bind(CoreEntityInterface::class, CoreEntity::class);

        // Exceptions.
        $this->app->bind(CoreExceptionInterface::class, CoreException::class);

        // Repositories.
        $this->app->bind(CoreRepositoryInterface::class, CoreRepository::class);
        $this->app->bind(CoreRepositoryCriteriaInterface::class, CoreRepositoryCriteria::class);

        // Services.
        $this->app->bind(CoreServiceInterface::class, CoreService::class);

        // Formatters.
        $this->app->bind(CoreFormatterInterface::class, CoreFormatter::class);
    }

}
