<?php

declare(strict_types=1);

namespace App\Model;

use InvalidArgumentException;

final class Triangle implements ShapeInterface
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var float
     */
    private $a;

    /**
     * @var float
     */
    private $b;

    /**
     * @var float
     */
    private $c;

    public function __construct(float $a, float $b, float $c)
    {
        if ($a + $b <= $c || $a + $c <= $b || $b + $c <= $a) {
            throw new InvalidArgumentException('The length of any side must be less than the sum of the other two sides');
        }

        $this->type = 'triangle';
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getA(): float
    {
        return $this->a;
    }

    public function getB(): float
    {
        return $this->b;
    }

    public function getC(): float
    {
        return $this->c;
    }

    public function getSurface(): float
    {
        // https://en.wikipedia.org/wiki/Heron%27s_formula
        $s = $this->getCircumference() / 2;
        return sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
    }

    public function getCircumference(): float
    {
        return $this->a + $this->b + $this->c;
    }
}
