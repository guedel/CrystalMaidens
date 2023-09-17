<?php

namespace App\Controller\Admin;

use App\Entity\Element;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\Translation\TranslatableMessage;
use EasyCorp\Bundle\EasyAdminBundle\Field\{
  IdField,
  TextField
};

class ElementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Element::class;
    }

  public function configureCrud(Crud $crud): Crud
  {
    return $crud
      ->setPageTitle(Crud::PAGE_INDEX, new TranslatableMessage('List of elements'))
      ->setPageTitle(Crud::PAGE_NEW, new TranslatableMessage('Create element'))
      ->setPageTitle(Crud::PAGE_EDIT, new TranslatableMessage('Edit element'))
      ;
  }

    public function configureFields(string $pageName): iterable
    {
      if ($pageName == Crud::PAGE_INDEX) {
        yield IdField::new('id', new TranslatableMessage('Identifier'));
      }
      yield TextField::new('nom', new TranslatableMessage('Name'));
    }

    public function configureActions(Actions $actions): Actions
    {
      return $actions
        ->update(
          Crud::PAGE_INDEX,
          Action::NEW,
          fn (Action $action) => $action->setLabel(new TranslatableMessage('Add element')))
      ;
    }
}
