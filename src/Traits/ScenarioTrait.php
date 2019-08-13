<?php

namespace PacerIT\LaravelCore\Traits;

use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;
use PacerIT\LaravelCore\Helpers\ArrayHelper;
use PacerIT\LaravelCore\Traits\Exceptions\ScenarioNotRegistered;
use PacerIT\LaravelCore\Traits\Exceptions\ScenarioRegistered;

/**
 * Trait ScenarioTrait.
 *
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 *
 * @since 2019-07-10
 */
trait ScenarioTrait
{
    /**
     * Array of registered scenarios.
     *
     * @var array
     */
    protected $scenarios = [];

    /**
     * Register new scenario.
     *
     * @param string $scenario
     * @param $object
     * @param string|null $group
     *
     * @throws ScenarioRegistered
     *
     * @return bool
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-10
     */
    public function registerScenario(string $scenario, $object, string $group = null): bool
    {
        if (array_key_exists($scenario, $this->scenarios)) {
            throw new ScenarioRegistered($scenario);
        }

        if ($group !== null) {
            $scenario = $scenario.'_'.$group;
        }

        $this->scenarios[$scenario] = $object;

        return true;
    }

    /**
     * Checking if scenario is registered.
     *
     * @param string|null $scenario
     * @param string|null $group
     *
     * @return bool
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-10
     */
    public function isRegistered(?string $scenario, string $group = null): bool
    {
        if ($group !== null) {
            $scenario = $scenario.'_'.$group;
        }

        if ($scenario == null) {
            return false;
        }

        return array_key_exists($scenario, $this->scenarios);
    }

    /**
     * Get scenario instance.
     *
     * @param string|null $scenario
     * @param string|null $group
     *
     * @throws ScenarioNotRegistered
     * @throws BindingResolutionException
     *
     * @return mixed
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-07-10
     */
    public function getScenarioInstance(?string $scenario, string $group = null)
    {
        if ($group !== null) {
            $scenario = $scenario.'_'.$group;
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
