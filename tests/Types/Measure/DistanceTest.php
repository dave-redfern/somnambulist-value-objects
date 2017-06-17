<?php

namespace Somnambulist\Tests\ValueObjects\Types\Measure;

use Somnambulist\ValueObjects\Types\Measure\Distance;
use PHPUnit\Framework\TestCase;
use Somnambulist\ValueObjects\Types\Measure\DistanceUnit;

/**
 * Class DistanceTest
 *
 * @package    Somnambulist\Tests\ValueObjects\Types\Measure
 * @subpackage Somnambulist\Tests\ValueObjects\Types\Measure\DistanceTest
 */
class DistanceTest extends TestCase
{

    /**
     * @group value-objects
     * @group value-objects-distance
     */
    public function testCreate()
    {
        $vo = new Distance(23.4, DistanceUnit::MILE());

        $this->assertEquals(23.4, $vo->value());
        $this->assertEquals(DistanceUnit::MILE(), $vo->unit());
    }

    /**
     * @group value-objects
     * @group value-objects-distance
     */
    public function testCanCastToString()
    {
        $vo = new Distance(23.4, DistanceUnit::MILE());

        $this->assertEquals('23.4', (string)$vo);
    }

    /**
     * @group value-objects
     * @group value-objects-distance
     */
    public function testCanTestEquality()
    {
        $vo = new Distance(23.4, DistanceUnit::MILE());

        $this->assertTrue($vo->equals($vo));

        $vo2 = new Distance(23.4, DistanceUnit::KM());

        $this->assertFalse($vo->equals($vo2));
    }
}
