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

namespace Somnambulist\ValueObjects\Types\Measure;

use Somnambulist\ValueObjects\AbstractEnumeration;

/**
 * Class DistanceUnit
 *
 * @package    Somnambulist\ValueObjects\Types\Measure
 * @subpackage Somnambulist\ValueObjects\Types\Measure\DistanceUnit
 *
 * @method static DistanceUnit FEET()
 * @method static DistanceUnit KM()
 * @method static DistanceUnit METRE()
 * @method static DistanceUnit MILE()
 * @method static DistanceUnit YARD()
 */
class DistanceUnit extends AbstractEnumeration
{

    const FEET  = 'ft';
    const KM    = 'km';
    const METRE = 'm';
    const MILE  = 'mi';
    const YARD  = 'yd';
}
