<?php

namespace PacerIT\LaravelCore\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;
use PacerIT\LaravelCore\Entities\Interfaces\CoreEntityInterface;

/**
 * Class OffsetCriteria.
 *
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 *
 * @since 2019-08-21
 */
class OffsetCriteria extends CoreRepositoryCriteria
{
    /**
     * @var int
     */
    protected $offset;

    /**
     * OffsetCriteria constructor.
     *
     * @param int $offset
     */
    public function __construct(int $offset)
    {
        $this->offset = $offset;
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
        return $entity->offset($this->offset);
    }
}
