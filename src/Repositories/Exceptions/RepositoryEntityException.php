<?php

namespace pacerit\butterflyCore\Repositories\Exceptions;

use pacerit\butterflyCore\Exceptions\CoreException;
use Throwable;

/**
 * Class RepositoryEntityException
 *
 * @package pacerit\butterflyCore\Repositories\Exceptions
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-05
 */
class RepositoryEntityException extends CoreException
{

    /**
     * RepositoryEntityException constructor.
     *
     * @param string|null $namespace
     * @param Throwable|null $previous
     */
    public function __construct(
        ?string $namespace,
        ?Throwable $previous = null
    ) {
        $this->setMessage('Given class (:namespace) must implement CoreEntityInterface, and be instance of CoreEntity class!');
        $this->customizeMessage([':namespace' => $namespace]);
        $this->setCode(500);
        parent::__construct($previous);
    }

}
