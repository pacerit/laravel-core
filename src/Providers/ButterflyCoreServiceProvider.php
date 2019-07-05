<?php

namespace pacerit\ButterflyCore\Providers;

use Illuminate\Support\ServiceProvider;
use pacerit\ButterflyCore\Entities\CoreEntity;
use pacerit\ButterflyCore\Entities\Interfaces\CoreEntityInterface;
use pacerit\ButterflyCore\Exceptions\CoreException;
use pacerit\ButterflyCore\Interfaces\CoreExceptionInterface;
use pacerit\butterflyCore\Repositories\CoreRepository;
use pacerit\butterflyCore\Repositories\Criteria\CoreRepositoryCriteria;
use pacerit\butterflyCore\Repositories\Criteria\Interfaces\CoreRepositoryCriteriaInterface;
use pacerit\butterflyCore\Repositories\Interfaces\CoreRepositoryInterface;

/**
 * Class ButterflyCoreServiceProvider
 *
 * @package pacerit\ButterflyCore
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-05
 */
class ButterflyCoreServiceProvider extends ServiceProvider
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
    }

}
