<?php

namespace PacerIT\LaravelCore\Traits\Exceptions;

use PacerIT\LaravelCore\Exceptions\CoreException;
use Throwable;

/**
 * Class InvalidXMLFormat.
 *
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 *
 * @since 2019-07-26
 */
class InvalidXMLFormat extends CoreException
{
    /**
     * InvalidXMLFormat constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(?Throwable $previous = null)
    {
        $this->setMessage('Given XML format is invalid!');
        $this->setCode(500);
        parent::__construct($previous);
    }
}
