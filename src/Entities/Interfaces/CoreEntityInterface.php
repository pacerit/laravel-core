<?php

namespace pacerit\butterflyCore\Entities\Interfaces;

use ArrayAccess;
use JsonSerializable;
use Illuminate\Contracts\Queue\QueueableEntity;
use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

/**
 * Interface CoreEntityInterface
 *
 * @package pacerit\butterflyCore\Entities\Interfaces
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-05
 */
interface CoreEntityInterface extends ArrayAccess, Arrayable, Jsonable, JsonSerializable, QueueableEntity, UrlRoutable
{

    const ID = 'id';

    /**
     * Get ID of the entity
     *
     * @return integer|null
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function getID(): ?int;

    /**
     * Set ID of the entity
     *
     * @param integer $id
     * @return CoreEntityInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function setID(int $id): CoreEntityInterface;

    /**
     * Get model created at date
     *
     * @return string|null
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function getCreatedAtDate(): ?string;

    /**
     * Set model created at date
     *
     * @param string $date
     * @return CoreEntityInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function setCreatedAtDate(string $date): CoreEntityInterface;

    /**
     * Get model updated at date
     *
     * @return string|null
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function getUpdatedAtDate(): ?string;

    /**
     * Set model updated at date
     *
     * @param string $date
     * @return CoreEntityInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function setUpdatedAtDate(string $date): CoreEntityInterface;

}