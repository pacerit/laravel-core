<?php

namespace pacerit\butterflyCore\Services\Exceptions;

use pacerit\butterflyCore\Exceptions\CoreException;
use Throwable;

/**
 * Class EntityNotFoundByID
 *
 * @package pacerit\butterflyCore\Services\Exceptions
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-10
 */
class EntityNotFoundByID extends CoreException
{

    /**
     * EntityNotFoundByID constructor.
     *
     * @param string|null $id
     * @param string|null $entity
     * @param Throwable|null $previous
     */
    public function __construct(
        ?string $id,
        ?string $entity,
        ?Throwable $previous = null
    ) {
        $this->setMessage('Entity record of class :entity not found by ID :id!');
        $this->customizeMessage([':id' => $id , ':entity' => $entity]);
        $this->setCode(500);
        parent::__construct($previous);
    }

}
