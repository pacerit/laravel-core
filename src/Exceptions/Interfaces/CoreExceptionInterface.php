<?php

namespace pacerit\ButterflyCore\Interfaces;

/**
 * Interface CoreExceptionInterface
 *
 * @package pacerit\ButterflyCore\Interfaces
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-05
 */
interface CoreExceptionInterface
{

    /**
     * Set message of exception
     *
     * @param string $message
     * @return CoreExceptionInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function setMessage(string $message): CoreExceptionInterface;

    /**
     * Create custom message with given parameters
     *
     * @param array $parameters
     * @return CoreExceptionInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function customizeMessage(array $parameters): CoreExceptionInterface;

    /**
     * Set code of exception
     *
     * @param integer $code
     * @return CoreExceptionInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function setCode(int $code): CoreExceptionInterface;

}
