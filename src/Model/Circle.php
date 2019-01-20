<?php

declare(strict_types=1);

namespace App\Model;

use InvalidArgumentException;

final class Circle implements ShapeInterface
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var float
     */
    private $radius;

    public function __construct(float $radius)
    {
        if ($radius <= 0) {
            throw new InvalidArgumentException('Radius must be greater than zero');
        }

        $this->type = 'circle';
        $this->radius = $radius;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getRadius(): float
    {
        return $this->radius;
    }

    public function getSurface(): float
    {
        return M_PI * pow($this->radius, 2);
    }

    public function getCircumference(): float
    {
        return 2 * M_PI * $this->radius;
    }
}
