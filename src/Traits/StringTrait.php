<?php

namespace PacerIT\LaravelCore\Traits;

/**
 * Trait StringTrait
 *
 * @package PacerIT\LaravelCore\Traits
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

    /**
     * Remove spaces from given string
     *
     * @param string|null $string
     * @return string
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-26
     */
    public function removeSpaces(?string $string): string
    {
        if ($string == null) {
            return '';
        }

        return str_replace(' ', '', $string);
    }

}
