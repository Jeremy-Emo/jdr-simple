<?php

declare(strict_types=1);

namespace App\Controller\Api\Aventure;

use App\Entity\Aventure;
use App\Mapper\AventureMapper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: GetAventureController::ROUTE_PATH, name: GetAventureController::ROUTE_NAME, methods: [Request::METHOD_GET])]
class GetAventureController extends AbstractController
{
    public const ROUTE_NAME = 'api_aventure_get_id';
    public const ROUTE_PATH = '/api/aventure/{aventure}';

    public function __invoke(Aventure $aventure, AventureMapper $mapper): \App\Dto\Aventure
    {
        return $mapper->map($aventure);
    }
}
