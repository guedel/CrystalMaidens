<?php

namespace App\Controller\Admin;

use App\Entity\IngredientLevel;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\{
    IdField,
    TextField
};
use Symfony\Component\Translation\TranslatableMessage;

class IngredientLevelCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return IngredientLevel::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'List of Ingredient Levels')
            ->setPageTitle(Crud::PAGE_NEW, 'Create ingredient level')
            ->setPageTitle(Crud::PAGE_EDIT, 'Edit Ingredient Level')
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
        fn (Action $action) => $action->setLabel(new TranslatableMessage('Add ingredient level')))
      ;
  }
}
