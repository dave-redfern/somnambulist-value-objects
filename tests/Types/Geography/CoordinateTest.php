<?php

namespace Somnambulist\Tests\ValueObjects\Types\Geography;

use PHPUnit\Framework\TestCase;
use Somnambulist\ValueObjects\Types\Geography\Coordinate;
use Somnambulist\ValueObjects\Types\Geography\Srid;

/**
 * Class CoordinateTest
 *
 * @package    Somnambulist\Tests\ValueObjects\Types\Geography
 * @subpackage Somnambulist\Tests\ValueObjects\Types\Geography\CoordinateTest
 */
class CoordinateTest extends TestCase
{
    
    /**
     * @group value-objects
     * @group value-objects-coord
     */
    public function testCreate()
    {
        $vo = new Coordinate(4, 7, Srid::WGS84());

        $this->assertEquals(4, $vo->latitude());
        $this->assertEquals(7, $vo->longitude());
        $this->assertEquals('4326', $vo->srid()->toString());
    }

    /**
     * @group value-objects
     * @group value-objects-coord
     */
    public function testCanCastToString()
    {
        $vo = new Coordinate(4, 7, Srid::WGS84());

        $this->assertEquals('[7, 4]', (string)$vo);
    }

    /**
     * @group value-objects
     * @group value-objects-coord
     */
    public function testCanCastToGeoJson()
    {
        $vo = new Coordinate(4, 7, Srid::WGS84());

        $this->assertEquals('{"type":"Point","coordinates":[7,4],"crs":{"type":"name","properties":{"name":"EPSG:4326"}}}', $vo->toGeoJson());
    }
}
