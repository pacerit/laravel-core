<?php

namespace PacerIT\LaravelCore\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;
use PacerIT\LaravelCore\Entities\Interfaces\CoreEntityInterface;

/**
 * Class FindWhereCriteria
 *
 * @package PacerIT\LaravelCore\Repositories\Criteria
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-31
 */
class FindWhereCriteria extends CoreRepositoryCriteria
{

    /**
     * @var array $where
     */
    protected $where;

    /**
     * FindWhereCriteria constructor.
     *
     * @param array $where
     */
    public function __construct(array $where)
    {
        $this->where = $where;
    }

    /**
     * Apply criteria on entity
     *
     * @param CoreEntityInterface|Builder $entity
     * @return CoreEntityInterface|Builder
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function apply($entity)
    {
        return $entity->where($this->where);
    }

}
