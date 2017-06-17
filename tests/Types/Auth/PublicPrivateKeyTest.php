<?php

namespace Somnambulist\Tests\ValueObjects\Types\Auth;

use PHPUnit\Framework\TestCase;
use Somnambulist\ValueObjects\Types\Auth\PublicPrivateKey;
use Somnambulist\ValueObjects\Types\Identity\EmailAddress;

/**
 * Class PublicPrivateKeyTest
 *
 * @package    Somnambulist\Tests\ValueObjects\Types\Auth
 * @subpackage Somnambulist\Tests\ValueObjects\Types\Auth\PublicPrivateKeyTest
 */
class PublicPrivateKeyTest extends TestCase
{
    
    /**
     * @group value-objects
     * @group value-objects-public-private-key
     */
    public function testCreate()
    {
        $vo = new PublicPrivateKey(__CLASS__, 'PublicPrivateKeyTest');

        $this->assertEquals(__CLASS__, $vo->publicKey());
        $this->assertEquals('PublicPrivateKeyTest', $vo->privateKey());
    }

    /**
     * @group value-objects
     * @group value-objects-public-private-key
     */
    public function testCanCastToString()
    {
        $vo = new PublicPrivateKey(__CLASS__, 'PublicPrivateKeyTest');

        $this->assertEquals(__CLASS__, (string)$vo);
    }

    /**
     * @group value-objects
     * @group value-objects-public-private-key
     */
    public function testCanCompareInstances()
    {
        $vo1 = new PublicPrivateKey(__CLASS__, 'PublicPrivateKeyTest');
        $vo2 = new PublicPrivateKey(__CLASS__, 'AnotherTest');
        $vo3 = new PublicPrivateKey(__CLASS__, 'PublicPrivateKeyTest');

        $this->assertFalse($vo1->equals($vo2));
        $this->assertTrue($vo1->equals($vo3));
        $this->assertTrue($vo1->equals($vo1));
    }

    /**
     * @group value-objects
     * @group value-objects-public-private-key
     */
    public function testCanCompareOtherInstances()
    {
        $vo1 = new PublicPrivateKey(__CLASS__, 'PublicPrivateKeyTest');
        $vo2 = new EmailAddress('bob@example.com');

        $this->assertFalse($vo1->equals($vo2));
    }

    /**
     * @group value-objects
     * @group value-objects-public-private-key
     */
    public function testCantSetArbitraryProperties()
    {
        $vo = new PublicPrivateKey(__CLASS__, 'PublicPrivateKeyTest');
        $vo->foo = 'bar';

        $this->assertObjectNotHasAttribute('foo', $vo);
    }
}
