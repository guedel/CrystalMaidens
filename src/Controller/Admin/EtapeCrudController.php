<?php

namespace App\Controller\Admin;

use App\Entity\Etape;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use App\Form\{
    EtapeAdversaireSubType,
    EtapeCrystalSubType,
    EtapeFragmentSubType,
    EtapeItemSubType
};
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\{AssociationField,
  BooleanField,
  CollectionField,
  FormField,
  IdField,
  IntegerField,
  TextField};
use Symfony\Component\Translation\TranslatableMessage;

class EtapeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Etape::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setPageTitle(Crud::PAGE_INDEX, new TranslatableMessage('List of stages'))
        ->setPageTitle(Crud::PAGE_NEW, new TranslatableMessage('Add stage'))
        ->setPageTitle(Crud::PAGE_EDIT, new TranslatableMessage('Edit stage'))
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab(new TranslatableMessage('Main'));
        yield AssociationField::new('campagne', new TranslatableMessage('Campaign'));
        yield IntegerField::new('numero', new TranslatableMessage('Number'))->setColumns(3);
        yield BooleanField::new('boss', new TranslatableMessage('Boss'));
        yield IntegerField::new('energie', new TranslatableMessage('Energy'))->setColumns(3);
        yield IntegerField::new('coins', new TranslatableMessage('Coins'));
        yield IntegerField::new('experience', new TranslatableMessage('Experience'))->setColumns(3);
        yield IntegerField::new('expMaiden', new TranslatableMessage('Maiden experience'));
        yield FormField::addTab(new TranslatableMessage('Loot'));
        yield FormField::addPanel(new TranslatableMessage('Gacha Orbs'));
        yield IntegerField::new('minGachaOrbs', new TranslatableMessage('minimum'))->setColumns(3);
        yield IntegerField::new('maxGachaOrbs', new TranslatableMessage('maximum'));
        yield FormField::addPanel(new TranslatableMessage('Shards'));
        yield CollectionField::new('etapeFragments', new TranslatableMessage('Maiden shard'))
            ->setEntryIsComplex(true)
            ->setEntryType(EtapeFragmentSubType::class)
            ->hideOnIndex()
        ;
        yield FormField::addPanel(new TranslatableMessage('Item'));
        yield CollectionField::new('etapeItems', new TranslatableMessage('Items'))
            ->setEntryIsComplex(true)
            ->setEntryType(EtapeItemSubType::class)
            ->hideOnIndex()
        ;

        yield FormField::addPanel(new TranslatableMessage('Crystals'));
        yield CollectionField::new('etapeCrystals', new TranslatableMessage('Crystals'))
            ->setEntryIsComplex(true)
            ->setEntryType(EtapeCrystalSubType::class)
            ->hideOnIndex()
        ;
        yield FormField::addTab(new TranslatableMessage('Adversaries'));
        yield CollectionField::new('etapeAdversaires', new TranslatableMessage('Adversaries'))
            ->setEntryIsComplex(true)
            ->setEntryType(EtapeAdversaireSubType::class)
            ->hideOnIndex()
        ;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->update(
            Crud::PAGE_INDEX,
            Action::NEW,
            fn (Action $action) => $action->setLabel(new TranslatableMessage('Add stage'))
        )
        ;
    }
}
