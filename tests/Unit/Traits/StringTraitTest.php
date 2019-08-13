<?php

namespace Tests\Unit\Traits;

use PacerIT\LaravelCore\Traits\StringTrait;
use PHPUnit\Framework\TestCase;
use ReflectionException;

/**
 * Class StringTraitTest.
 *
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 *
 * @since 2019-08-13
 */
class StringTraitTest extends TestCase
{
    /**
     * @var StringTrait
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
    public function setUp()
    {
        parent::setUp();
        $this->mockTrait = $this->getMockForTrait(StringTrait::class);
    }

    /**
     * Test isJon function with valid JSON.
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-08-13
     */
    public function testIsJsonFunctionValidJSON()
    {
        $this->assertEquals(true, $this->mockTrait->isJson('{"valid": true}'));
    }

    /**
     * Test isJon function with not valid JSON.
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-08-13
     */
    public function testIsJsonFunctionNotValidJSON()
    {
        $this->assertEquals(false, $this->mockTrait->isJson('"valid": false'));
    }

    /**
     * Test remove spaces function.
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-08-13
     */
    public function testRemoveSpacesFunction()
    {
        $this->assertEquals('textwithoutspaces', $this->mockTrait->removeSpaces('text without spaces'));
    }
}
