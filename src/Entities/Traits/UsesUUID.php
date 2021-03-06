<?php

namespace PacerIT\LaravelCore\Entities\Traits;

use Illuminate\Support\Str;
use PacerIT\LaravelCore\Entities\Interfaces\CoreEntityInterface;
use PacerIT\LaravelCore\Entities\Interfaces\UUIDInterface;

/**
 * Trait UsesUUD
 * This trait can be only used in classes that extend CoreEntity class.
 *
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 *
 * @since 2019-07-11
 */
trait UsesUUID
{
    /**
     * Overwrite entity boot function.
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-11
     */
    protected static function bootUsesUUID()
    {
        static::creating(function ($model) {
            if (!$model->getUUID() && $model instanceof UUIDInterface) {
                $model->setUUID((string) Str::uuid());
            }
        });
    }

    /**
     * GetUUID.
     *
     * @return string|null
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-11
     */
    public function getUUID(): ?string
    {
        return $this->getAttribute(UUIDInterface::UUID);
    }

    /**
     * Set UUID.
     *
     * @param string $uuid
     *
     * @return CoreEntityInterface
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-11
     */
    public function setUUID(string $uuid): CoreEntityInterface
    {
        $this->setAttribute(UUIDInterface::UUID, $uuid);

        return $this;
    }
}
