<?php

namespace App\Controller\Admin;

use App\Entity\Campagne;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class CampagneCrudController extends AbstractCrudController
{
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Campagnes')
            ->setPageTitle('new', 'Nouvelle campagne')
        ;
    }

    public static function getEntityFqcn(): string
    {
        return Campagne::class;
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
