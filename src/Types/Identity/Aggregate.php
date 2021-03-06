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

namespace Somnambulist\ValueObjects\Types\Identity;

use Somnambulist\ValueObjects\AbstractValueObject;

/**
 * Class Aggregate
 *
 * @package    Somnambulist\ValueObjects\Types\Identity
 * @subpackage Somnambulist\ValueObjects\Types\Identity\Aggregate
 */
class Aggregate extends AbstractValueObject
{

    /**
     * @var string
     */
    private $class;

    /**
     * @var string
     */
    private $identity;

    /**
     * Constructor.
     *
     * @param string $class
     * @param string $identity A type supporting casting to a string
     */
    public function __construct(string $class, $identity)
    {
        $this->class    = $class;
        $this->identity = $identity;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return sprintf('%s:%s', $this->class, $this->identity);
    }

    /**
     * @return string
     */
    public function class(): string
    {
        return $this->class;
    }

    /**
     * @return string
     */
    public function identity()
    {
        return (string)$this->identity;
    }
}
