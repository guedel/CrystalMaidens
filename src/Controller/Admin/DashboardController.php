<?php

namespace App\Controller\Admin;

use App\Entity\{
    BossIngredient,
    Campagne,
    Classe,
    Crystal,
    Element,
    Emplacement,
    Etape,
    Ingredient,
    IngredientLevel,
    Item,
    Maiden,
    Rarete,
    User
};
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\TranslatableMessage;

#[AdminDashboard(routePath:'/{_locale<%app.supported_locales%>}/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        /*
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(CampagneCrudController::class)->generateUrl();
        return $this->redirect($url);
        */
        return $this->redirectToRoute('admin_campagne_index');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Crystal Maidens');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard(new TranslatableMessage('Dashboard'), 'fa fa-home');
        yield MenuItem::linktoRoute(new TranslatableMessage('Back to the website'), 'fas fa-home', 'homepage');
        yield MenuItem::section(new TranslatableMessage('Repository'));
        yield MenuItem::linktoCrud(new TranslatableMessage('Campaigns'), 'fas fa-list', Campagne::class);
        yield MenuItem::linktoCrud(new TranslatableMessage('Stages'), 'fas fa-list', Etape::class);
        yield MenuItem::linktoCrud(new TranslatableMessage('Classes'), 'fas fa-list', Classe::class);
        yield MenuItem::linktoCrud(new TranslatableMessage('Elements'), 'fas fa-list', Element::class);
        yield MenuItem::linktoCrud(new TranslatableMessage('Positions'), 'fas fa-list', Emplacement::class);
        yield MenuItem::linktoCrud(new TranslatableMessage('Rarity'), 'fas fa-list', Rarete::class);
        yield MenuItem::linktoCrud(new TranslatableMessage('Ingredient Levels'), 'fas fa-list', IngredientLevel::class);
        yield MenuItem::section(new TranslatableMessage('Ingredients'));
        yield MenuItem::linktoCrud(new TranslatableMessage('Ingredients'), 'fas fa-list', Ingredient::class);
        yield MenuItem::linktoCrud(new TranslatableMessage('Boss Ingredients'), 'fas fa-list', BossIngredient::class);
        yield MenuItem::linktoCrud(new TranslatableMessage('Crystals'), 'fas fa-list', Crystal::class);
        yield MenuItem::linktoCrud(new TranslatableMessage('Maidens'), 'fas fa-list', Maiden::class);
        yield MenuItem::linktoCrud(new TranslatableMessage('Gears'), 'fas fa-list', Item::class);
        yield MenuItem::section('Users');
        yield MenuItem::linktoCrud('Users', 'fas fa-list', User::class);
    }
}
