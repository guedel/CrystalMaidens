<?php declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Emplacement;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Translation\TranslatableMessage;

/**
 * @extends AbstractCrudController<Emplacement>
 */
class EmplacementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Emplacement::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setPageTitle(Crud::PAGE_INDEX, new TranslatableMessage('List of positions'))
        ->setPageTitle(Crud::PAGE_NEW, new TranslatableMessage('Create position'))
        ->setPageTitle(Crud::PAGE_EDIT, new TranslatableMessage('Edit position'))
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        if ($pageName == Crud::PAGE_INDEX) {
            yield IdField::new('id', new TranslatableMessage('Identifier'));
        }
        yield TextField::new('nom', new TranslatableMessage('Name'));
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->update(
            Crud::PAGE_INDEX,
            Action::NEW,
            fn (Action $action) => $action->setLabel(new TranslatableMessage('Add position'))
        )
        ;
    }
}
