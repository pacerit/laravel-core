<?php

namespace PacerIT\LaravelCore\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;
use PacerIT\LaravelCore\Entities\Interfaces\CoreEntityInterface;

/**
 * Class Select2Criteria
 *
 * @package PacerIT\LaravelCore\Repositories\Criteria
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-31
 */
class Select2Criteria extends CoreRepositoryCriteria
{

    /**
     * Phrase to search
     *
     * @var string $searchPhrase
     */
    protected $searchPhrase;

    /**
     * Array of fields to select
     *
     * @var array $select
     */
    protected $select;

    /**
     * Fields to search
     *
     * @var string $searchField
     */
    protected $searchField;

    /**
     * Limit for query
     *
     * @var integer $limit
     */
    protected $limit;

    /**
     * Select2Criteria constructor.
     *
     * @param string $searchPhrase
     * @param array $select
     * @param string $searchField
     * @param integer $limit
     */
    public function __construct(
        string $searchPhrase,
        array $select,
        string $searchField,
        int $limit = 5
    ) {
        $this->searchPhrase = $searchPhrase;
        $this->select = $select;
        $this->searchField = $searchField;
        $this->limit = $limit;
    }

    /**
     * Apply criteria on entity
     *
     * @param CoreEntityInterface|Builder $entity
     * @return CoreEntityInterface|Builder
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-05
     */
    public function apply($entity)
    {
        return $entity->select($this->select)
            ->where($this->searchField, 'like', '%' . $this->searchPhrase . '%')
            ->limit($this->limit);
    }

}
