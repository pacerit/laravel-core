<?php

namespace PacerIT\LaravelCore\Traits\Exceptions;

use PacerIT\LaravelCore\Exceptions\CoreException;
use Throwable;

/**
 * Class ScenarioNotRegistered
 *
 * @package PacerIT\LaravelCore\Traits\Exceptions
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-10
 */
class ScenarioNotRegistered extends CoreException
{

    /**
     * ScenarioNotRegistered constructor.
     *
     * @param string|null $scenario
     * @param Throwable|null $previous
     */
    public function __construct(
        ?string $scenario,
        ?Throwable $previous = null
    ) {
        $this->setMessage('Scenario with key :scenario is not registered!');
        $this->customizeMessage([':scenario' => $scenario]);
        $this->setCode(500);
        parent::__construct($previous);
    }

}
