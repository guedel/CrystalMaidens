<?php

namespace App\Controller\Admin;

use App\Entity\Element;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ElementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Element::class;
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
