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

use Somnambulist\ValueObjects\Types\DateTime\DateTime;

/**
 * Trait Modifiers
 *
 * @package    Somnambulist\ValueObjects\Types\DateTime\Traits
 * @subpackage Somnambulist\ValueObjects\Types\DateTime\Traits\Modifiers
 */
trait Modifiers
{

    /**
     * @param integer $num
     *
     * @return DateTime
     */
    public function addDays($num)
    {
        return $this->modify(sprintf('%d day', $num));
    }

    /**
     * @param integer $num
     *
     * @return DateTime
     */
    public function subDays($num)
    {
        return $this->addDays(-1 * $num);
    }

    /**
     * @param integer $num
     *
     * @return DateTime
     */
    public function addWeeks($num)
    {
        return $this->modify(sprintf('%d week', $num));
    }

    /**
     * @param integer $num
     *
     * @return DateTime
     */
    public function subWeeks($num)
    {
        return $this->addWeeks(-1 * $num);
    }

    /**
     * @param integer $num
     *
     * @return DateTime
     */
    public function addMonths($num)
    {
        return $this->modify(sprintf('%d month', $num));
    }

    /**
     * @param integer $num
     *
     * @return DateTime
     */
    public function subMonths($num)
    {
        return $this->addMonths(-1 * $num);
    }

    /**
     * @param integer $num
     *
     * @return DateTime
     */
    public function addYears($num)
    {
        return $this->modify(sprintf('%d year', $num));
    }

    /**
     * @param integer $num
     *
     * @return DateTime
     */
    public function subYears($num)
    {
        return $this->addYears(-1 * $num);
    }

    /**
     * @param integer $num
     *
     * @return DateTime
     */
    public function addSeconds($num)
    {
        return $this->modify(sprintf('%d second', $num));
    }

    /**
     * @param integer $num
     *
     * @return DateTime
     */
    public function subSeconds($num)
    {
        return $this->addSeconds(-1 * $num);
    }

    /**
     * @param integer $num
     *
     * @return DateTime
     */
    public function addMinutes($num)
    {
        return $this->modify(sprintf('%d minute', $num));
    }

    /**
     * @param integer $num
     *
     * @return DateTime
     */
    public function subMinutes($num)
    {
        return $this->addMinutes(-1 * $num);
    }

    /**
     * @param integer $num
     *
     * @return DateTime
     */
    public function addHours($num)
    {
        return $this->modify(sprintf('%d hour', $num));
    }

    /**
     * @param integer $num
     *
     * @return DateTime
     */
    public function subHours($num)
    {
        return $this->addHours(-1 * $num);
    }
}
