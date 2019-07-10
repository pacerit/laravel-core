<?php

namespace pacerit\butterflyCore\Formatters;

use Illuminate\Support\Collection;
use pacerit\ButterflyCore\Entities\Interfaces\CoreEntityInterface;
use pacerit\butterflyCore\Formatters\Interfaces\CoreFormatterInterface;

/**
 * Class CoreFormatter
 *
 * @package pacerit\butterflyCore\Formatters
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-10
 */
abstract class CoreFormatter implements CoreFormatterInterface
{

    /**
     * @var CoreEntityInterface $entity
     */
    protected $entity;

    /**
     * Set model to format
     *
     * @param CoreEntityInterface $entity
     * @return CoreFormatterInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function setModel(CoreEntityInterface $entity): CoreFormatterInterface
    {
        $this->entity = $entity;

        return $this;
    }

    /**
     * Return formatted entity as array
     *
     * @return array
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function toArray(): array
    {
        return $this->getFields();
    }

    /**
     * Return entity fields as collection
     *
     * @return Collection
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function toCollection(): Collection
    {
        return collect($this->getFields());
    }

}
