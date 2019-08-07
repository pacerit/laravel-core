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
     * Cache time in seconds
     *
     * @var integer $cacheTime
     */
    // TODO: Move to Config file!
    protected $cacheTime = 3600;

    /**
     * Array of guard to search for actual authenticated user
     *
     * @var array $guards
     */
    // TODO: Move to config file!
    protected $guards = [
        'api',
        'web',
    ];

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
        // Get actual repository class name.
        $className = class_basename($this);

        // Get serialized criteria.
        $criteria = $this->getSerializedCriteria();

        return sprintf(
            '%s@%s_%s-%s',
            $method,
            $className,
            $this->getAuthUserID(),
            md5(serialize($parameters) . $criteria)
        );
    }

    /**
     * Try to get actual authenticated user ID
     *
     * @return integer
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-08-07
     */
    protected function getAuthUserID(): int
    {
        foreach ($this->guards as $guard) {
            if (auth($guard)->check()) {
                return auth($guard)->user()->getAuthIdentifier();
            }
        }

        return 0;
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
        return Cache::remember(
            $cacheKey,
            $this->cacheTime,
            function () use ($columns) {
                return parent::all($columns);
            }
        );
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
        return Cache::remember(
            $cacheKey,
            $this->cacheTime,
            function () use ($columns) {
                return parent::get($columns);
            }
        );
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
        return Cache::remember(
            $cacheKey,
            $this->cacheTime,
            function () use ($columns) {
                return parent::first($columns);
            }
        );
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
        return Cache::remember(
            $cacheKey,
            $this->cacheTime,
            function () use ($where) {
                return parent::firstOrNew($where);
            }
        );
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
        return Cache::remember(
            $cacheKey,
            $this->cacheTime,
            function () use ($where) {
                return parent::firstOrNull($where);
            }
        );
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
        return Cache::remember(
            $cacheKey,
            $this->cacheTime,
            function () use ($where, $columns) {
                return parent::findWhere($where, $columns);
            }
        );
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
        return Cache::remember(
            $cacheKey,
            $this->cacheTime,
            function () use ($column, $where, $columns) {
                return parent::findWhereIn($column, $where, $columns);
            }
        );
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
        return Cache::remember(
            $cacheKey,
            $this->cacheTime,
            function () use ($column, $where, $columns) {
                return parent::findWhereNotIn($column, $where, $columns);
            }
        );
    }

}
