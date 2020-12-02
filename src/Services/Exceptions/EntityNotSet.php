<?php

namespace PacerIT\LaravelCore\Services\Exceptions;

use PacerIT\LaravelCore\Exceptions\CoreException;
use Throwable;

/**
 * Class EntityNotSet
 *
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 *
 * @since 02/12/2020
 */
class EntityNotSet extends CoreException
{
    /**
     * EntityNotSet constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        $this->setMessage('Entity not set. Use setModel*() functions to set entity.');
        $this->setCode(500);
        parent::__construct($previous);
    }
}