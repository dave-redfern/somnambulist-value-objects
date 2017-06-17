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

namespace Somnambulist\ValueObjects\Types\Geography;

use Somnambulist\ValueObjects\AbstractValueObject;

/**
 * Class Country
 *
 * @package    Somnambulist\ValueObjects\Types\Geography
 * @subpackage Somnambulist\ValueObjects\Types\Geography\Country
 */
class Country extends AbstractValueObject
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var CountryCode
     */
    private $code;

    /**
     * Constructor.
     *
     * @param CountryCode $code
     */
    public function __construct(CountryCode $code)
    {
        $this->name = CountryCodeMappings::name($code);
        $this->code = $code;
    }

    /**
     * @param string|CountryCode $code
     *
     * @return static
     */
    public static function create($code)
    {
        return new static(CountryCode::memberByValue((string)$code));
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return (string)$this->name;
    }

    /**
     * @return CountryCode
     */
    public function code(): CountryCode
    {
        return $this->code;
    }
}
