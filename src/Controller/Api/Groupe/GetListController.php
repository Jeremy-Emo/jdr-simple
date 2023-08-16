<?php

declare(strict_types=1);

namespace App\Controller\Api\Groupe;

use App\Controller\Mapper\GroupeMapper;
use App\Repository\GroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: GetListController::ROUTE_PATH, name: GetListController::ROUTE_NAME, methods: [Request::METHOD_GET])]
class GetListController extends AbstractController
{
    public const ROUTE_NAME = 'api_groupe_get_list';
    public const ROUTE_PATH = '/api/groupes';

    public function __invoke(GroupeRepository $repository, GroupeMapper $mapper): ArrayCollection
    {
        $groupes = $repository->findAllForHome();

        $response = new ArrayCollection();
        foreach ($groupes as $groupe) {
            $response->add($mapper->map($groupe));
        }

        return $response;
    }
}
