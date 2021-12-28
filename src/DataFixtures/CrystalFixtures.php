<?php

namespace App\DataFixtures;

use App\Entity\Crystal;
use App\Entity\Element;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CrystalFixtures extends CsvFileFixtures
{
    public function load(ObjectManager $manager): void
    {
        foreach ($this->doLoad('Crystals.csv') as $row)
        {
            $nature = $manager->getRepository(Element::class)->findOneBy(['nom' => $row[1]]);
            $entity = $manager->getRepository(Crystal::class)->findOneBy(['nom' => $row[0]]);
            if (! $nature instanceof Element) {
                continue;
            }
            if (! $entity instanceof Crystal) {
                $entity = (new Crystal())
                    ->setNom($row[0])
                ;
                $manager->persist($entity);
            }
            $entity->setNature($nature);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ElementFixtures::class
        ];
    }
}
