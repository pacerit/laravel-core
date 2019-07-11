<?php

namespace pacerit\butterflyCore\Traits;

/**
 * Trait StringTrait
 *
 * @package pacerit\butterflyCore\Traits
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-11
 */
trait StringTrait
{

    /**
     * Checking if given parameters is JSON
     *
     * @param mixed $string
     * @return boolean
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-11
     */
    public function isJson($string): bool
    {
        json_decode($string);

        return (json_last_error() == JSON_ERROR_NONE);
    }

}
