<?php

namespace PacerIT\LaravelCore\Services\Exceptions;

use PacerIT\LaravelCore\Exceptions\CoreException;
use Throwable;

/**
 * Class EntityNotFoundByUUID.
 *
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 *
 * @since 2019-07-26
 */
class EntityNotFoundByUUID extends CoreException
{
    /**
     * EntityNotFoundByUUID constructor.
     *
     * @param string|null    $id
     * @param string|null    $entity
     * @param Throwable|null $previous
     */
    public function __construct(
        ?string $id,
        ?string $entity,
        ?Throwable $previous = null
    ) {
        $this->setMessage('Entity record of class :entity not found by ID :id!');
        $this->customizeMessage([':id' => $id, ':entity' => $entity]);
        $this->setCode(404);
        parent::__construct($previous);
    }
}
