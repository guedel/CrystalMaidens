<?php

namespace App\Controller\Admin\Ingredients;

use App\Entity\BossIngredient;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\{
    AssociationField,
    BooleanField,
    IntegerField,
    TextField
};

class BossIngredientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BossIngredient::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            AssociationField::new('level', 'Niveau d\'ingrédient'),
        ];
    }
}
