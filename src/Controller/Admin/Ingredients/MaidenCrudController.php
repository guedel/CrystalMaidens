<?php

namespace App\Controller\Admin\Ingredients;

use App\Entity\Maiden;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\{
    AssociationField,
    TextField
};

class MaidenCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Maiden::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextField::new('nickname'),
            AssociationField::new('classe', 'Classe'),
            AssociationField::new('element', 'Elément'),
            AssociationField::new('rarity', 'Rareté'),
        ];
    }
}
