<?php

namespace App\Controller\Admin\Ingredients;

use App\Entity\Item;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\{
    AssociationField,
    TextField,
    TextareaField
};
use Symfony\Component\Translation\TranslatableMessage;

class ItemCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Item::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setPageTitle(Crud::PAGE_INDEX, new TranslatableMessage('List of gears'))
        ->setPageTitle(Crud::PAGE_NEW, new TranslatableMessage('Create gear'))
        ->setPageTitle(Crud::PAGE_EDIT, new TranslatableMessage('Edit gear'))
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('nom', new TranslatableMessage('Name'));
        if ($pageName == 'edit' || $pageName == 'new') {
            yield TextareaField::new('description', new TranslatableMessage('Description'));
        }
        yield AssociationField::new('classe', new TranslatableMessage('Class'));
        yield AssociationField::new('emplacement', new TranslatableMessage('Location'));
        yield AssociationField::new('maiden', new TranslatableMessage('Only for'));
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->update(
            Crud::PAGE_INDEX,
            Action::NEW,
            fn (Action $action) => $action->setLabel(new TranslatableMessage('Add gear'))
        )
        ;
    }
}
