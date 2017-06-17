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

namespace Somnambulist\ValueObjects\Types\Auth;

use Assert\Assert;
use Somnambulist\ValueObjects\AbstractValueObject;

/**
 * Class PublicPrivateKey
 *
 * @package    Somnambulist\ValueObjects\Types\Auth
 * @subpackage Somnambulist\ValueObjects\Types\Auth\PublicPrivateKey
 */
class PublicPrivateKey extends AbstractValueObject
{

    /**
     * @var string
     */
    private $publicKey;

    /**
     * @var string
     */
    private $privateKey;

    /**
     * Constructor.
     *
     * @param string $publicKey
     * @param string $privateKey
     */
    public function __construct(string $publicKey, string $privateKey)
    {
        Assert::lazy()->tryAll()
            ->that($publicKey, 'publicKey')->notEmpty()->maxLength(64)
            ->that($privateKey, 'privateKey')->notEmpty()->maxLength(255)
            ->verifyNow()
        ;

        $this->publicKey  = $publicKey;
        $this->privateKey = $privateKey;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->publicKey;
    }

    /**
     * @return string
     */
    public function publicKey(): string
    {
        return $this->publicKey;
    }

    /**
     * @return string
     */
    public function privateKey(): string
    {
        return $this->privateKey;
    }
}
