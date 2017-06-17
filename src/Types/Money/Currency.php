<?php

namespace Somnambulist\ValueObjects\Types\Money;

use Somnambulist\ValueObjects\AbstractValueObject;

/**
 * Class Currency
 *
 * @package    Somnambulist\ValueObjects\Types\Money
 * @subpackage Somnambulist\ValueObjects\Types\Money\Currency
 */
class Currency extends AbstractValueObject
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $precision;

    /**
     * @var CurrencyCode
     */
    private $code;

    /**
     * Constructor.
     *
     * @param CurrencyCode $code
     */
    public function __construct(CurrencyCode $code)
    {
        $this->code      = $code;
        $this->name      = CurrencyCodeMappings::name($code);
        $this->precision = CurrencyCodeMappings::precision($code);
    }

    /**
     * @param string|CurrencyCode $code
     *
     * @return static
     */
    public static function create($code)
    {
        return new static(CurrencyCode::memberByValue((string)$code));
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return (string)$this->name;
    }

    /**
     * @return CurrencyCode
     */
    public function code(): CurrencyCode
    {
        return $this->code;
    }

    /**
     * @return int
     */
    public function precision(): int
    {
        return $this->precision;
    }
}
