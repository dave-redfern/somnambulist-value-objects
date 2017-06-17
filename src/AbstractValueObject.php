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

namespace Somnambulist\ValueObjects;

use Somnambulist\Collection\Collection;
use Somnambulist\ValueObjects\Contracts\ValueObjectInterface;

/**
 * Class AbstractValueObject
 *
 * @package    AppBundle\ValueObjects
 * @subpackage AppBundle\ValueObjects\AbstractValueObject
 */
abstract class AbstractValueObject implements ValueObjectInterface
{

    /**
     * @param string $name
     * @param mixed  $value
     */
    public function __set($name, $value)
    {
        // prevent arbitrary properties
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->toString();
    }

    /**
     * @param AbstractValueObject $object
     *
     * @return bool
     */
    public function equals($object): bool
    {
        if (get_class($this) === get_class($object)) {
            $props = Collection::collect((new \ReflectionObject($this))->getProperties());

            return $props
                ->filter(function ($prop) use ($object) {
                    /** @var \ReflectionProperty $prop */
                    $prop->setAccessible(true);

                    return (string)$prop->getValue($object) === (string)$prop->getValue($this);
                })
                ->count() === $props->count()
            ;
        }

        return false;
    }
}
