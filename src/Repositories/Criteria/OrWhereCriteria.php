<?php

namespace PacerIT\LaravelCore\Repositories\Criteria;

use PacerIT\LaravelCore\Entities\Interfaces\CoreEntityInterface;

/**
 * Class OrWhereCriteria
 *
 * @package PacerIT\LaravelCore\Repositories\Criteria
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-31
 */
class OrWhereCriteria extends CoreRepositoryCriteria
{

    /**
     * @var array $where
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
     * Apply criteria on entity
     *
     * @param CoreEntityInterface $entity
     * @return CoreEntityInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function apply(CoreEntityInterface $entity): CoreEntityInterface
    {
        return $entity->orWhere($this->where);
    }

}
