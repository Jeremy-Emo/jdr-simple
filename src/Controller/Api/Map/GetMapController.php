<?php

declare(strict_types=1);

namespace App\Controller\Api\Map;

use App\Dto\Map as MapDto;
use App\Entity\Map;
use App\Mapper\MapMapper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: GetMapController::ROUTE_PATH, name: GetMapController::ROUTE_NAME, methods: [Request::METHOD_GET])]
class GetMapController extends AbstractController
{
    public const ROUTE_NAME = 'api_map_get_id';
    public const ROUTE_PATH = '/api/map/{map}';

    public function __invoke(Map $map, MapMapper $mapper): MapDto
    {
        return $mapper->map($map);
    }
}
