<?php

namespace App\Controller\Admin\Ingredients;

use App\Entity\BossIngredient;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\{
    AssociationField,
    BooleanField,
    IntegerField,
    TextField
};
use Symfony\Component\Translation\TranslatableMessage;

class BossIngredientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BossIngredient::class;
    }

  public function configureCrud(Crud $crud): Crud
  {
    return $crud
      ->setPageTitle(Crud::PAGE_INDEX, new TranslatableMessage('List of ingredients'))
      ->setPageTitle(Crud::PAGE_NEW, new TranslatableMessage('Create ingredient'))
      ->setPageTitle(Crud::PAGE_EDIT, new TranslatableMessage('Edit ingredient'))
      ;
  }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom', new TranslatableMessage('Name')),
            AssociationField::new('level', new TranslatableMessage('Ingredient level')),
        ];
    }

  public function configureActions(Actions $actions): Actions
  {
    return $actions
      ->update(
        Crud::PAGE_INDEX,
        Action::NEW,
        fn (Action $action) => $action->setLabel(new TranslatableMessage('Add ingredient')))
      ;
  }

}
