<?php declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Crystal;
use App\Entity\Element;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CrystalFixtures extends CsvFileFixtures
{
    public function load(ObjectManager $manager): void
    {
        foreach ($this->doLoad('Crystals.csv') as $row) {
            $nature = $manager->getRepository(Element::class)->findOneBy(['nom' => $row[1]]);
            $entity = $manager->getRepository(Crystal::class)->findOneBy(['nom' => $row[0]]);
            if (! $nature instanceof Element) {
                throw new \Exception("Element with name $row[1] does not exist");
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

    public function getDependencies(): array
    {
        return [
            ElementFixtures::class
        ];
    }
}
