<?php

namespace App\Controller\Admin;

use App\Entity\{
    Campagne, 
    Classe, 
    Element, 
    Emplacement, 
    Etape, 
    Ingredient, 
    Rarete, 
    Taux
};
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(CampagneCrudController::class)->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Crystal Maidens');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'homepage');
        // yield MenuItem::linktoCrud('Campagne', 'fas fa-map-marker-alt', Campagne::class);
        yield MenuItem::section('Référentiel');
        yield MenuItem::linktoCrud('Campagnes', 'fas fa-list', Campagne::class);
        yield MenuItem::linktoCrud('Etapes', 'fas fa-list', Etape::class);
        yield MenuItem::linktoCrud('Classes', 'fas fa-list', Classe::class);
        yield MenuItem::linktoCrud('Elements', 'fas fa-list', Element::class);
        yield MenuItem::linktoCrud('Emplacements', 'fas fa-list', Emplacement::class);
        yield MenuItem::linktoCrud('Raretés', 'fas fa-list', Rarete::class);
        yield MenuItem::linktoCrud('Taux', 'fas fa-list', Taux::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::section('Utilisateur');
    }
}
