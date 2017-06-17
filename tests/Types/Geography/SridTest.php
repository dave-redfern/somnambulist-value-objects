<?php

namespace Somnambulist\Tests\ValueObjects\Types\Geography;

use PHPUnit\Framework\TestCase;
use Somnambulist\ValueObjects\Types\Geography\Srid;

/**
 * Class SridTest
 *
 * @package    Somnambulist\Tests\ValueObjects\Types\Geography
 * @subpackage Somnambulist\Tests\ValueObjects\Types\Geography\SridTest
 */
class SridTest extends TestCase
{

    /**
     * @group value-objects
     * @group value-objects-srid
     */
    public function testCreate()
    {
        $vo = Srid::WGS84();

        $this->assertEquals('4326', $vo->toString());
    }

    /**
     * @group value-objects
     * @group value-objects-srid
     */
    public function testCanCastToString()
    {
        $vo = Srid::WGS84();

        $this->assertEquals('4326', (string)$vo);
    }
}
