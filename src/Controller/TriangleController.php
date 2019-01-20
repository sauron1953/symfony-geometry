<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Triangle;
use App\Service\PrepareShapeDataService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

final class TriangleController
{
    /**
     * @var PrepareShapeDataService
     */
    private $prepareShapeDataService;

    public function __construct(PrepareShapeDataService $prepareShapeDataService)
    {
        $this->prepareShapeDataService = $prepareShapeDataService;
    }

    /**
     * @Route("/triangle/{a}/{b}/{c}", name="triangle_show", methods={"GET"})
     */
    public function showAction(Request $request, float $a, float $b, float $c)
    {
        $triangle = new Triangle($a, $b, $c);

        return new JsonResponse($this->prepareShapeDataService->getShapeData($triangle));
    }
}
