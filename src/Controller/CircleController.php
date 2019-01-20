<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Circle;
use App\Service\PrepareShapeDataService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

final class CircleController
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
     * @Route("/circle/{radius}", name="circle_show", methods={"GET"})
     */
    public function showAction(Request $request, float $radius)
    {
        $circle = new Circle($radius);

        return new JsonResponse($this->prepareShapeDataService->getShapeData($circle));
    }
}
