<?php

namespace PacerIT\LaravelCore\Exceptions\Interfaces;

/**
 * Interface CoreExceptionInterface.
 *
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 *
 * @since 2019-07-05
 */
interface CoreExceptionInterface
{
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
    public function setMessage(string $message): self;

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
    public function customizeMessage(array $parameters): self;

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
    public function setCode(int $code): self;
}
