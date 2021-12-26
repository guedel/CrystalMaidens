<?php

namespace App\Controller\Admin;

use App\Entity\IngredientLevel;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\{
    IdField,
    TextField
};

class IngredientLevelCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return IngredientLevel::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'List of Ingredient Levels')
            ->setPageTitle(Crud::PAGE_NEW, 'New Ingredient Level')
            ->setPageTitle(Crud::PAGE_EDIT, 'Edit Ingredient Level')
        ;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('nom'),
        ];
    }
}
