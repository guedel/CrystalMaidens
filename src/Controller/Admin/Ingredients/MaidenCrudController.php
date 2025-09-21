<?php declare(strict_types=1);

namespace App\Controller\Admin\Ingredients;

use App\Entity\Maiden;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\{
    AssociationField,
    TextField
};
use Symfony\Component\Translation\TranslatableMessage;

/**
 * @extends AbstractCrudController<Maiden>
 */
class MaidenCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Maiden::class;
    }

    public function configureFields(string $pageName): iterable
    {
        if ($pageName == Crud::PAGE_INDEX || $pageName == Crud::PAGE_NEW || $pageName == Crud::PAGE_EDIT) {
            return [
                TextField::new('nom', new TranslatableMessage('Name')),
                TextField::new('nickname', new TranslatableMessage('Nickname')),
                AssociationField::new('classe', new TranslatableMessage('Class')),
                AssociationField::new('element', new TranslatableMessage('Element')),
                AssociationField::new('rarity', new TranslatableMessage('Rarity')),
            ];
        }
        return parent::configureFields($pageName);
    }
}
