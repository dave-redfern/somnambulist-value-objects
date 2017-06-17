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

namespace Somnambulist\ValueObjects\Types\Measure;

use Somnambulist\ValueObjects\AbstractValueObject;

/**
 * Class Area
 *
 * @package    Somnambulist\ValueObjects\Types\Measure
 * @subpackage Somnambulist\ValueObjects\Types\Measure\Area
 */
class Area extends AbstractValueObject
{

    /**
     * @var float
     */
    private $value;

    /**
     * @var AreaUnit
     */
    private $unit;

    /**
     * Constructor.
     *
     * @param float    $value
     * @param AreaUnit $unit
     */
    public function __construct(float $value, AreaUnit $unit)
    {
        $this->value = $value;
        $this->unit  = $unit;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return (string)$this->value;
    }

    /**
     * @return float
     */
    public function value(): float
    {
        return $this->value;
    }

    /**
     * @return AreaUnit
     */
    public function unit(): AreaUnit
    {
        return $this->unit;
    }
}
