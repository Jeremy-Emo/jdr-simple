<?php

declare(strict_types=1);

namespace App\Controller\Api\Groupe;

use App\Entity\Joueur;
use App\Entity\Map;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: MovePlayerController::ROUTE_PATH, name: MovePlayerController::ROUTE_NAME, methods: [Request::METHOD_POST])]
class MovePlayerController extends AbstractController
{
    public const ROUTE_NAME = 'api_post_player_move_map';
    public const ROUTE_PATH = '/api/player/{joueur}/move/{map}';

    public function __invoke(Joueur $joueur, Map $map, EntityManagerInterface $entityManager): JsonResponse
    {
        $joueur->setPosition($map);
        $entityManager->persist($joueur);

        return new JsonResponse([], 200);
    }
}
