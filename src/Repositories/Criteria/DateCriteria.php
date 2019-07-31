<?php

namespace PacerIT\LaravelCore\Repositories\Criteria;

use PacerIT\LaravelCore\Entities\CoreEntity;
use PacerIT\LaravelCore\Entities\Interfaces\CoreEntityInterface;

/**
 * Class DateCriteria
 *
 * @package PacerIT\LaravelCore\Repositories\Criteria
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-31
 */
class DateCriteria extends CoreRepositoryCriteria
{

    /**
     * Date from
     *
     * @var string $dateFrom
     */
    private $dateFrom;

    /**
     * Date to
     *
     * @var string $dateTo
     */
    private $dateTo;

    /**
     * DateCriteria constructor.
     *
     * @param null|string $dateFrom
     * @param null|string $dateTo
     */
    public function __construct(
        ?string $dateFrom,
        ?string $dateTo
    ) {
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
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
        if ($this->dateFrom !== null) {
            $entity = $entity->where(CoreEntity::CREATED_AT, '>=', $this->dateFrom);
        }

        if ($this->dateTo !== null) {
            $entity = $entity->where(CoreEntity::CREATED_AT, '<=', $this->dateTo);
        }

        return $entity;
    }

}
