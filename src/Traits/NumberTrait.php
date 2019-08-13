<?php

namespace PacerIT\LaravelCore\Traits;

/**
 * Trait NumberTrait.
 *
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 *
 * @since 2019-07-26
 */
trait NumberTrait
{
    /**
     * Convert float number to number with coma  (ex: 10.43 -> 10,43).
     *
     * @param float $number
     * @param int   $afterComa
     *
     * @return string
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-26
     */
    public function convertFloatToNumberComa(float $number, int $afterComa = 2): string
    {
        return number_format($number, $afterComa, ',', '.');
    }

    /**
     * Convert number with coma to float (ex: 10,43 -> 10.43).
     *
     * @param string $number
     *
     * @return float
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-26
     */
    public function convertComaNumberToFloat(string $number): float
    {
        return (float) str_replace(',', '.', $number);
    }
}
