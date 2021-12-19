<?php

namespace App\Controller\Admin;

use App\Entity\Rarete;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RareteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Rarete::class;
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
