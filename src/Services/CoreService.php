<?php

namespace pacerit\butterflyCore\Services;

use Illuminate\Contracts\Container\BindingResolutionException;
use pacerit\ButterflyCore\Entities\Interfaces\CoreEntityInterface;
use pacerit\butterflyCore\Formatters\Interfaces\CoreFormatterInterface;
use pacerit\butterflyCore\Repositories\Exceptions\RepositoryEntityException;
use pacerit\ButterflyCore\Repositories\Interfaces\CoreRepositoryInterface;
use pacerit\butterflyCore\Services\Exceptions\EntityNotFoundByID;
use pacerit\butterflyCore\Services\Interfaces\CoreServiceInterface;

/**
 * Class CoreService
 *
 * @package pacerit\butterflyCore\Services
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-10
 */
abstract class CoreService implements CoreServiceInterface
{

    /**
     * @var CoreRepositoryInterface $repository
     */
    protected $repository;

    /**
     * @var CoreFormatterInterface $formatter
     */
    protected $formatter;

    /**
     * @var CoreEntityInterface $entity
     */
    protected $entity;

    /**
     * Setting repository to use in service
     *
     * @param CoreRepositoryInterface $repository
     * @return CoreServiceInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 02.09.2018
     */
    public function setRepository(CoreRepositoryInterface $repository): CoreServiceInterface
    {
        $this->repository = $repository;

        return $this;
    }

    /**
     * Get previously set repository
     *
     * @return CoreRepositoryInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 02.09.2018
     */
    public function getRepository(): CoreRepositoryInterface
    {
        return $this->repository;
    }

    /**
     * Set formatter class
     *
     * @param CoreFormatterInterface $formatter
     * @return CoreServiceInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 02.09.2018
     */
    public function setFormatter(CoreFormatterInterface $formatter): CoreServiceInterface
    {
        $this->formatter = $formatter;

        return $this;
    }

    /**
     * Get previously set formatter class
     *
     * @return CoreFormatterInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 02.09.2018
     */
    public function getFormatter(): CoreFormatterInterface
    {
        return $this->formatter;
    }

    /**
     * Set entity class
     *
     * @param CoreEntityInterface $entity
     * @return CoreServiceInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 02.09.2018
     */
    public function setModel(CoreEntityInterface $entity): CoreServiceInterface
    {
        $this->entity = $entity;

        return $this;
    }

    /**
     * Set entity class by given ID
     *
     * @param integer|null $id
     * @return CoreServiceInterface
     * @throws EntityNotFoundByID
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 02.09.2018
     */
    public function setModelByID(?int $id): CoreServiceInterface
    {
        /* @var CoreEntityInterface $entity **/
        $entity = $this->getRepository()->firstOrNew([CoreEntityInterface::ID => $id]);

        if ($entity->getID() === null) {
            throw new EntityNotFoundByID($id, class_basename($entity));
        }

        $this->entity = $entity;

        return $this;
    }

    /**
     * Create and set new entity class
     *
     * @return CoreServiceInterface
     * @throws BindingResolutionException
     * @throws RepositoryEntityException
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 02.09.2018
     */
    public function setNewModel(): CoreServiceInterface
    {
        $this->setModel($this->getRepository()->makeEntity()->getEntity());

        return $this;
    }

    /**
     * Get previously set entity class
     *
     * @return CoreEntityInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 02.09.2018
     */
    public function getModel(): CoreEntityInterface
    {
        return $this->entity;
    }

    /**
     * Format entity using previously set formatter
     *
     * @return CoreFormatterInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 02.09.2018
     */
    public function format(): CoreFormatterInterface
    {
        return $this->getFormatter()->setModel($this->getModel());
    }

    /**
     * Store new entity in database
     *
     * @param array|null $parameters
     * @return CoreServiceInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 02.09.2018
     */
    public function create(?array $parameters = null): CoreServiceInterface
    {
        if (! is_array($parameters)) {
            $parameters = $this->getModel()->toArray();
        }

        $this->setModel($this->getRepository()->create($parameters));

        return $this;
    }

    /**
     * Update entity
     *
     * @param array|null $parameters
     * @return CoreServiceInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 02.09.2018
     */
    public function update(?array $parameters = null): CoreServiceInterface
    {
        if (! is_array($parameters)) {
            $parameters = $this->getModel()->toArray();
        }

        $this->getRepository()->update($this->getModel()->getID(), $parameters);

        return $this;
    }

    /**
     * Delete entity from database
     *
     * @return CoreServiceInterface
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 02.09.2018
     */
    public function delete(): CoreServiceInterface
    {
        $this->getRepository()->delete($this->getModel()->getID());

        return $this;
    }

}
