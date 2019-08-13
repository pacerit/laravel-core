<?php

namespace PacerIT\LaravelCore\Entities;

use Illuminate\Database\Eloquent\Model;
use PacerIT\LaravelCore\Entities\Interfaces\CoreEntityInterface;

/**
 * Class CoreEntity
 * Base class of the all models in application/modules. New models
 * must extend this class.
 *
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 *
 * @since 2019-07-05
 */
abstract class CoreEntity extends Model implements CoreEntityInterface
{
    /**
     * The attributes that should be cast to native types.
     * This is the sample of this array. This should be copied
     * to new model class, and extended with model attributes.
     *
     * @var array
     */
    protected $casts = [
        CoreEntityInterface::ID => 'integer',
        Model::CREATED_AT       => 'timestamps',
        Model::UPDATED_AT       => 'timestamps',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * Get ID of the entity.
     *
     * @return int|null
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-05
     */
    public function getID(): ?int
    {
        return $this->getAttribute(CoreEntityInterface::ID);
    }

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
    public function setID(int $id): CoreEntityInterface
    {
        return $this->setAttribute(CoreEntityInterface::ID, $id);
    }

    /**
     * Get model created at date.
     *
     * @return string|null
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-05
     */
    public function getCreatedAtDate(): ?string
    {
        return $this->getAttribute(Model::CREATED_AT);
    }

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
    public function setCreatedAtDate(string $date): CoreEntityInterface
    {
        return $this->setAttribute(Model::CREATED_AT, $date);
    }

    /**
     * Get model updated at date.
     *
     * @return string|null
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-05
     */
    public function getUpdatedAtDate(): ?string
    {
        return $this->getAttribute(Model::UPDATED_AT);
    }

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
    public function setUpdatedAtDate(string $date): CoreEntityInterface
    {
        return $this->setAttribute(Model::UPDATED_AT, $date);
    }
}
