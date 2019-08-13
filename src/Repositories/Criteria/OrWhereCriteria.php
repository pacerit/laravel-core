<?php

namespace PacerIT\LaravelCore\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;
use PacerIT\LaravelCore\Entities\Interfaces\CoreEntityInterface;

/**
 * Class OrWhereCriteria.
 *
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 *
 * @since 2019-07-31
 */
class OrWhereCriteria extends CoreRepositoryCriteria
{
    /**
     * @var array
     */
    protected $where;

    /**
     * OrWhereCriteria constructor.
     *
     * @param array $where
     */
    public function __construct(array $where)
    {
        $this->where = $where;
    }

    /**
     * Apply criteria on entity.
     *
     * @param CoreEntityInterface|Builder $entity
     *
     * @return CoreEntityInterface|Builder
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-05
     */
    public function apply($entity)
    {
        return $entity->orWhere($this->where);
    }
}
