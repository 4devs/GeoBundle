<?php

namespace FDevs\GeoBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;

class CoordinatesTransformer implements DataTransformerInterface
{
    /**
     * @inheritDoc
     */
    public function transform($value)
    {
        if (is_array($value)) {
            $value = ['lat' => $value[0], 'lng' => $value[1]];
        }

        return $value;
    }

    /**
     * @inheritDoc
     */
    public function reverseTransform($value)
    {
        return array_values($value);
    }
}
