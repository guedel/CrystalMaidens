<?php

namespace App\Controller\Admin\Ingredients;

use App\Entity\Maiden;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MaidenCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Maiden::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
