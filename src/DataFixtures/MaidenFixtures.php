<?php

namespace App\DataFixtures;

use App\Entity\{Classe, Element, Maiden, Rarete};
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MaidenFixtures extends CsvFileFixtures
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        foreach($this->doLoad('Maidens.csv') as $line) {
            $classe = $manager->getRepository(Classe::class)->findOneBy(['nom' => $line[2]]);
            $element = $manager->getRepository(Element::class)->findOneBy(['nom' => $line[3]]);
            $rarete = $manager->getRepository(Rarete::class)->findOneBy(['nom' => $line[4]]);
            $entity = $manager->getRepository(Maiden::class)->findOneBy(['nom' => $line[0]]);
            if (! $entity instanceof Maiden) {
                $entity = (new Maiden())
                    ->setNom($line[0]);
                $manager->persist($entity);
            }
            $entity
                ->setNickName($line[1])
                ->setClasse($classe)
                ->setElement($element)
                ->setRarity($rarete)
            ;
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ElementFixtures::class,
            ClasseFixtures::class,
            RareteFixtures::class,
        ];
    }
}
