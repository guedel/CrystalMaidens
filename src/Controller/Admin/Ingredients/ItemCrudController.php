<?php

namespace App\Controller\Admin\Ingredients;

use App\Entity\Item;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\{
    AssociationField,
    TextField
};

class ItemCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Item::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            AssociationField::new('classe', 'Classe'),
            AssociationField::new('emplacement', 'Emplacement'),
            AssociationField::new('maiden', 'Uniquement pour'),
        ];
    }
}
