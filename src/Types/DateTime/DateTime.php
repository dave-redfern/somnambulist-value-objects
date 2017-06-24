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

use DateTimeZone;
use Somnambulist\ValueObjects\Contracts\ValueObjectInterface;

/**
 * Class DateTime
 *
 * @package    Somnambulist\ValueObjects\Types\DateTime
 * @subpackage Somnambulist\ValueObjects\Types\DateTime\DateTime
 */
class DateTime extends \DateTimeImmutable implements ValueObjectInterface
{

    /**
     * @return DateTime
     */
    public static function now()
    {
        return static::parse('now', TimeZone::create());
    }

    /**
     * Creates a DateTime instance from the time string and TimeZone
     *
     * @param string   $time Any valid datetime string that can be processed by date()
     * @param TimeZone $tz
     *
     * @return static
     */
    public static function parse($time = 'now', TimeZone $tz)
    {
        return new static($time, $tz->toNative());
    }

    /**
     * Create a DateTime instance
     *
     * Based on Carbon::create with the following differences:
     *  * if you require an hour, you must specify minutes and seconds as 0 (zero)
     *  * TimeZone should be specified using the value object
     *
     * @param null|int      $year
     * @param null|int      $month
     * @param null|int      $day
     * @param null|int      $hour
     * @param null|int      $minute
     * @param null|int      $second
     * @param null|TimeZone $tz
     *
     * @return bool|DateTime
     */
    public static function create($year = null, $month = null, $day = null, $hour = null, $minute = null, $second = null, TimeZone $tz = null)
    {
        [$nowYear, $nowMonth, $nowDay, $nowHour, $nowMin, $nowSec] = explode('-', date('Y-n-j-G-i-s', time()));

        $year   = $year ?? $nowYear;
        $month  = $month ?? $nowMonth;
        $day    = $day ?? $nowDay;
        $hour   = $hour ?? $nowHour;
        $minute = $minute ?? $nowMin;
        $second = $second ?? $nowSec;
        $tz     = $tz ?? TimeZone::create();

        return static::createFromFormat(
            'Y-n-j G:i:s',
            sprintf('%s-%s-%s %s:%02s:%02s', $year, $month, $day, $hour, $minute, $second),
            $tz->toNative()
        );
    }

    /**
     * @param string            $format
     * @param string            $time
     * @param null|DateTimeZone $object
     *
     * @return static
     */
    public static function createFromFormat($format, $time, $object = null)
    {
        if ($object !== null) {
            $dt = parent::createFromFormat($format, $time, $object);
        } else {
            $dt = parent::createFromFormat($format, $time);
        }

        $lastErrors = parent::getLastErrors();

        if ($dt instanceof \DateTimeInterface) {
            return new static($dt->format('Y-m-d H:i:s.u'), $dt->getTimezone());
        }

        throw new \InvalidArgumentException(implode(PHP_EOL, $lastErrors['errors']));
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }

    /**
     * @param string $name
     * @param mixed  $value
     */
    public function __set($name, $value)
    {
        // prevent arbitrary properties
    }

    /**
     * @param mixed $object
     *
     * @return bool
     */
    public function equals($object): bool
    {
        if (get_class($object) !== get_class($this)) {
            return false;
        }

        return $this->toString() === $object->toString() && $this->timezone()->equals($object->timezone());
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->format('Y-m-d H:i:s');
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
     * Format the instance as date
     *
     * @return string
     */
    public function toDateString()
    {
        return $this->format('Y-m-d');
    }

    /**
     * Format the instance as a readable date
     *
     * @return string
     */
    public function toFormattedDateString()
    {
        return $this->format('M j, Y');
    }

    /**
     * Format the instance as time
     *
     * @return string
     */
    public function toTimeString()
    {
        return $this->format('H:i:s');
    }

    /**
     * Format the instance as date and time
     *
     * @return string
     */
    public function toDateTimeString()
    {
        return $this->format('Y-m-d H:i:s');
    }

    /**
     * Format the instance with day, date and time
     *
     * @return string
     */
    public function toDayDateTimeString()
    {
        return $this->format('D, M j, Y g:i A');
    }

    /**
     * Format the instance as ATOM
     *
     * @return string
     */
    public function toAtomString()
    {
        return $this->format(\DateTime::ATOM);
    }

    /**
     * Format the instance as COOKIE
     *
     * @return string
     */
    public function toCookieString()
    {
        return $this->format(\DateTime::COOKIE);
    }

    /**
     * Format the instance as ISO8601
     *
     * @return string
     */
    public function toIso8601String()
    {
        return $this->toAtomString();
    }

    /**
     * Format the instance as RFC822
     *
     * @return string
     */
    public function toRfc822String()
    {
        return $this->format(\DateTime::RFC822);
    }

    /**
     * Format the instance as RFC2822
     *
     * @return string
     */
    public function toRfc2822String()
    {
        return $this->format(\DateTime::RFC2822);
    }

    /**
     * Format the instance as RSS
     *
     * @return string
     */
    public function toRssString()
    {
        return $this->format(\DateTime::RSS);
    }

    /**
     * Format the instance as W3C
     *
     * @return string
     */
    public function toW3cString()
    {
        return $this->format(\DateTime::W3C);
    }
}
