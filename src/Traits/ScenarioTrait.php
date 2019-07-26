<?php

namespace pacerit\butterflyCore\Traits;

use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;
use pacerit\butterflyCore\Helpers\ArrayHelper;
use pacerit\butterflyCore\Traits\Exceptions\ScenarioNotRegistered;
use pacerit\butterflyCore\Traits\Exceptions\ScenarioRegistered;

/**
 * Trait ScenarioTrait
 *
 * @package pacerit\butterflyCore\Traits
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 * @since 2019-07-10
 */
trait ScenarioTrait
{

    /**
     * Array of registered scenarios
     *
     * @var array $scenarios
     */
    protected $scenarios = [];

    /**
     * Register new scenario
     *
     * @param string $scenario
     * @param $object
     * @param string|null $group
     * @return boolean
     * @throws ScenarioRegistered
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function registerScenario(string $scenario, $object, string $group = null): bool
    {
        if (array_key_exists($scenario, $this->scenarios)) {
            throw new ScenarioRegistered($scenario);
        }

        if ($group !== null) {
            $scenario = $scenario . '_' . $group;
        }

        $this->scenarios[$scenario] = $object;

        return true;
    }

    /**
     * Checking if scenario is registered
     *
     * @param string|null $scenario
     * @param string|null $group
     * @return boolean
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function isRegistered(?string $scenario, string $group = null): bool
    {
        if ($group !== null) {
            $scenario = $scenario . '_' . $group;
        }

        if ($scenario == null) {
            return false;
        }

        return ArrayHelper::get($this->scenarios, $scenario);
    }

    /**
     * Get scenario instance
     *
     * @param string|null $scenario
     * @param string|null $group
     * @return mixed
     * @throws ScenarioNotRegistered
     * @throws BindingResolutionException
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     * @since 2019-07-10
     */
    public function getScenarioInstance(?string $scenario, string $group = null)
    {
        if ($group !== null) {
            $scenario = $scenario . '_' . $group;
        }

        if (!$this->isRegistered($scenario)) {
            throw new ScenarioNotRegistered($scenario);
        }

        $scenarioInstance = ArrayHelper::get($this->scenarios, $scenario);

        if (is_string($scenarioInstance)) {
            $container = Container::getInstance();
            return $container->make($scenarioInstance);
        }

        return $scenarioInstance;
    }

}
