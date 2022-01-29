<?php

namespace App\Controller\Admin\Ingredients;

use App\Entity\Item;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\{
    AssociationField,
    TextField,
    TextareaField
};

class ItemCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Item::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('nom');
        if ($pageName == 'edit' || $pageName == 'new') {
            yield TextareaField::new('description');

        }
        yield AssociationField::new('classe', 'Classe');
        yield AssociationField::new('emplacement', 'Emplacement');
        yield AssociationField::new('maiden', 'Uniquement pour');
    }
}
