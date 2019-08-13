<?php

namespace PacerIT\LaravelCore\Exceptions;

use Exception;
use PacerIT\LaravelCore\Exceptions\Interfaces\CoreExceptionInterface;
use Throwable;

/**
 * Class CoreException.
 *
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 *
 * @since 02.09.2018
 */
abstract class CoreException extends Exception implements CoreExceptionInterface
{
    /**
     * @var string
     */
    protected $message;

    /**
     * @var int
     */
    protected $code;

    /**
     * @var string
     */
    protected $file;

    /**
     * @var int
     */
    protected $line;

    /**
     * CoreException constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct($this->getMessage(), $this->getCode(), $previous);
    }

    /**
     * Set message of exception.
     *
     * @param string $message
     *
     * @return CoreExceptionInterface
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-05
     */
    public function setMessage(string $message): CoreExceptionInterface
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Create custom message with given parameters.
     *
     * @param array $parameters
     *
     * @return CoreExceptionInterface
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-05
     */
    public function customizeMessage(array $parameters): CoreExceptionInterface
    {
        return $this->setMessage(strtr($this->getMessage(), $parameters));
    }

    /**
     * Set code of exception.
     *
     * @param int $code
     *
     * @return CoreExceptionInterface
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-05
     */
    public function setCode(int $code): CoreExceptionInterface
    {
        $this->code = $code;

        return $this;
    }
}
