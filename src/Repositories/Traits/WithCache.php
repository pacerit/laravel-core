<?php

namespace PacerIT\LaravelCore\Repositories\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use PacerIT\LaravelCore\Entities\Interfaces\CoreEntityInterface;
use PacerIT\LaravelCore\Repositories\Interfaces\CoreRepositoryInterface;
use ReflectionObject;

/**
 * Trait WithCache
 *
 * @package PacerIT\LaravelCore\Repositories\Traits
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-08-07
 */
trait WithCache
{

    /**
     * Determine if cache will be skipped in query
     *
     * @var bool $skipCache
     */
    protected $skipCache = false;

    /**
     * Cache time in minutes
     *
     * @var integer $cacheTime
     */
    protected $cacheTime = 60;

    /**
     * Skip cache
     *
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-08-07
     */
    public function skipCache(): CoreRepositoryInterface
    {
        $this->skipCache = true;

        return $this;
    }

    /**
     * Generate cache key
     *
     * @param string $method
     * @param array $parameters
     * @return string
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-08-07
     */
    protected function getCacheKey(string $method, array $parameters): string
    {
        $userID = 'guest';

        // Try get authenticated user.
        $user = auth()->user();
        if ($user !== null) {
            $userID = $user->getAuthIdentifier();
        }

        // Get actual repository class name.
        $className = class_basename($this);

        // Get serialized criteria.
        $criteria = $this->getSerializedCriteria();

        return sprintf(
            '%s@%s_%s-%s',
            $method,
            $className,
            $userID,
            md5($parameters . $criteria)
        );
    }

    /**
     * Serialize criteria pushed into repository
     *
     * @return string
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-08-07
     */
    protected function getSerializedCriteria(): string
    {
        return serialize(
            $this->getCriteria()->map(
                function ($criteria) {
                    $reflectionClass = new ReflectionObject($criteria);

                    return [
                        'criteria' => $reflectionClass->getName(),
                        'parameters' => $reflectionClass->getProperties(),
                    ];
                }
            )
        );
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
        if ($this->skipCache) {
            return parent::all($columns);
        }

        $cacheKey = $this->getCacheKey(__FUNCTION__, func_get_args());

        // Store or get from cache.
        return Cache::remember($cacheKey, $this->cacheTime, parent::all($columns));
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
        if ($this->skipCache) {
            return parent::get($columns);
        }

        $cacheKey = $this->getCacheKey(__FUNCTION__, func_get_args());

        // Store or get from cache.
        return Cache::remember($cacheKey, $this->cacheTime, parent::get($columns));
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
        if ($this->skipCache) {
            return parent::frist($columns);
        }

        $cacheKey = $this->getCacheKey(__FUNCTION__, func_get_args());

        // Store or get from cache.
        return Cache::remember($cacheKey, $this->cacheTime, parent::first($columns));
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
        if ($this->skipCache) {
            return parent::firstOrNew($where);
        }

        $cacheKey = $this->getCacheKey(__FUNCTION__, func_get_args());

        // Store or get from cache.
        return Cache::remember($cacheKey, $this->cacheTime, parent::firstOrNew($where));
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
        if ($this->skipCache) {
            return parent::firstOrNull($where);
        }

        $cacheKey = $this->getCacheKey(__FUNCTION__, func_get_args());

        // Store or get from cache.
        return Cache::remember($cacheKey, $this->cacheTime, parent::firstOrNull($where));
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
        if ($this->skipCache) {
            return parent::findWhere($where, $columns);
        }

        $cacheKey = $this->getCacheKey(__FUNCTION__, func_get_args());

        // Store or get from cache.
        return Cache::remember($cacheKey, $this->cacheTime, parent::findWhere($where, $columns));
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
        if ($this->skipCache) {
            return parent::findWhereIn($columns, $where, $columns);
        }

        $cacheKey = $this->getCacheKey(__FUNCTION__, func_get_args());

        // Store or get from cache.
        return Cache::remember($cacheKey, $this->cacheTime, parent::findWhereIn($column, $where, $columns));
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
        if ($this->skipCache) {
            return parent::findWhereNotIn($column, $where, $columns);
        }

        $cacheKey = $this->getCacheKey(__FUNCTION__, func_get_args());

        // Store or get from cache.
        return Cache::remember($cacheKey, $this->cacheTime, parent::findWhereNotIn($column, $where, $columns));
    }

}
