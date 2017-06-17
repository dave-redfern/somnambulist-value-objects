<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace Somnambulist\ValueObjects\Types\Money;

use Somnambulist\ValueObjects\AbstractValueObject;

/**
 * Class Money
 *
 * @package    Somnambulist\ValueObjects\Types\Money
 * @subpackage Somnambulist\ValueObjects\Types\Money\Money
 */
class Money extends AbstractValueObject
{

    /**
     * @var float
     */
    protected $amount;

    /**
     * @var Currency
     */
    protected $currency;

    /**
     * Constructor.
     *
     * @param float    $amount
     * @param Currency $currency
     */
    public function __construct(float $amount, Currency $currency)
    {
        $this->amount   = $amount;
        $this->currency = $currency;
    }

    /**
     * @param float               $amount
     * @param string|CurrencyCode $code
     *
     * @return static
     */
    public static function create(float $amount, $code)
    {
        return new static($amount, Currency::create($code));
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return sprintf('%s %s', $this->currency->code(), $this->rounded());
    }

    /**
     * Returns the raw float amount
     *
     * @return float
     */
    public function amount(): float
    {
        return $this->amount;
    }

    /**
     * Returns the float amount to the currencies precision value
     *
     * @return string
     */
    public function rounded()
    {
        return number_format($this->amount, $this->currency->precision());
    }

    /**
     * @return Currency
     */
    public function currency(): Currency
    {
        return $this->currency;
    }
}
