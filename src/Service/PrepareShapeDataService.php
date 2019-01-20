<?php

declare(strict_types=1);

namespace App\Service;

use App\Model\ShapeInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

final class PrepareShapeDataService
{
    /**
     * @var Serializer
     */
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function getShapeData(ShapeInterface $shape): array
    {
        $shapeData = $this->serializer->normalize($shape);

        $shapeData = array_map(function ($item) {
            if (gettype($item) === 'double') {
                return sprintf('%.2f', $item);
            }
            return $item;
        }, $shapeData);

        return $shapeData;
    }
}
