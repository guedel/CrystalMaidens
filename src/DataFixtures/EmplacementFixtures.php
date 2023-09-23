<?php

namespace App\DataFixtures;

use App\Entity\Emplacement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EmplacementFixtures extends Fixture
{
    private static array $emplacements = [
        'head',
        'body',
        'armed arm',
        'defense arm',
        'feet',
        'neck',
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::$emplacements as $empl) {
            $entity = $manager->getRepository(Emplacement::class)->findOneBy(['nom' => $empl]);
            if (! $entity instanceof Emplacement) {
                $entity = (new Emplacement())
                    ->setNom($empl)
                ;
                $manager->persist($entity);
            }
        }
        $manager->flush();
    }
}
