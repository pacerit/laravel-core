<?php

namespace PacerIT\LaravelCore\Traits;

use PacerIT\LaravelCore\Traits\Exceptions\InvalidXMLFormat;

/**
 * Trait XMLTrait.
 *
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 *
 * @since 2019-07-26
 */
trait XMLTrait
{
    /**
     * Convert XML to array.
     *
     * @param string $xml
     *
     * @throws InvalidXMLFormat
     *
     * @return array
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-26
     */
    public function xmlToArray(string $xml): array
    {
        libxml_use_internal_errors(true);
        $data = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
        if (!$data) {
            throw new InvalidXMLFormat();
        }

        $json = json_encode($data);

        return json_decode($json, true);
    }

    /**
     * Get XML root tag.
     *
     * @param string $xml
     *
     * @throws InvalidXMLFormat
     *
     * @return string
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-26
     */
    public function getXmlRootTag(string $xml): string
    {
        libxml_use_internal_errors(true);
        $data = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
        if (!$data) {
            throw new InvalidXMLFormat();
        }

        return $data->getName();
    }
}
