<?php

declare(strict_types=1);

namespace App\Controller;

use App\Security\AppAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

#[Route(path: LoginController::ROUTE_PATH, name: LoginController::ROUTE_NAME, methods: [Request::METHOD_GET, Request::METHOD_POST])]
class LoginController extends AbstractController
{
    public const ROUTE_NAME = 'app_login';
    public const ROUTE_PATH = '/login';

    public function __invoke(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute(HomeController::ROUTE_NAME);
        }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('@EasyAdmin/page/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,

            'csrf_token_intention' => 'authenticate',
            'target_path' => $this->generateUrl(HomeController::ROUTE_NAME),
            'username_label' => 'Utilisateur',
            'password_label' => 'Mot de passe',
            'sign_in_label' => 'Se connecter',
            'username_parameter' => AppAuthenticator::IDENTIFIER_KEY,
            'password_parameter' => AppAuthenticator::PASSWORD_KEY,
        ]);
    }
}
