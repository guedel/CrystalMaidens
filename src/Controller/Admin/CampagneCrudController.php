<?php

namespace App\Controller\Admin;

use App\Entity\Campagne;
use App\Form\EtapeType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\{
    AssociationField,
    CollectionField,
    BooleanField,
    FormField,
    IdField,
    IntegerField,
    TextField
};

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

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            CollectionField::new('etapes')
                ->setEntryIsComplex(true)
                ->setEntryType(EtapeType::class)
                ,
        ];
    }
}
