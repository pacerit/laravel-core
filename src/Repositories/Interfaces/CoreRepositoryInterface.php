<?php

namespace pacerit\ButterflyCore\Repositories\Interfaces;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Collection;
use pacerit\ButterflyCore\Entities\Interfaces\CoreEntityInterface;
use pacerit\butterflyCore\Repositories\Criteria\Interfaces\CoreRepositoryCriteriaInterface;
use pacerit\butterflyCore\Repositories\Exceptions\RepositoryEntityException;

/**
 * Interface CoreRepositoryInterface
 *
 * @package pacerit\butterflyCore\Repositories\Interfaces
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-05
 */
interface CoreRepositoryInterface
{

    /**
     * Model entity class that will be use in repository
     *
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function entity(): string;

    /**
     * Make new entity instance
     *
     * @return CoreRepositoryInterface
     * @throws RepositoryEntityException
     * @throws BindingResolutionException
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function makeEntity(): CoreRepositoryInterface;

    /**
     * Get entity instance
     *
     * @return CoreEntityInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function getEntity(): CoreEntityInterface;

    /**
     * Push criteria
     *
     * @param CoreRepositoryCriteriaInterface $criteria
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function pushCriteria(CoreRepositoryCriteriaInterface $criteria): CoreRepositoryInterface;

    /**
     * Pop criteria
     *
     * @param string $criteriaNamespace
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function popCriteria(string $criteriaNamespace): CoreRepositoryInterface;

    /**
     * Get criteria
     *
     * @return Collection
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function getCriteria(): Collection;

    /**
     * Apply criteria to eloquent query
     *
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function applyCriteria(): CoreRepositoryInterface;

    /**
     * Skip using criteria
     *
     * @param boolean $skip
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function skipCriteria(bool $skip): CoreRepositoryInterface;

    /**
     * Clear criteria array
     *
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function clearCriteria(): CoreRepositoryInterface;

    /**
     * Return eloquent collection of all records of entity
     * Criteria are not apply in this query
     *
     * @param array $columns
     * @return Collection
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function all(array $columns = ['*']): Collection;

    /**
     * Return eloquent collection of matching records
     *
     * @param array $columns
     * @return Collection
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function get(array $columns = ['*']): Collection;

    /**
     * Save new entity
     *
     * @param array $parameters
     * @return CoreEntityInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function create(array $parameters = []): CoreEntityInterface;

    /**
     * Update entity
     *
     * @param integer $id
     * @param array $parameters
     * @return CoreEntityInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function update(int $id, array $parameters = []): CoreEntityInterface;

    /**
     * Delete entity
     *
     * @param integer $id
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function delete(int $id): CoreRepositoryInterface;

    /**
     * Get first entity record or new entity instance
     *
     * @param array $where
     * @return CoreEntityInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function firstOrNew(array $where): CoreEntityInterface;

    /**
     * Get first entity record or null
     *
     * @param array $where
     * @return CoreEntityInterface|null
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function firstOrNull(array $where): ?CoreEntityInterface;

}
