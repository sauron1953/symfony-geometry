<?php

declare(strict_types=1);

namespace App\Model;

interface ShapeInterface
{
    public function getSurface(): float;

    public function getCircumference(): float;
}
