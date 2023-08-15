<?php

namespace App\Controller\Admin;

use App\Entity\Aventure;
use App\Entity\Groupe;
use App\Entity\Joueur;
use App\Entity\Map;
use App\Entity\Path;
use App\Entity\Personnage;
use App\Entity\Skill;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public const ROUTE_PATH_INDEX = '/admin';
    public const ROUTE_NAME_INDEX = 'admin';

    #[Route(self::ROUTE_PATH_INDEX, name: self::ROUTE_NAME_INDEX)]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()->setTitle('Administration');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Groupe de jeu');
        yield MenuItem::linkToCrud('Groupes', 'fas fa-list', Groupe::class);
        yield MenuItem::linkToCrud('Joueurs', 'fas fa-list', Joueur::class);
        yield MenuItem::section('Données');
        yield MenuItem::linkToCrud('Aventures', 'fas fa-list', Aventure::class);
        yield MenuItem::linkToCrud('Cartes', 'fas fa-list', Map::class);
        yield MenuItem::linkToCrud('Chemins', 'fas fa-list', Path::class);
        yield MenuItem::linkToCrud('Personnages', 'fas fa-list', Personnage::class);
        yield MenuItem::linkToCrud('Compétences', 'fas fa-list', Skill::class);
    }
}
