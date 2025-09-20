<?php declare(strict_types=1);

namespace App\Controller\Admin\Ingredients;

use App\Entity\Crystal;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\{
    AssociationField,
    TextField
};
use Symfony\Component\Translation\TranslatableMessage;

/**
 * @extends AbstractCrudController<Crystal>
 */
class CrystalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Crystal::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setPageTitle(Crud::PAGE_INDEX, new TranslatableMessage('List of crystals'))
        ->setPageTitle(Crud::PAGE_NEW, new TranslatableMessage('Create crystal'))
        ->setPageTitle(Crud::PAGE_EDIT, new TranslatableMessage('Edit crystal'))
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom', new TranslatableMessage('Name')),
            AssociationField::new('nature', new TranslatableMessage('Nature')),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->update(
            Crud::PAGE_INDEX,
            Action::NEW,
            fn (Action $action) => $action->setLabel(new TranslatableMessage('Add crystal'))
        )
        ;
    }
}
