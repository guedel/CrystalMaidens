<?php

namespace App\Controller\Admin\Ingredients;

use App\Entity\Ingredient;
use App\Form\ConstituantSubType;
use EasyCorp\Bundle\EasyAdminBundle\Config\{
    Action,
    Actions,
    Crud
};
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\{
    AssociationField,
    CollectionField,
    FormField,
    TextField,
    UrlField
};
use Symfony\Component\Translation\TranslatableMessage;

class IngredientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ingredient::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['nom' => 'ASC'])
          ->setPageTitle(Crud::PAGE_INDEX, new TranslatableMessage('List of ingredients'))
          ->setPageTitle(Crud::PAGE_NEW, new TranslatableMessage('Create ingredient'))
          ->setPageTitle(Crud::PAGE_EDIT, new TranslatableMessage('Edit ingredient'))
        ;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
          ->remove(Crud::PAGE_INDEX, Action::NEW);
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [
            TextField::new('nom', new TranslatableMessage('Name')),
        ];
        if ($pageName == 'index') {
            $fields[] = TextField::new('ingredientType', new TranslatableMessage('Kind of ingredient'));
        }
        if ($pageName == 'new'  || $pageName == 'edit') {
            $fields[] = CollectionField::new('constituants', new TranslatableMessage('components'))
                ->setEntryIsComplex(true)
                ->setEntryType(ConstituantSubType::class)
            ;

        }
        return $fields;
    }
}
