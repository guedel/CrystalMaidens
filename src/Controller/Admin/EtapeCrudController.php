<?php

namespace App\Controller\Admin;

use App\Entity\Etape;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\{
    AssociationField,
    BooleanField,
    IntegerField,
    TextField
};

class EtapeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Etape::class;
    }

    /*
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('step')
        ;
    }
    */

    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('campagne', 'Campaign');
        yield IntegerField::new('numero', 'Number');
        yield BooleanField::new('boss');
        yield IntegerField::new('energie', 'Energy');
        yield IntegerField::new('experience');
        yield IntegerField::new('expMaiden', 'Maiden experience');
        yield IntegerField::new('coins');
    }
}
