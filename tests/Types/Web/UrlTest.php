<?php

namespace Somnambulist\Tests\ValueObjects\Types\Web;

use Somnambulist\ValueObjects\Types\Web\Url;
use PHPUnit\Framework\TestCase;

/**
 * Class UrlTest
 *
 * @package    Somnambulist\Tests\ValueObjects\Types
 * @subpackage Somnambulist\Tests\ValueObjects\Types\UrlTest
 */
class UrlTest extends TestCase
{
    
    /**
     * @group value-objects
     * @group value-objects-url
     */
    public function testCreate()
    {
        $vo = new Url('https://user:pass@www.example.com:8080/this/path?foo=bar&bar=baz&baz[]=45&baz=67#fragment');

        $this->assertEquals('https://user:pass@www.example.com:8080/this/path?foo=bar&bar=baz&baz[]=45&baz=67#fragment', $vo->toString());
        $this->assertEquals('https', $vo->scheme());
        $this->assertEquals('user', $vo->user());
        $this->assertEquals('pass', $vo->password());
        $this->assertEquals('www.example.com', $vo->host());
        $this->assertEquals('8080', $vo->port());
        $this->assertEquals('/this/path', $vo->path());
        $this->assertEquals('foo=bar&bar=baz&baz[]=45&baz=67', $vo->query());
        $this->assertEquals('fragment', $vo->fragment());
    }

    /**
     * @group value-objects
     * @group value-objects-url
     */
    public function testCanCastToString()
    {
        $vo = new Url('https://user:pass@www.example.com:8080/this/path?foo=bar&bar=baz&baz[]=45&baz=67#fragment');

        $this->assertEquals('https://user:pass@www.example.com:8080/this/path?foo=bar&bar=baz&baz[]=45&baz=67#fragment', $vo->toString());
    }

    /**
     * @group value-objects
     * @group value-objects-url
     */
    public function testCanCompare()
    {
        $vo1 = new Url('https://user:pass@www.example.com:8080/this/path?foo=bar&bar=baz&baz[]=45&baz=67#fragment');
        $vo2 = new Url('https://www.example.com');

        $this->assertTrue($vo1->equals($vo1));
        $this->assertFalse($vo2->equals($vo1));
    }
}
