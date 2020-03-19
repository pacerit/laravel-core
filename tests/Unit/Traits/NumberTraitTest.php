<?php

namespace Tests\Unit\Traits;

use PacerIT\LaravelCore\Traits\NumberTrait;
use PHPUnit\Framework\TestCase;
use ReflectionException;

/**
 * Class NumberTraitTest.
 *
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 *
 * @since 2019-08-13
 */
class NumberTraitTest extends TestCase
{
    /**
     * @var NumberTrait
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
        $this->mockTrait = $this->getMockForTrait(NumberTrait::class);
    }

    /**
     * Test convertFloatToNumberComa function.
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-08-13
     */
    public function testConvertFloatToNumberComaFunction()
    {
        $this->assertEquals('99,99', $this->mockTrait->convertFloatToNumberComa(99.99));
    }

    /**
     * Test convertComaNumberToFloat function.
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-08-13
     */
    public function testConvertComaNumberToFloat()
    {
        $this->assertEquals(99.99, $this->mockTrait->convertComaNumberToFloat('99,99'));
    }
}
