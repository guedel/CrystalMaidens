<?php declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Rarete;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RareteFixtures extends Fixture
{
    private static array $raretes = [
        'common',
        'rare',
        'epic',
        'legendary',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::$raretes as $rarete) {
            $entity = $manager->getRepository(rarete::class)->findOneBy(['nom' => $rarete]);
            if (! $entity instanceof Rarete) {
                $entity = (new Rarete())
                    ->setNom($rarete);
                $manager->persist($entity);
            }
        }
        $manager->flush();
    }
}
