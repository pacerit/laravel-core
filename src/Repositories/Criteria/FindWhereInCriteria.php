<?php

namespace PacerIT\LaravelCore\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;
use PacerIT\LaravelCore\Entities\Interfaces\CoreEntityInterface;

/**
 * Class FindWhereInCriteria
 *
 * @package PacerIT\LaravelCore\Repositories\Criteria
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-31
 */
class FindWhereInCriteria extends CoreRepositoryCriteria
{

    /**
     * @var string $column
     */
    protected $column;

    /**
     * @var array $where
     */
    protected $in;

    /**
     * FindWhereInCriteria constructor.
     *
     * @param string $column
     * @param array $in
     */
    public function __construct(string $column, array $in)
    {
        $this->column = $column;
        $this->in = $in;
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
        return $entity->whereIn($this->column, $this->in);
    }

}
