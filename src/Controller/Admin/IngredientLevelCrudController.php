<?php

namespace App\Controller\Admin;

use App\Entity\IngredientLevel;
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

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('nom'),
        ];
    }
}
