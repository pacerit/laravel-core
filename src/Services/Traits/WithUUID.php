<?php

namespace PacerIT\LaravelCore\Services\Traits;

use PacerIT\LaravelCore\Entities\Interfaces\CoreEntityInterface;
use PacerIT\LaravelCore\Entities\Interfaces\UUIDInterface;
use PacerIT\LaravelCore\Services\Exceptions\EntityNotFoundByUUID;
use PacerIT\LaravelCore\Services\Interfaces\CoreServiceInterface;

/**
 * Trait WithUUID
 * This trait can be only used in classes that extend CoreService class
 *
 * @package PacerIT\LaravelCore\Services\Traits
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-11
 */
trait WithUUID
{

    /**
     * Set entity class by given UUID
     *
     * @param string|null $uuid
     * @return CoreServiceInterface
     * @throws EntityNotFoundByUUID
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-26
     */
    public function setModelByUUID(?string $uuid): CoreServiceInterface
    {
        /* @var CoreEntityInterface $entity **/
        $entity = $this->getRepository()->firstOrNew([UUIDInterface::UUID => $uuid]);

        if ($entity->getID() === null) {
            throw new EntityNotFoundByUUID($uuid, class_basename($entity));
        }

        $this->entity = $entity;

        return $this;
    }

}
