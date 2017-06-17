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

namespace Somnambulist\ValueObjects\Types\Web;

use Assert\Assert;
use Somnambulist\ValueObjects\AbstractValueObject;

/**
 * Class Url
 *
 * @package    Somnambulist\ValueObjects\Types\Web
 * @subpackage Somnambulist\ValueObjects\Types\Web\Url
 */
class Url extends AbstractValueObject
{

    /**
     * @var string
     */
    private $value;

    /**
     * Constructor.
     *
     * @param string $url
     */
    public function __construct($url)
    {
        Assert::that($url, null, 'url')->notEmpty()->url();

        $this->value = $url;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return (string)$this->value;
    }

    /**
     * @return string
     */
    public function scheme(): string
    {
        return $this->parseString(PHP_URL_SCHEME);
    }

    /**
     * @return string
     */
    public function host(): string
    {
        return $this->parseString(PHP_URL_HOST);
    }

    /**
     * @return string
     */
    public function port(): string
    {
        return $this->parseString(PHP_URL_PORT);
    }

    /**
     * @return string
     */
    public function user(): string
    {
        return $this->parseString(PHP_URL_USER);
    }

    /**
     * @return string
     */
    public function password(): string
    {
        return $this->parseString(PHP_URL_PASS);
    }

    /**
     * @return string
     */
    public function path(): string
    {
        return $this->parseString(PHP_URL_PATH);
    }

    /**
     * @return string
     */
    public function query(): string
    {
        return $this->parseString(PHP_URL_QUERY);
    }

    /**
     * @return string
     */
    public function fragment(): string
    {
        return $this->parseString(PHP_URL_FRAGMENT);
    }

    /**
     * @param int $component PHP_URL_* constant
     *
     * @return string
     */
    private function parseString($component): string
    {
        return (string)parse_url($this->value, $component);
    }
}
