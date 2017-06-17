<?php

namespace Somnambulist\Tests\ValueObjects\Types\Money;

use Somnambulist\ValueObjects\Types\Money\Currency;
use PHPUnit\Framework\TestCase;
use Somnambulist\ValueObjects\Types\Money\CurrencyCode;

/**
 * Class CurrencyTest
 *
 * @package    Somnambulist\Tests\ValueObjects\Types\Money
 * @subpackage Somnambulist\Tests\ValueObjects\Types\Money\CurrencyTest
 */
class CurrencyTest extends TestCase
{

    /**
     * @group value-objects
     * @group value-objects-country
     */
    public function testCreate()
    {
        $vo = new Currency(CurrencyCode::CAD());

        $this->assertEquals('Canadian Dollar', $vo->toString());
        $this->assertEquals('CAD', $vo->code()->toString());
        $this->assertEquals(2, $vo->precision());
    }

    /**
     * @group value-objects
     * @group value-objects-country
     */
    public function testCreateGetsDefaultPrecision()
    {
        $vo = new Currency(CurrencyCode::USD());

        $this->assertEquals(2, $vo->precision());
    }

    /**
     * @group value-objects
     * @group value-objects-country
     */
    public function testCreateGetsSpecificPrecision()
    {
        $vo = new Currency(CurrencyCode::BHD());

        $this->assertEquals(3, $vo->precision());

        $vo = new Currency(CurrencyCode::CLF());

        $this->assertEquals(4, $vo->precision());

        $vo = new Currency(CurrencyCode::VND());

        $this->assertEquals(0, $vo->precision());
    }

    /**
     * @group value-objects
     * @group value-objects-country
     */
    public function testCreateStatically()
    {
        $vo = Currency::create('GBP');

        $this->assertEquals('Pound Sterling', $vo->toString());
        $this->assertEquals('GBP', $vo->code()->toString());
    }

    /**
     * @group value-objects
     * @group value-objects-country
     */
    public function testCanCastToString()
    {
        $vo = new Currency(CurrencyCode::CAD());

        $this->assertEquals('Canadian Dollar', (string)$vo);
        $this->assertEquals('CAD', (string)$vo->code());
    }

    /**
     * @group value-objects
     * @group value-objects-country
     */
    public function testCanCompare()
    {
        $vo1 = new Currency(CurrencyCode::CAD());
        $vo2 = new Currency(CurrencyCode::USD());

        $this->assertTrue($vo1->equals($vo1));
        $this->assertFalse($vo2->equals($vo1));
    }
}
