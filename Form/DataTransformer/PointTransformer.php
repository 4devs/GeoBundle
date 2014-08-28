<?php

namespace FDevs\GeoBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;

class PointTransformer implements DataTransformerInterface
{
    /**
     * @inheritDoc
     */
    public function transform($value)
    {
        return $value;
    }

    /**
     * @inheritDoc
     */
    public function reverseTransform($value)
    {
        if (!array_filter($value->getCoordinates())) {
            $value = null;
        }

        return $value;
    }
}
