<?php

namespace Tests\Unit\Traits;

use Illuminate\Contracts\Container\BindingResolutionException;
use PacerIT\LaravelCore\Traits\Exceptions\ScenarioNotRegistered;
use PacerIT\LaravelCore\Traits\Exceptions\ScenarioRegistered;
use PacerIT\LaravelCore\Traits\ScenarioTrait;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use stdClass;

/**
 * Class ScenarioTraitTest.
 *
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 *
 * @since 2019-08-13
 */
class ScenarioTraitTest extends TestCase
{
    /**
     * @var ScenarioTrait
     */
    protected $mockTrait;

    /**
     * Set up test.
     *
     * @throws ReflectionException
     *
     * @since 2019-08-13
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->mockTrait = $this->getMockForTrait(ScenarioTrait::class);
    }

    /**
     * Test ScenarioTrait functions.
     *
     * @throws ScenarioRegistered
     * @throws BindingResolutionException
     * @throws ScenarioNotRegistered
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-08-13
     */
    public function testScenarioTrait()
    {
        $this->mockTrait->registerScenario('test', stdClass::class);

        $this->assertEquals(true, $this->mockTrait->isRegistered('test'));
        $this->assertEquals(false, $this->mockTrait->isRegistered('not registered'));

        $this->assertInstanceOf(stdClass::class, $this->mockTrait->getScenarioInstance('test'));

        $this->expectException(ScenarioNotRegistered::class);

        $this->mockTrait->getScenarioInstance('not registered');
    }
}
