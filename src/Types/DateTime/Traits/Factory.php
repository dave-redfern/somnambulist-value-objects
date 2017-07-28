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

namespace Somnambulist\ValueObjects\Types\DateTime\Traits;

use DateTimeZone;
use Somnambulist\ValueObjects\Types\DateTime\DateTime;
use Somnambulist\ValueObjects\Types\DateTime\TimeZone;

/**
 * Trait Factory
 *
 * @package    Somnambulist\ValueObjects\Types\DateTime\Traits
 * @subpackage Somnambulist\ValueObjects\Types\DateTime\Traits\Factory
 */
trait Factory
{

    /**
     * @param null|string $tz
     *
     * @return DateTime
     */
    public static function now($tz = null)
    {
        return static::parse('now', TimeZone::create(($tz instanceof TimeZone ? (string)$tz : $tz)));
    }

    /**
     * Creates a DateTime instance from the time string and TimeZone
     *
     * @param string   $time Any valid datetime string that can be processed by date()
     * @param TimeZone $tz
     *
     * @return DateTime
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
    public static function create($year = null, $month = null, $day = null, $hour = null, $minute = null,
        $second = null, TimeZone $tz = null)
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
     * Create a Carbon instance from just a date. The time portion is set to now.
     *
     * @param int|null      $year
     * @param int|null      $month
     * @param int|null      $day
     * @param TimeZone|null $tz
     *
     * @return static
     */
    public static function createFromDate($year = null, $month = null, $day = null, $tz = null)
    {
        return static::create($year, $month, $day, null, null, null, $tz);
    }

    /**
     * Create a Carbon instance from just a time. The date portion is set to today.
     *
     * @param int|null      $hour
     * @param int|null      $minute
     * @param int|null      $second
     * @param TimeZone|null $tz
     *
     * @return static
     */
    public static function createFromTime($hour = null, $minute = null, $second = null, $tz = null)
    {
        return static::create(null, null, null, $hour, $minute, $second, $tz);
    }

    /**
     * @param string            $format
     * @param string            $time
     * @param null|DateTimeZone $object
     *
     * @return DateTime
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
}
