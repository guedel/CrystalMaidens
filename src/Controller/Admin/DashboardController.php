<?php declare(strict_types=1);

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
    User,
};
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Translation\TranslatableMessage;

#[
    AdminDashboard(
        routePath: "/{_locale<%app.supported_locales%>}/admin",
        routeName: "admin",
    ),
]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        return $this->redirectToRoute("admin_campagne_index");
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()->setTitle("Crystal Maidens");
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard(
            new TranslatableMessage("Dashboard"),
            "fa fa-home",
        );
        yield MenuItem::linktoRoute(
            new TranslatableMessage("Back to the website"),
            "fas fa-home",
            "homepage",
        );
        yield MenuItem::section(new TranslatableMessage("Repository"));
        yield MenuItem::linkTo(
            CampagneCrudController::class,
            new TranslatableMessage("Campaigns"),
            "fas fa-list",
        );
        yield MenuItem::linkTo(
            EtapeCrudController::class,
            new TranslatableMessage("Stages"),
            "fas fa-list",
        );
        yield MenuItem::linkTo(
            ClasseCrudController::class,
            new TranslatableMessage("Classes"),
            "fas fa-list",
        );
        yield MenuItem::linkTo(
            ElementCrudController::class,
            new TranslatableMessage("Elements"),
            "fas fa-list",
        );
        yield MenuItem::linkTo(
            EmplacementCrudController::class,
            new TranslatableMessage("Positions"),
            "fas fa-list",
        );
        yield MenuItem::linkTo(
            RareteCrudController::class,
            new TranslatableMessage("Rarity"),
            "fas fa-list",
        );
        yield MenuItem::linkTo(
            IngredientLevelCrudController::class,
            new TranslatableMessage("Ingredient Levels"),
            "fas fa-list",
        );
        yield MenuItem::section(new TranslatableMessage("Ingredients"));
        yield MenuItem::linkTo(
            Ingredients\IngredientCrudController::class,
            new TranslatableMessage("Ingredients"),
            "fas fa-list",
        );
        yield MenuItem::linkTo(
            Ingredients\BossIngredientCrudController::class,
            new TranslatableMessage("Boss Ingredients"),
            "fas fa-list",
        );
        yield MenuItem::linkTo(
            Ingredients\CrystalCrudController::class,
            new TranslatableMessage("Crystals"),
            "fas fa-list",
        );
        yield MenuItem::linkTo(
            Ingredients\MaidenCrudController::class,
            new TranslatableMessage("Maidens"),
            "fas fa-list",
        );
        yield MenuItem::linkTo(
            Ingredients\ItemCrudController::class,
            new TranslatableMessage("Gears"),
            "fas fa-list",
        );
        yield MenuItem::section("Users");
        yield MenuItem::linkTo(
            UserCrudController::class,
            new TranslatableMessage("Users"),
            "fas fa-list",
        );
    }
}
