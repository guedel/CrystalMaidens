<?php

namespace App\Controller\Admin;

use App\Entity\Taux;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TauxCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Taux::class;
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
