<?php

namespace Somnambulist\Tests\ValueObjects\Types\Measure;

use Somnambulist\ValueObjects\Types\Measure\AreaUnit;
use Somnambulist\ValueObjects\Types\Measure\DistanceUnit;
use PHPUnit\Framework\TestCase;

/**
 * Class DistanceUnitTest
 *
 * @package    Somnambulist\Tests\ValueObjects\Types\Measure
 * @subpackage Somnambulist\Tests\ValueObjects\Types\Measure\DistanceUnitTest
 */
class DistanceUnitTest extends TestCase
{

    /**
     * @group value-objects
     * @group value-objects-distance-unit
     */
    public function testCanCompare()
    {
        $vo1 = DistanceUnit::FEET();
        $vo2 = DistanceUnit::KM();

        $this->assertTrue($vo1->equals($vo1));
        $this->assertFalse($vo1->equals($vo2));
    }

    /**
     * @group value-objects
     * @group value-objects-distance-unit
     */
    public function testCanCompareOtherObjects()
    {
        $vo1 = AreaUnit::SQ_FT();
        $vo2 = DistanceUnit::KM();

        $this->assertFalse($vo1->equals($vo2));
    }

    /**
     * @group value-objects
     * @group value-objects-distance-unit
     */
    public function testCantSetArbitraryProperties()
    {
        $vo = DistanceUnit::FEET();
        $vo->foo = 'bar';

        $this->assertObjectNotHasAttribute('foo', $vo);
    }
}
