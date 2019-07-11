<?php

namespace pacerit\butterflyCore\Entities\Interfaces;

/**
 * Interface UUIDInterface
 *
 * @package pacerit\butterflyCore\Entities\Interfaces
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-11
 */
interface UUIDInterface
{

    const UUID = 'uuid';

    /**
     * GetUUID
     *
     * @return string
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-11
     */
    public function getUUID(): string;

    /**
     * Set UUID
     *
     * @param string $uuid
     * @return CoreEntityInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-11
     */
    public function setUUID(string $uuid): CoreEntityInterface;

}
