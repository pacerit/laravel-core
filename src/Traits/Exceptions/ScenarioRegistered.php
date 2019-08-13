<?php

namespace PacerIT\LaravelCore\Traits\Exceptions;

use PacerIT\LaravelCore\Exceptions\CoreException;
use Throwable;

/**
 * Class ScenarioRegistered.
 *
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 *
 * @since 2019-07-10
 */
class ScenarioRegistered extends CoreException
{
    /**
     * ScenarioRegistered constructor.
     *
     * @param string|null    $scenario
     * @param Throwable|null $previous
     */
    public function __construct(
        ?string $scenario,
        ?Throwable $previous = null
    ) {
        $this->setMessage('Scenario with key :scenario is already registered!');
        $this->customizeMessage([':scenario' => $scenario]);
        $this->setCode(500);
        parent::__construct($previous);
    }
}
