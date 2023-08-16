<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: LogoutController::ROUTE_PATH, name: LogoutController::ROUTE_NAME, methods: [Request::METHOD_GET])]
class LogoutController extends AbstractController
{
    public const ROUTE_NAME = 'app_logout';
    public const ROUTE_PATH = '/logout';

    public function __invoke(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
