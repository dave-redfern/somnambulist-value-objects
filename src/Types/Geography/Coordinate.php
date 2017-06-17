<?php

namespace Somnambulist\ValueObjects\Types\Geography;

use Assert\Assert;
use Somnambulist\ValueObjects\AbstractValueObject;

/**
 * Class Coordinate
 *
 * Represents a latitude and longitude within a geo-spatial system.
 *
 * @package    Somnambulist\ValueObjects\Types\Geography
 * @subpackage Somnambulist\ValueObjects\Types\Geography\Coordinate
 */
class Coordinate extends AbstractValueObject
{

    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;

    /**
     * @var Srid
     */
    private $srid;

    /**
     * Constructor.
     *
     * @param float $latitude
     * @param float $longitude
     * @param Srid  $srid
     */
    public function __construct(float $latitude, float $longitude, Srid $srid)
    {
        Assert::lazy()->tryAll()
            ->that($latitude, 'latitude')->range(-90, 90)
            ->that($longitude, 'longitude')->range(-180, 180)
            ->verifyNow()
        ;

        $this->latitude  = $latitude;
        $this->longitude = $longitude;
        $this->srid      = $srid;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return sprintf('[%s, %s]', $this->longitude, $this->latitude);
    }

    /**
     * @return string
     */
    public function toGeoJson()
    {
        return json_encode([
            'type'        => 'Point',
            'coordinates' => [
                $this->longitude, $this->latitude,
            ],
            'crs'         => [
                'type'       => 'name',
                'properties' => [
                    'name' => 'EPSG:' . $this->srid(),
                ],
            ],
        ]);
    }

    /**
     * @return float
     */
    public function latitude(): float
    {
        return $this->latitude;
    }

    /**
     * @return float
     */
    public function longitude(): float
    {
        return $this->longitude;
    }

    /**
     * @return Srid
     */
    public function srid(): Srid
    {
        return $this->srid;
    }
}
