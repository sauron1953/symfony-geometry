<?php

declare(strict_types=1);

namespace App\Service;

use App\Model\ShapeInterface;

final class GeometryCalculator
{
    public function sumSurfaces(ShapeInterface $firstShape, ShapeInterface $secondShape): float
    {
        return $firstShape->getSurface() + $secondShape->getSurface();
    }

    public function sumCircumferences(ShapeInterface $firstShape, ShapeInterface $secondShape): float
    {
        return $firstShape->getCircumference() + $secondShape->getCircumference();
    }
}
