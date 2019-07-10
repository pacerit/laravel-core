<?php

namespace pacerit\butterflyCore\Services\Interfaces;

use Illuminate\Contracts\Container\BindingResolutionException;
use pacerit\ButterflyCore\Entities\Interfaces\CoreEntityInterface;
use pacerit\butterflyCore\Formatters\Interfaces\CoreFormatterInterface;
use pacerit\butterflyCore\Repositories\Exceptions\RepositoryEntityException;
use pacerit\ButterflyCore\Repositories\Interfaces\CoreRepositoryInterface;
use pacerit\butterflyCore\Services\Exceptions\EntityNotFoundByID;

/**
 * Interface CoreServiceInterface
 *
 * @package pacerit\butterflyCore\Services\Interfaces
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-10
 */
interface CoreServiceInterface
{

    /**
     * Setting repository to use in service
     *
     * @param CoreRepositoryInterface $repository
     * @return CoreServiceInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function setRepository(CoreRepositoryInterface $repository): CoreServiceInterface;

    /**
     * Get previously set repository
     *
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function getRepository(): CoreRepositoryInterface;

    /**
     * Set formatter class
     *
     * @param CoreFormatterInterface $formatter
     * @return CoreServiceInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function setFormatter(CoreFormatterInterface $formatter): CoreServiceInterface;

    /**
     * Get previously set formatter class
     *
     * @return CoreFormatterInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function getFormatter(): CoreFormatterInterface;

    /**
     * Set entity class
     *
     * @param CoreEntityInterface $entity
     * @return CoreServiceInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function setModel(CoreEntityInterface $entity): CoreServiceInterface;

    /**
     * Set entity class by given ID
     *
     * @param integer|null $id
     * @throws EntityNotFoundByID
     * @return CoreServiceInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function setModelByID(?int $id): CoreServiceInterface;

    /**
     * Create and set new entity class
     *
     * @return CoreServiceInterface
     * @throws BindingResolutionException
     * @throws RepositoryEntityException
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 02.09.2018
     */
    public function setNewModel(): CoreServiceInterface;

    /**
     * Get previously set entity class
     *
     * @return CoreEntityInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function getModel(): CoreEntityInterface;

    /**
     * Format entity using previously set formatter
     *
     * @return CoreFormatterInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function format(): CoreFormatterInterface;

    /**
     * Store new entity in database
     *
     * @param array|null $parameters
     * @return CoreServiceInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function create(?array $parameters = null): CoreServiceInterface;

    /**
     * Update entity
     *
     * @param array|null $parameters
     * @return CoreServiceInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function update(?array $parameters = null): CoreServiceInterface;

    /**
     * Delete entity from database
     *
     * @return CoreServiceInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function delete(): CoreServiceInterface;

}
