<?php

namespace PacerIT\LaravelCore\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;
use PacerIT\LaravelCore\Entities\Interfaces\CoreEntityInterface;

/**
 * Class LimitCriteria
 *
 * @package PacerIT\LaravelCore\Repositories\Criteria
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-31
 */
class LimitCriteria extends CoreRepositoryCriteria
{

    /**
     * @var int $limit
     */
    protected $limit;


    /**
     * LimitCriteria constructor.
     *
     * @param integer $limit
     */
    public function __construct(int $limit)
    {
        $this->limit = $limit;
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
        return $entity->limit($this->limit);
    }

}
