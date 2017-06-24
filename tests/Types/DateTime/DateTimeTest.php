<?php

namespace Somnambulist\Tests\ValueObjects\Types\DateTime;

use PHPUnit\Framework\TestCase;
use Somnambulist\ValueObjects\Types\DateTime\DateTime;
use Somnambulist\ValueObjects\Types\DateTime\TimeZone;
use Somnambulist\ValueObjects\Types\Measure\AreaUnit;

/**
 * Class DateTimeTest
 *
 * @package    Somnambulist\Tests\ValueObjects\Types\DateTime
 * @subpackage Somnambulist\Tests\ValueObjects\Types\DateTime\DateTimeTest
 */
class DateTimeTest extends TestCase
{

    protected function setUp()
    {
        date_default_timezone_set('America/Toronto');
    }

    /**
     * @group value-objects
     * @group value-objects-date-time
     */
    public function testCreate()
    {
        $vo = new DateTime('2017-06-17 12:00:00');

        $this->assertEquals('2017-06-17 12:00:00', $vo->toString());
        $this->assertEquals('2017', $vo->year());
        $this->assertEquals('6', $vo->month());
        $this->assertEquals('17', $vo->day());
        $this->assertEquals('12', $vo->hour());
        $this->assertEquals('0', $vo->minute());
        $this->assertEquals('0', $vo->second());
    }

    /**
     * @group value-objects
     * @group value-objects-date-time
     */
    public function testCreateViaFactory()
    {
        $vo = DateTime::parse('2017-06-17 12:00:00', new TimeZone('UTC'));

        $this->assertEquals('2017-06-17 12:00:00', $vo->toString());
    }

    /**
     * @group value-objects
     * @group value-objects-date-time
     */
    public function testNow()
    {
        $vo = DateTime::now();

        $this->assertEquals(date('Y-m-d H:i:s'), $vo->toString());
        $this->assertEquals('America/Toronto', (string)$vo->timezone());
    }

    /**
     * @group value-objects
     * @group value-objects-date-time
     */
    public function testCreateFromFormat()
    {
        $vo = DateTime::createFromFormat('Y-m-d H:i:s', '2017-06-17 12:00:00');

        $this->assertEquals('2017-06-17 12:00:00', $vo->toString());
    }

    /**
     * @group value-objects
     * @group value-objects-date-time
     */
    public function testCreateFromFormatRaisesExceptionIfInvalid()
    {
        $this->expectException(\InvalidArgumentException::class);
        $vo = DateTime::createFromFormat('bob', '2017-06-17 12:00:00');
    }

    /**
     * @group value-objects
     * @group value-objects-date-time
     */
    public function testCreateViaFactoryWithTimeZone()
    {
        $vo = DateTime::parse('2017-06-17 12:00:00', new TimeZone('UTC'));

        $this->assertEquals('2017-06-17 12:00:00', $vo->toString());
    }

    /**
     * @group value-objects
     * @group value-objects-date-time
     */
    public function testCanCastToString()
    {
        $vo = new DateTime('2017-06-17 12:00:00', new \DateTimeZone('UTC'));

        $this->assertEquals('2017-06-17 12:00:00', (string)$vo);
    }

    /**
     * @group value-objects
     * @group value-objects-date-time
     */
    public function testCanTestEquality()
    {
        $vo1 = new DateTime();
        $vo2 = $vo1->clone();
        $vo3 = new DateTime('yesterday', new \DateTimeZone('Pacific/Honolulu'));

        $this->assertTrue($vo1->equals($vo2));
        $this->assertFalse($vo1->equals($vo3));
    }

    /**
     * @group value-objects
     * @group value-objects-date-time
     */
    public function testCanCompareOtherObjects()
    {
        $vo1 = new DateTime();
        $vo2 = AreaUnit::SQ_M();

        $this->assertFalse($vo1->equals($vo2));
    }

    /**
     * @group value-objects
     * @group value-objects-date-time
     */
    public function testCantSetArbitraryProperties()
    {
        $vo = new DateTime();
        $vo->foo = 'bar';

        $this->assertObjectNotHasAttribute('foo', $vo);
    }
}
