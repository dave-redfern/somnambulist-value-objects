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

use Assert\Assert;
use Somnambulist\ValueObjects\AbstractValueObject;

/**
 * Class TimeZone
 *
 * @package    Somnambulist\ValueObjects\Types\DateTime
 * @subpackage Somnambulist\ValueObjects\Types\DateTime\TimeZone
 */
class TimeZone extends AbstractValueObject
{

    /**
     * @var string
     */
    private $value;

    /**
     * Constructor.
     *
     * @param string $tz
     */
    public function __construct(string $tz)
    {
        Assert::that($tz, null, 'value')
            ->notEmpty()
            ->satisfy(function ($value) {
                return false !== @timezone_open($value);
            })
        ;

        $this->value = $tz;
    }

    /**
     * Creates a TimeZone instance using either the system default or supplied timezone
     *
     * @param null|string $tz
     *
     * @return static
     */
    public static function create($tz = null)
    {
        return new static($tz ?? date_default_timezone_get());
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->value;
    }

    /**
     * @return \DateTimeZone
     */
    public function toNative(): \DateTimeZone
    {
        return new \DateTimeZone($this->value);
    }
}
