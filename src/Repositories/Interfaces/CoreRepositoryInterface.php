<?php

namespace PacerIT\LaravelCore\Repositories\Interfaces;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use PacerIT\LaravelCore\Entities\Interfaces\CoreEntityInterface;
use PacerIT\LaravelCore\Repositories\Criteria\Interfaces\CoreRepositoryCriteriaInterface;
use PacerIT\LaravelCore\Repositories\Exceptions\RepositoryEntityException;
use Yajra\DataTables\EloquentDataTable;

/**
 * Interface CoreRepositoryInterface
 *
 * @package PacerIT\LaravelCore\Repositories\Interfaces
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
     * @return CoreEntityInterface|Builder
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function getEntity();

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
     * Get first record
     *
     * @param array $columns
     * @return Collection
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-08-07
     */
    public function first(array $columns = ['*']): Collection;

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
     * Create new model or update existing
     *
     * @param array $where
     * @param array $values
     * @return CoreEntityInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-08-01
     */
    public function updateOrCreate(array $where = [], array $values = []): CoreEntityInterface;

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

    /**
     * Make datatable response
     *
     * @param array $columns
     * @return EloquentDataTable
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-31
     */
    public function datatable(array $columns): EloquentDataTable;

    /**
     * Order by records
     *
     * @param string $column
     * @param string $direction
     * @return mixed
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-31
     */
    public function orderBy(string $column, string $direction = 'asc');

    /**
     * Relation sub-query
     *
     * @param array $relations
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-08-01
     */
    public function with($relations): CoreRepositoryInterface;

    /**
     * Begin database transaction
     *
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-08-06
     */
    public function transactionBegin(): CoreRepositoryInterface;

    /**
     * Commit database transaction
     *
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-08-06
     */
    public function transactionCommit(): CoreRepositoryInterface;

    /**
     * Rollback transaction
     *
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-08-06
     */
    public function transactionRollback(): CoreRepositoryInterface;

    /**
     * Find where
     *
     * @param array $where
     * @param array $columns
     * @return Collection
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-08-07
     */
    public function findWhere(array $where, array $columns = ['*']): Collection;

    /**
     * Find where In
     *
     * @param string $column
     * @param array $where
     * @param array $columns
     * @return Collection
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-08-07
     */
    public function findWhereIn(string $column, array $where, array $columns = ['*']): Collection;

    /**
     * Find where not In
     *
     * @param string $column
     * @param array $where
     * @param array $columns
     * @return Collection
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-08-07
     */
    public function findWhereNotIn(string $column, array $where, array $columns = ['*']): Collection;

}
