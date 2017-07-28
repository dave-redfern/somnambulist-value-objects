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

namespace Somnambulist\ValueObjects\Types\DateTime;

use Somnambulist\ValueObjects\Contracts\ValueObjectInterface;
use Somnambulist\ValueObjects\Types\DateTime\Traits\Comparable;
use Somnambulist\ValueObjects\Types\DateTime\Traits\Factory;
use Somnambulist\ValueObjects\Types\DateTime\Traits\Stringable;

/**
 * Class DateTime
 *
 * @package    Somnambulist\ValueObjects\Types\DateTime
 * @subpackage Somnambulist\ValueObjects\Types\DateTime\DateTime
 */
class DateTime extends \DateTimeImmutable implements ValueObjectInterface
{

    use Comparable;
    use Factory;
    use Stringable;

    /**
     * @param string $name
     * @param mixed  $value
     */
    public function __set($name, $value)
    {
        // prevent arbitrary properties
    }

    /**
     * @return DateTime
     */
    public function clone(): DateTime
    {
        return clone $this;
    }

    /**
     * @return TimeZone
     */
    public function timezone(): TimeZone
    {
        return new TimeZone($this->getTimezone()->getName());
    }

    /**
     * @return int
     */
    public function year(): int
    {
        return (int)$this->format('Y');
    }

    /**
     * @return int
     */
    public function month(): int
    {
        return (int)$this->format('m');
    }

    /**
     * @return int
     */
    public function day(): int
    {
        return (int)$this->format('d');
    }

    /**
     * @return int
     */
    public function hour(): int
    {
        return (int)$this->format('H');
    }

    /**
     * @return int
     */
    public function minute(): int
    {
        return (int)$this->format('i');
    }

    /**
     * @return int
     */
    public function second(): int
    {
        return (int)$this->format('s');
    }

    /**
     * @return int
     */
    public function timestamp(): int
    {
        return (int)$this->format('U');
    }

    /**
     * @return int
     */
    public function weekOfYear(): int
    {
        return (int)$this->format('W');
    }

    /**
     * @return int
     */
    public function daysInMonth(): int
    {
        return (int)$this->format('t');
    }

    /**
     * @return int
     */
    public function dayOfWeek(): int
    {
        return (int)$this->format('w');
    }

    /**
     * @return int
     */
    public function dayOfYear(): int
    {
        return (int)$this->format('z');
    }
}
