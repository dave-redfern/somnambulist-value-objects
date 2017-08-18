<?php

namespace Somnambulist\ValueObjects\Types;

use Assert\Assert;
use Somnambulist\ValueObjects\AbstractValueObject;

/**
 * Class PhoneNumber
 *
 * @package    Somnambulist\ValueObjects\Types
 * @subpackage Somnambulist\ValueObjects\Types\PhoneNumber
 */
class PhoneNumber extends AbstractValueObject
{

    /**
     * @var string
     */
    private $value;

    /**
     * Constructor.
     *
     * @param string $number
     */
    public function __construct($number)
    {
        Assert::that($number, null, 'number')->notEmpty()->e164();

        $this->value = $number;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return (string)$this->value;
    }
}
