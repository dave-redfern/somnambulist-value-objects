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

use Assert\Assert;
use Somnambulist\ValueObjects\AbstractValueObject;

/**
 * Class EmailAddress
 *
 * @package    Somnambulist\ValueObjects\Types\Identity
 * @subpackage Somnambulist\ValueObjects\Types\Identity\EmailAddress
 */
class EmailAddress extends AbstractValueObject
{

    /**
     * @var string
     */
    private $email;

    /**
     * Constructor.
     *
     * @param string $email
     */
    public function __construct(string $email)
    {
        Assert::that($email, null, 'email')->notEmpty()->email()->maxLength(60);

        $this->email = $email;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return (string)$this->email;
    }

    /**
     * @return string
     */
    public function account(): string
    {
        return mb_substr($this->email, 0, mb_strpos($this->email, '@'));
    }

    /**
     * @return string
     */
    public function domain(): string
    {
        return mb_substr($this->email, mb_strpos($this->email, '@')+1);
    }
}
