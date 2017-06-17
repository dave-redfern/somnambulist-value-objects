<?php

namespace Somnambulist\Tests\ValueObjects\Types\Geography;

use PHPUnit\Framework\TestCase;
use Somnambulist\ValueObjects\Types\Geography\Country;
use Somnambulist\ValueObjects\Types\Geography\CountryCode;

/**
 * Class CountryTest
 *
 * @package    Somnambulist\Tests\ValueObjects\Types\Geography
 * @subpackage Somnambulist\Tests\ValueObjects\Types\Geography\CountryTest
 */
class CountryTest extends TestCase
{

    /**
     * @group value-objects
     * @group value-objects-country
     */
    public function testCreate()
    {
        $vo = new Country(CountryCode::CAN());

        $this->assertEquals('Canada', $vo->toString());
        $this->assertEquals('CAN', $vo->code()->toString());
    }

    /**
     * @group value-objects
     * @group value-objects-country
     */
    public function testCreateStatically()
    {
        $vo = Country::create('USA');

        $this->assertEquals('United States of America', $vo->toString());
        $this->assertEquals('USA', $vo->code()->toString());
    }

    /**
     * @group value-objects
     * @group value-objects-country
     */
    public function testCanCastToString()
    {
        $vo = new Country(CountryCode::CAN());

        $this->assertEquals('Canada', (string)$vo);
        $this->assertEquals('CAN', (string)$vo->code());
    }

    /**
     * @group value-objects
     * @group value-objects-country
     */
    public function testCanCompare()
    {
        $vo1 = new Country(CountryCode::CAN());
        $vo2 = new Country(CountryCode::USA());

        $this->assertTrue($vo1->equals($vo1));
        $this->assertFalse($vo2->equals($vo1));
    }
}
