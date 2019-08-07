<?php

namespace PacerIT\LaravelCore\Repositories;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\DB;
use PacerIT\LaravelCore\Entities\CoreEntity;
use PacerIT\LaravelCore\Entities\Interfaces\CoreEntityInterface;
use PacerIT\LaravelCore\Repositories\Criteria\CoreRepositoryCriteria;
use PacerIT\LaravelCore\Repositories\Criteria\Interfaces\CoreRepositoryCriteriaInterface;
use PacerIT\LaravelCore\Repositories\Exceptions\RepositoryEntityException;
use PacerIT\LaravelCore\Repositories\Interfaces\CoreRepositoryInterface;
use Yajra\DataTables\EloquentDataTable;

/**
 * Class CoreRepository
 *
 * @package PacerIT\LaravelCore\Repositories
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-05
 */
abstract class CoreRepository implements CoreRepositoryInterface
{

    /**
     * Application container
     *
     * @var Container $app
     */
    protected $app;

    /**
     * Entity class that will be use in repository
     *
     * @var CoreEntityInterface $entity
     */
    protected $entity;

    /**
     * Criteria collection
     *
     * @var Collection $criteria
     */
    protected $criteria;

    /**
     * Determine if criteria will be skipped in query
     *
     * @var bool $skipCriteria
     */
    protected $skipCriteria = false;

