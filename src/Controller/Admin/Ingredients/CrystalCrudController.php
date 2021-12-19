<?php

namespace App\Controller\Admin\Ingredients;

use App\Entity\Crystal;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\{
    AssociationField,
    TextField
};


class CrystalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Crystal::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            AssociationField::new('nature', 'Nature'),
        ];
    }
}
