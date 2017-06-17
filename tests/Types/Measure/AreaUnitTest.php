<?php

namespace Somnambulist\Tests\ValueObjects\Types\Measure;

use Somnambulist\ValueObjects\Types\Measure\AreaUnit;
use PHPUnit\Framework\TestCase;
use Somnambulist\ValueObjects\Types\Measure\DistanceUnit;

/**
 * Class AreaUnitTest
 *
 * @package    Somnambulist\Tests\ValueObjects\Types\Measure
 * @subpackage Somnambulist\Tests\ValueObjects\Types\Measure\AreaUnitTest
 */
class AreaUnitTest extends TestCase
{

    /**
     * @group value-objects
     * @group value-objects-area-unit
     */
    public function testCanCompare()
    {
        $vo1 = AreaUnit::SQ_FT();
        $vo2 = AreaUnit::SQ_M();

        $this->assertTrue($vo1->equals($vo1));
        $this->assertFalse($vo1->equals($vo2));
    }

    /**
     * @group value-objects
     * @group value-objects-area-unit
     */
    public function testCanCompareOtherObjects()
    {
        $vo1 = AreaUnit::SQ_FT();
        $vo2 = DistanceUnit::KM();

        $this->assertFalse($vo1->equals($vo2));
    }

    /**
     * @group value-objects
     * @group value-objects-area-unit
     */
    public function testCantSetArbitraryProperties()
    {
        $vo = AreaUnit::SQ_FT();
        $vo->foo = 'bar';

        $this->assertObjectNotHasAttribute('foo', $vo);
    }
}