    /**
     * CoreRepository constructor.
     *
     * @param Container $app
     * @throws RepositoryEntityException
     * @throws BindingResolutionException
     */
    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->criteria = new Collection();
        $this->makeEntity();
    }

    /**
     * Make new entity instance
     *
     * @return CoreRepositoryInterface
     * @throws RepositoryEntityException
     * @throws BindingResolutionException
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function makeEntity(): CoreRepositoryInterface
    {
        // Make new model instance.
        $entity = $this->app->make($this->entity());

        // Checking instance.
        if (! $entity instanceof CoreEntityInterface
            || ! $entity instanceof CoreEntity) {
            throw new RepositoryEntityException($this->entity());
        }

        $this->entity = $entity;

        return $this;
    }

    /**
     * Get entity instance
     *
     * @return CoreEntityInterface|Builder
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * Push criteria
     *
     * @param CoreRepositoryCriteriaInterface $criteria
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function pushCriteria(CoreRepositoryCriteriaInterface $criteria): CoreRepositoryInterface
    {
        $this->criteria->push($criteria);

        return $this;
    }

    /**
     * Pop criteria
     *
     * @param string $criteriaNamespace
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function popCriteria(string $criteriaNamespace): CoreRepositoryInterface
    {
        $this->criteria = $this->criteria->reject(function ($item) use ($criteriaNamespace) {
            return get_class($item) === $criteriaNamespace;
        });

        return $this;
    }

    /**
     * Get criteria
     *
     * @return Collection
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function getCriteria(): Collection
    {
        return $this->criteria;
    }

    /**
     * Apply criteria to eloquent query
     *
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function applyCriteria(): CoreRepositoryInterface
    {
        if ($this->skipCriteria === true) {
            return $this;
        }

        $criteria = $this->getCriteria();

        if ($criteria instanceof Collection) {
            foreach ($criteria as $c) {
                if ($c instanceof CoreRepositoryCriteriaInterface
                    && $c instanceof CoreRepositoryCriteria) {
                    $this->entity = $c->apply($this->getEntity());
                }
            }
        }

        return $this;
    }

    /**
     * Skip using criteria
     *
     * @param boolean $skip
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function skipCriteria(bool $skip): CoreRepositoryInterface
    {
        $this->skipCriteria = $skip;

        return $this;
    }

    /**
     * Clear criteria array
     *
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function clearCriteria(): CoreRepositoryInterface
    {
        $this->criteria = new Collection();

        return $this;
    }

    /**
     * Return eloquent collection of all records of entity
     * Criteria are not apply in this query
     *
     * @param array $columns
     * @return Collection
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function all(array $columns = ['*']): Collection
    {
        return $this->getEntity()->all($columns);
    }

    /**
     * Return eloquent collection of matching records
     *
     * @param array $columns
     * @return Collection
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function get(array $columns = ['*']): Collection
    {
        $this->applyCriteria();

        return $this->getEntity()->get($columns);
    }

    /**
     * Get first record
     *
     * @param array $columns
     * @return Collection
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-08-07
     */
    public function first(array $columns = ['*']): Collection
    {
        $this->applyCriteria();

        return $this->getEntity()->first($columns);
    }

    /**
     * Save new entity
     *
     * @param array $parameters
     * @return CoreEntityInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function create(array $parameters = []): CoreEntityInterface
    {
        $this->entity = $this->getEntity()->newInstance($parameters);
        $this->getEntity()->save();

        return $this->getEntity();
    }

    /**
     * Create new model or update existing
     *
     * @param array $where
     * @param array $values
     * @return CoreEntityInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-08-01
     */
    public function updateOrCreate(array $where = [], array $values = []): CoreEntityInterface
    {
        $this->entity = $this->getEntity()->updateOrCreate($where, $values);

        return $this->getEntity();
    }

    /**
     * Update entity
     *
     * @param integer $id
     * @param array $parameters
     * @return CoreEntityInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function update(int $id, array $parameters = []): CoreEntityInterface
    {
        $this->entity = $this->getEntity()->findOrFail($id);
        $this->getEntity()->fill($parameters);
        $this->getEntity()->save();

        return $this->getEntity();
    }

    /**
     * Delete entity
     *
     * @param integer $id
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function delete(int $id): CoreRepositoryInterface
    {
        $this->entity = $this->getEntity()->findOrFail($id);
        $this->getEntity()->delete();

        return $this;
    }

    /**
     * Get first entity record or new entity instance
     *
     * @param array $where
     * @return CoreEntityInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function firstOrNew(array $where): CoreEntityInterface
    {
        return $this->getEntity()->firstOrNew($where);
    }

    /**
     * Get first entity record or null
     *
     * @param array $where
     * @return CoreEntityInterface|null
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function firstOrNull(array $where): ?CoreEntityInterface
    {
        /* @var CoreEntityInterface $entity */
        $entity = $this->firstOrNew($where);

        if ($entity->getID() === null) {
            return null;
        }

        return $entity;
    }

    /**
     * Order by records
     *
     * @param string $column
     * @param string $direction
     * @return mixed
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-31
     */
    public function orderBy(string $column, string $direction = 'asc')
    {
        $this->entity = $this->getEntity()->orderBy($column, $direction);

        return $this;
    }

    /**
     * Relation sub-query
     *
     * @param array $relations
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-08-01
     */
    public function with($relations): CoreRepositoryInterface
    {
        $this->entity = $this->getEntity()->with($relations);

        return $this;
    }

    /**
     * Begin database transaction
     *
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-08-06
     */
    public function transactionBegin(): CoreRepositoryInterface
    {
        DB::beginTransaction();

        return $this;
    }

    /**
     * Commit database transaction
     *
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-08-06
     */
    public function transactionCommit(): CoreRepositoryInterface
    {
        DB::commit();

        return $this;
    }

    /**
     * Rollback transaction
     *
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-08-06
     */
    public function transactionRollback(): CoreRepositoryInterface
    {
        DB::rollBack();

        return $this;
    }

    /**
     * Find where
     *
     * @param array $where
     * @param array $columns
     * @return Collection
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-08-07
     */
    public function findWhere(array $where, array $columns = ['*']): Collection
    {
        $this->applyCriteria();

        return $this->getEntity()->where($where)->get($columns);
    }

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
    public function findWhereIn(string $column, array $where, array $columns = ['*']): Collection
    {
        $this->applyCriteria();

        return $this->getEntity()->whereIn($column, $where)->get();
    }

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
    public function findWhereNotIn(string $column, array $where, array $columns = ['*']): Collection
    {
        $this->applyCriteria();

        return $this->getEntity()->whereNotIn($column, $where)->get($columns);
    }

}
