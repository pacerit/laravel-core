<?php

namespace PacerIT\LaravelCore\Services\Exceptions;

use PacerIT\LaravelCore\Exceptions\CoreException;
use Throwable;

/**
 * Class EntityNotFoundByKey.
 *
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 *
 * @since 2019-07-26
 */
class EntityNotFoundByKey extends CoreException
{
    /**
     * EntityNotFoundByID constructor.
     *
     * @param string|null    $key
     * @param mixed          $value
     * @param string|null    $entity
     * @param Throwable|null $previous
     */
    public function __construct(
        ?string $key,
        $value,
        ?string $entity,
        ?Throwable $previous = null
    ) {
        $this->setMessage('Entity record of class :entity not found by key :key and value :value!');
        $this->customizeMessage(
            [
                ':key'    => $key,
                ':value'  => $value,
                ':entity' => $entity,
            ]
        );
        $this->setCode(404);
        parent::__construct($previous);
    }
}
