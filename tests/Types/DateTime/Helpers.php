<?php

namespace Somnambulist\Tests\ValueObjects\Types\DateTime;

use Somnambulist\ValueObjects\Types\DateTime\DateTime;

/**
 * Trait Helpers
 *
 * @package    Somnambulist\Tests\ValueObjects\Types\DateTime
 * @subpackage Somnambulist\Tests\ValueObjects\Types\DateTime\Helpers
 */
trait Helpers
{

    protected function setUp()
    {
        date_default_timezone_set('America/Toronto');
    }

    protected function assertDateTime(DateTime $d, $year, $month, $day, $hour = null, $minute = null, $second = null)
    {
        $actual   = [
            'years'  => $year,
            'months' => $month,
            'day'    => $day,
        ];
        $expected = [
            'years'  => $d->year(),
            'months' => $d->month(),
            'day'    => $d->day(),
        ];
        if ($hour !== null) {
            $expected['hours'] = $d->hour();
            $actual['hours']   = $hour;
        }
        if ($minute !== null) {
            $expected['minutes'] = $d->minute();
            $actual['minutes']   = $minute;
        }
        if ($second !== null) {
            $expected['seconds'] = $d->second();
            $actual['seconds']   = $second;
        }
        $this->assertSame($expected, $actual);
    }

    protected function assertInstanceOfDateTime($d)
    {
        $this->assertInstanceOf(DateTime::class, $d);
    }
}
