<?php

namespace Somnambulist\Tests\ValueObjects\Types\Measure;

use Somnambulist\ValueObjects\Types\Measure\Area;
use PHPUnit\Framework\TestCase;
use Somnambulist\ValueObjects\Types\Measure\AreaUnit;

/**
 * Class AreaTest
 *
 * @package    Somnambulist\Tests\ValueObjects\Types\Measure
 * @subpackage Somnambulist\Tests\ValueObjects\Types\Measure\AreaTest
 */
class AreaTest extends TestCase
{

    /**
     * @group value-objects
     * @group value-objects-area
     */
    public function testCreate()
    {
        $vo = new Area(23.4, AreaUnit::SQ_FT());

        $this->assertEquals(23.4, $vo->value());
        $this->assertEquals(AreaUnit::SQ_FT(), $vo->unit());
    }

    /**
     * @group value-objects
     * @group value-objects-area
     */
    public function testCanCastToString()
    {
        $vo = new Area(23.4, AreaUnit::SQ_FT());

        $this->assertEquals('23.4', (string)$vo);
    }

    /**
     * @group value-objects
     * @group value-objects-area
     */
    public function testCanCompareEquality()
    {
        $vo1 = new Area(23.4, AreaUnit::SQ_FT());
        $vo2 = new Area(23.4, AreaUnit::SQ_M());

        $this->assertTrue($vo1->equals($vo1));
        $this->assertFalse($vo1->equals($vo2));
    }
}
