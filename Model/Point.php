<?php

namespace FDevs\GeoBundle\Model;

use GeoJson\Geometry\Point as BasePoint;

class Point extends BasePoint
{
    /**
     * init
     *
     * @param array $position
     */
    public function __construct(array $position = [])
    {
        if (count($position)) {
            parent::__construct($position);
        }
    }

    /**
     * set Coordinates
     *
     * @param array $coordinates
     *
     * @return $this
     */
    public function setCoordinates(array $coordinates)
    {
        $this->coordinates = $coordinates;

        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}
