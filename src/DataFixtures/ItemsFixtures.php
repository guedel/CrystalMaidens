<?php

namespace App\DataFixtures;

use App\Entity\{ Classe, Emplacement, Item, Maiden };
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ItemsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $file = fopen(__DIR__ . '/Files/Items.csv', 'r');
        while (! feof($file)) {
            $line = fgetcsv($file, 0, ";");
            if (is_array($line)) {
                $classe = $manager->getRepository(Classe::class)->findOneBy(['nom' => $line[1]]);
                $empl = $manager->getRepository(Emplacement::class)->findOneBy(['nom' => $line[2]]);
                $maiden = $manager->getRepository(Maiden::class)->findOneBy(['nom' => $line[4]]);
                $entity = $manager->getRepository(Item::class)->findOneBy(['nom' => $line[0]]);
                if (! $entity instanceof Item) {
                    $entity = (new Item())
                        ->setNom($line[0]);
                    $manager->persist($entity);
                }
                $entity
                    ->setClasse($classe)
                    ->setEmplacement($empl)
                    ->setMaiden($maiden)
                ;
            }

        }
        $manager->flush();
        fclose($file);
    }
}
