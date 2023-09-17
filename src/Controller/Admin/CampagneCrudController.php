<?php

  namespace App\Controller\Admin;

  use App\Entity\Campagne;
  use App\Form\EtapeType;
  use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
  use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
  use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
  use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
  use EasyCorp\Bundle\EasyAdminBundle\Field\{
    CollectionField,
    IdField,
  };
  use Symfony\Component\Translation\TranslatableMessage;

  class CampagneCrudController extends AbstractCrudController
  {
    public function configureCrud(Crud $crud): Crud
    {
      return $crud
        ->setPageTitle(Crud::PAGE_INDEX, new TranslatableMessage('List of campaigns'))
        ->setPageTitle(Crud::PAGE_NEW, new TranslatableMessage('Create campaign'))
        ->setPageTitle(Crud::PAGE_EDIT, new TranslatableMessage('Edit campaign'));
    }

    public static function getEntityFqcn(): string
    {
      return Campagne::class;
    }

    public function configureFields(string $pageName): iterable
    {
      $fields = [];
      if ($pageName == Crud::PAGE_INDEX) {
        $fields[] =  IdField::new('id');
      }

      $fields[] =
        CollectionField::new('etapes', new TranslatableMessage('stages'))
          ->setEntryIsComplex(true)
          ->setEntryType(EtapeType::class)
        ;
      return $fields;
    }

    public function configureActions(Actions $actions): Actions
    {
      return $actions
        ->update(
          Crud::PAGE_INDEX,
          Action::NEW,
          fn (Action $action) => $action->setLabel(new TranslatableMessage('Add campaign')))
        ;
    }

  }
