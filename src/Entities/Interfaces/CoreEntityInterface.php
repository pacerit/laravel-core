<?php

namespace PacerIT\LaravelCore\Entities\Interfaces;

use ArrayAccess;
use Illuminate\Contracts\Queue\QueueableEntity;
use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use JsonSerializable;

/**
 * Interface CoreEntityInterface.
 *
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 *
 * @since 2019-07-05
 */
interface CoreEntityInterface extends ArrayAccess, Arrayable, Jsonable, JsonSerializable, QueueableEntity, UrlRoutable
{
    const ID = 'id';

    /**
     * Get ID of the entity.
     *
     * @return int|null
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-05
     */
    public function getID(): ?int;

    /**
     * Set ID of the entity.
     *
     * @param int $id
     *
     * @return CoreEntityInterface
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-05
     */
    public function setID(int $id): self;

    /**
     * Get model created at date.
     *
     * @return string|null
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-05
     */
    public function getCreatedAtDate(): ?string;

    /**
     * Set model created at date.
     *
     * @param string $date
     *
     * @return CoreEntityInterface
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-05
     */
    public function setCreatedAtDate(string $date): self;

    /**
     * Get model updated at date.
     *
     * @return string|null
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-05
     */
    public function getUpdatedAtDate(): ?string;

    /**
     * Set model updated at date.
     *
     * @param string $date
     *
     * @return CoreEntityInterface
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-05
     */
    public function setUpdatedAtDate(string $date): self;
}
