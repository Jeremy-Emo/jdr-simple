<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: HomeController::ROUTE_PATH, name: HomeController::ROUTE_NAME, methods: [Request::METHOD_GET])]
class HomeController extends AbstractController
{
    public const ROUTE_NAME = 'app_index';
    public const ROUTE_PATH = '/';

    public function __invoke(): Response
    {
        return $this->render('home/index.html.twig');
    }
}
