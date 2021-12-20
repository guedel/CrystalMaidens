<?php

namespace App\DataFixtures;

use App\Entity\{Classe, Element, Maiden, Rarete};
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MaidenFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        $file = fopen(__DIR__ . '/Files/Maidens.csv', 'r');
        while (! feof($file)) {
            $line = fgetcsv($file, 0, ";");
            if (is_array($line)) {
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

        }
        $manager->flush();
        fclose($file);
    }
}
