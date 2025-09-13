<?php

namespace App\DataFixtures;

use App\Entity\{ Classe, Emplacement, Item, Maiden };
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ItemsFixtures extends CsvFileFixtures
{
    public function load(ObjectManager $manager): void
    {
        foreach($this->doLoad('Items.csv') as $line) {
            $classe = $manager->getRepository(Classe::class)->findOneBy(['nom' => $line[1]]);
            $empl = $manager->getRepository(Emplacement::class)->findOneBy(['nom' => $line[2]]);
            $maiden = $manager->getRepository(Maiden::class)->findOneBy(['nom' => $line[4]]);
            $entity = $manager->getRepository(Item::class)->findOneBy(['nom' => $line[0]]);
            $description = $line[5] ?? null;
            if (! $entity instanceof Item) {
                $entity = (new Item())
                    ->setNom($line[0]);
                $manager->persist($entity);
            }
            $entity
                ->setClasse($classe)
                ->setEmplacement($empl)
                ->setMaiden($maiden)
                ->setDescription($description)
            ;
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            MaidenFixtures::class,
            ClasseFixtures::class,
            EmplacementFixtures::class,
        ];
    }

}
