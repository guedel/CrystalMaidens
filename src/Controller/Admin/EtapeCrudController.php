<?php

namespace App\Controller\Admin;

use App\Entity\Etape;
use App\Form\EtapeFragmentSubType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\{
    AssociationField,
    BooleanField,
    CollectionField,
    FormField,
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
        yield FormField::addTab('Main');
        yield AssociationField::new('campagne', 'Campaign');
        yield IntegerField::new('numero', 'Number')->setColumns(3);
        yield BooleanField::new('boss');
        yield IntegerField::new('energie', 'Energy')->setColumns(3);
        yield IntegerField::new('coins');
        yield IntegerField::new('experience')->setColumns(3);
        yield IntegerField::new('expMaiden', 'Maiden experience');
        yield FormField::addTab('Loot');
        yield FormField::addPanel('Gacha Orbs');
        yield IntegerField::new('minGachaOrbs', 'minimum' )->setColumns(3);
        yield IntegerField::new('maxGachaOrbs', 'maximum');
        yield FormField::addPanel('Shards');
        yield CollectionField::new('etapeFragments', 'Maiden shard')
            ->setEntryIsComplex(true)
            ->setEntryType(EtapeFragmentSubType::class)
        ;
        yield FormField::addPanel('Item');
        yield FormField::addPanel('Crystals');
    }
}
