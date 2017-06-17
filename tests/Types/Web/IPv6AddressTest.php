<?php

namespace Somnambulist\Tests\ValueObjects\Types\Web;

use Somnambulist\ValueObjects\Types\Web\IPv4Address;
use Somnambulist\ValueObjects\Types\Web\IPv6Address;
use PHPUnit\Framework\TestCase;

/**
 * Class IPv6AddressTest
 *
 * @package    Somnambulist\Tests\ValueObjects\Types\Web
 * @subpackage Somnambulist\Tests\ValueObjects\Types\Web\IPv6AddressTest
 */
class IPv6AddressTest extends TestCase
{

    /**
     * @group value-objects
     * @group value-objects-ipv4
     */
    public function testCreate()
    {
        $vo = new IPv6Address('::10');

        $this->assertEquals('::10', $vo->toString());
    }

    /**
     * @group value-objects
     * @group value-objects-ipv4
     */
    public function testCanCastToString()
    {
        $vo = new IPv6Address('::10');

        $this->assertEquals('::10', (string)$vo);
    }

    /**
     * @group value-objects
     * @group value-objects-ipv4
     */
    public function testCanCompare()
    {
        $vo1 = new IPv6Address('::10');
        $vo2 = new IPv4Address('192.168.0.2');

        $this->assertTrue($vo1->equals($vo1));
        $this->assertFalse($vo2->equals($vo1));
    }
}
