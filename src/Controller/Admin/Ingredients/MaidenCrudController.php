<?php declare(strict_types=1);

namespace App\Controller\Admin\Ingredients;

use App\Entity\Maiden;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\{
    AssociationField,
    TextField
};
use Symfony\Component\Translation\TranslatableMessage;

class MaidenCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Maiden::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom', new TranslatableMessage('Name')),
            TextField::new('nickname', new TranslatableMessage('Nickname')),
            AssociationField::new('classe', new TranslatableMessage('Class')),
            AssociationField::new('element', new TranslatableMessage('Element')),
            AssociationField::new('rarity', new TranslatableMessage('Rarity')),
        ];
    }
}
