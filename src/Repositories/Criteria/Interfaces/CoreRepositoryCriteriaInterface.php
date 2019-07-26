<?php

namespace PacerIT\LaravelCore\Repositories\Criteria\Interfaces;

use PacerIT\LaravelCore\Entities\Interfaces\CoreEntityInterface;

/**
 * Interface CoreRepositoryCriteriaInterface
 *
 * @package PacerIT\LaravelCore\Repositories\Criteria\Interfaces
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-05
 */
interface CoreRepositoryCriteriaInterface
{

    /**
     * Apply criteria on entity
     *
     * @param CoreEntityInterface $entity
     * @return CoreEntityInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function apply(CoreEntityInterface $entity): CoreEntityInterface;

}
