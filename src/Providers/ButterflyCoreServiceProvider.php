<?php

namespace pacerit\butterflyCore\Providers;

use Illuminate\Support\ServiceProvider;
use pacerit\butterflyCore\Entities\CoreEntity;
use pacerit\butterflyCore\Entities\Interfaces\CoreEntityInterface;
use pacerit\butterflyCore\Exceptions\CoreException;
use pacerit\butterflyCore\Formatters\CoreFormatter;
use pacerit\butterflyCore\Formatters\Interfaces\CoreFormatterInterface;
use pacerit\butterflyCore\Interfaces\CoreExceptionInterface;
use pacerit\butterflyCore\Repositories\CoreRepository;
use pacerit\butterflyCore\Repositories\Criteria\CoreRepositoryCriteria;
use pacerit\butterflyCore\Repositories\Criteria\Interfaces\CoreRepositoryCriteriaInterface;
use pacerit\butterflyCore\Repositories\Interfaces\CoreRepositoryInterface;
use pacerit\butterflyCore\Services\CoreService;
use pacerit\butterflyCore\Services\Interfaces\CoreServiceInterface;

/**
 * Class butterflyCoreServiceProvider
 *
 * @package pacerit\butterflyCore
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-05
 */
class butterflyCoreServiceProvider extends ServiceProvider
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
