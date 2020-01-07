<?php

namespace PacerIT\LaravelCore\Providers;

use Illuminate\Support\ServiceProvider;
use PacerIT\LaravelCore\Entities\CoreEntity;
use PacerIT\LaravelCore\Entities\Interfaces\CoreEntityInterface;
use PacerIT\LaravelCore\Formatters\CoreFormatter;
use PacerIT\LaravelCore\Formatters\Interfaces\CoreFormatterInterface;
use PacerIT\LaravelCore\Services\CoreService;
use PacerIT\LaravelCore\Services\Interfaces\CoreServiceInterface;

/**
 * Class LaravelCoreServiceProvider.
 *
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 *
 * @since 2019-07-05
 */
class LaravelCoreServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Entities.
        $this->app->bind(CoreEntityInterface::class, CoreEntity::class);

        // Services.
        $this->app->bind(CoreServiceInterface::class, CoreService::class);

        // Formatters.
        $this->app->bind(CoreFormatterInterface::class, CoreFormatter::class);
    }
}
