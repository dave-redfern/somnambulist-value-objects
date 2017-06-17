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

use Somnambulist\ValueObjects\AbstractEnumeration;

/**
 * Class Srid
 *
 * Represents a Spatial Reference System Identifier - a unique value for a spatial reference system.
 * For example: WGS84 has a SRID of 4326; BNG has a SRID of 27700.
 *
 * @package    Somnambulist\ValueObjects\Types\Geography
 * @subpackage Somnambulist\ValueObjects\Types\Geography\Srid
 *
 * @method static Srid BRITISH_NATIONAL_GRID()
 * @method static Srid OSGB1936()
 * @method static Srid WGS84()
 */
class Srid extends AbstractEnumeration
{

    const BRITISH_NATIONAL_GRID = 27700;
    const OSGB1936              = 27700;
    const WGS84                 = 4326;

}
