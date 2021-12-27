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
        ;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->remove(Crud::PAGE_INDEX, Action::NEW);
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [
            TextField::new('nom', 'Name'),
        ];
        if ($pageName == 'index') {
            $fields[] = TextField::new('ingredientType');
        }
        if ($pageName == 'new'  || $pageName == 'edit') {
            $fields[] = CollectionField::new('ingredients')
                ->setEntryIsComplex(true)
                ->setEntryType(ConstituantSubType::class)
            ;

        }
        return $fields;
    }
}
