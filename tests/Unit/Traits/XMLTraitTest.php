<?php

namespace Tests\Unit\Traits;

use PacerIT\LaravelCore\Traits\Exceptions\InvalidXMLFormat;
use PacerIT\LaravelCore\Traits\XMLTrait;
use PHPUnit\Framework\TestCase;
use ReflectionException;

/**
 * Class XMLTraitTest.
 *
 * @author Wiktor Pacer <kontakt@pacerit.pl>
 *
 * @since 2019-08-13
 */
class XMLTraitTest extends TestCase
{
    /**
     * @var XMLTrait
     */
    protected $mockTrait;

    /**
     * @var string
     */
    protected $validXml;

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
        $this->mockTrait = $this->getMockForTrait(XMLTrait::class);
        $this->validXml = '<note><to>Tove</to><from>Jani</from><heading>Reminder</heading>
                <body>Don\'t forget me this weekend!</body></note>';
    }

    /**
     * Test XMLtoArray function with valid XML string.
     *
     * @throws InvalidXMLFormat
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-08-13
     */
    public function testXMLtoArrayFunctionWithValidXML()
    {
        $array = $this->mockTrait->xmlToArray($this->validXml);

        $this->assertEquals(true, array_key_exists('to', $array));
        $this->assertEquals(true, array_key_exists('from', $array));
        $this->assertEquals(true, array_key_exists('heading', $array));
        $this->assertEquals(true, array_key_exists('body', $array));
    }

    /**
     * Test XMLtoArray function with valid XML string.
     *
     * @throws InvalidXMLFormat
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-08-13
     */
    public function testXMLtoArrayFunctionWithNotValidXML()
    {
        $this->expectException(InvalidXMLFormat::class);

        $this->mockTrait->xmlToArray('not xml');
    }

    /**
     * Test getXmlRootTag with valid XML.
     *
     * @throws InvalidXMLFormat
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-08-13
     */
    public function testGetXmlRootTagWithValidXML()
    {
        $tag = $this->mockTrait->getXmlRootTag($this->validXml);

        $this->assertEquals('note', $tag);
    }

    /**
     * Test getXmlRootTag with not valid XML.
     *
     * @throws InvalidXMLFormat
     *
     * @author Wiktor Pacer <kontakt@pacerit.pl>
     *
     * @since 2019-08-13
     */
    public function testGetXmlRootTagWithNotValidXML()
    {
        $this->expectException(InvalidXMLFormat::class);

        $this->mockTrait->getXmlRootTag('not xml');
    }
}
