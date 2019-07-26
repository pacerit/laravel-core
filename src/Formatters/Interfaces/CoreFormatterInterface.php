<?php

namespace PacerIT\LaravelCore\Formatters\Interfaces;

use Illuminate\Support\Collection;
use PacerIT\LaravelCore\Entities\Interfaces\CoreEntityInterface;

/**
 * Interface CoreFormatterInterface
 *
 * @package PacerIT\LaravelCore\Formatters\Interfaces
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-10
 */
interface CoreFormatterInterface
{

    /**
     * Set model to format
     *
     * @param CoreEntityInterface $entity
     * @return CoreFormatterInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function setModel(CoreEntityInterface $entity): CoreFormatterInterface;

    /**
     * Get fields of model
     *
     * @return array
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function getFields(): array;

    /**
     * Return formatted entity as array
     *
     * @return array
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function toArray(): array;

    /**
     * Return entity fields as collection
     *
     * @return Collection
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function toCollection(): Collection;

}
