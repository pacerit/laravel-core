<?php

namespace PacerIT\LaravelCore\Services\Interfaces;

use Illuminate\Contracts\Container\BindingResolutionException;
use PacerIT\LaravelCore\Entities\Interfaces\CoreEntityInterface;
use PacerIT\LaravelCore\Formatters\Interfaces\CoreFormatterInterface;
use PacerIT\LaravelCore\Services\Exceptions\EntityNotFoundByID;
use PacerIT\LaravelCore\Services\Exceptions\EntityNotFoundByKey;
use PacerIT\LaravelRepository\Repositories\Exceptions\RepositoryEntityException;
use PacerIT\LaravelRepository\Repositories\Interfaces\CoreRepositoryInterface;

/**
 * Interface CoreServiceInterface.
 *
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 *
 * @since 2019-07-10
 */
interface CoreServiceInterface
{
    /**
     * Setting repository to use in service.
     *
     * @param CoreRepositoryInterface $repository
     *
     * @return CoreServiceInterface
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-10
     */
    public function setRepository(CoreRepositoryInterface $repository): self;

    /**
     * Get previously set repository.
     *
     * @return CoreRepositoryInterface
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-10
     */
    public function getRepository(): CoreRepositoryInterface;

    /**
     * Set formatter class.
     *
     * @param CoreFormatterInterface $formatter
     *
     * @return CoreServiceInterface
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-10
     */
    public function setFormatter(CoreFormatterInterface $formatter): self;

    /**
     * Get previously set formatter class.
     *
     * @return CoreFormatterInterface
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-10
     */
    public function getFormatter(): CoreFormatterInterface;

    /**
     * Set entity class.
     *
     * @param CoreEntityInterface $entity
     *
     * @return CoreServiceInterface
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-10
     */
    public function setModel(CoreEntityInterface $entity): self;

    /**
     * Set entity class by given ID.
     *
     * @param int|null $id
     *
     * @throws EntityNotFoundByID
     *
     * @return CoreServiceInterface
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-10
     */
    public function setModelByID(?int $id): self;

    /**
     * Set entity by key.
     *
     * @param string $key
     * @param $value
     *
     * @throws EntityNotFoundByKey
     *
     * @return CoreServiceInterface
     *
     * @since 2019-07-26
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     */
    public function setModelByKey(string $key, $value): self;

    /**
     * Create and set new entity class.
     *
     * @throws BindingResolutionException
     * @throws RepositoryEntityException
     *
     * @return CoreServiceInterface
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 02.09.2018
     */
    public function setNewModel(): self;

    /**
     * Get previously set entity class.
     *
     * @return CoreEntityInterface
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-10
     */
    public function getModel(): CoreEntityInterface;

    /**
     * Format entity using previously set formatter.
     *
     * @return CoreFormatterInterface
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-10
     */
    public function format(): CoreFormatterInterface;

    /**
     * Store new entity in database.
     *
     * @param array|null $parameters
     *
     * @return CoreServiceInterface
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-10
     */
    public function create(?array $parameters = null): self;

    /**
     * Update entity.
     *
     * @param array|null $parameters
     *
     * @return CoreServiceInterface
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-10
     */
    public function update(?array $parameters = null): self;

    /**
     * Delete entity from database.
     *
     * @return CoreServiceInterface
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-10
     */
    public function delete(): self;
}
