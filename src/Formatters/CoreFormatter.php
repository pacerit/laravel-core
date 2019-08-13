<?php

namespace PacerIT\LaravelCore\Formatters;

use Illuminate\Support\Collection;
use PacerIT\LaravelCore\Entities\Interfaces\CoreEntityInterface;
use PacerIT\LaravelCore\Formatters\Interfaces\CoreFormatterInterface;

/**
 * Class CoreFormatter.
 *
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 *
 * @since 2019-07-10
 */
abstract class CoreFormatter implements CoreFormatterInterface
{
    /**
     * @var CoreEntityInterface
     */
    protected $entity;

    /**
     * Set model to format.
     *
     * @param CoreEntityInterface $entity
     *
     * @return CoreFormatterInterface
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-10
     */
    public function setModel(CoreEntityInterface $entity): CoreFormatterInterface
    {
        $this->entity = $entity;

        return $this;
    }

    /**
     * Return formatted entity as array.
     *
     * @return array
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-10
     */
    public function toArray(): array
    {
        return $this->getFields();
    }

    /**
     * Return entity fields as collection.
     *
     * @return Collection
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-10
     */
    public function toCollection(): Collection
    {
        return collect($this->getFields());
    }
}
