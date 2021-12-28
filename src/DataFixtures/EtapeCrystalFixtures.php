<?php

namespace App\DataFixtures;

use App\Entity\{
    Campagne,
    Crystal,
    Etape,
    EtapeCrystal
};
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtapeCrystalFixtures extends CsvFileFixtures
{
    public function load(ObjectManager $manager): void
    {
        foreach($this->doLoad('EtapeCrystal.csv') as $row) {
            $campagne = $manager->getRepository(Campagne::class)->find($row[0]);
            if (! $campagne instanceof Campagne) {
                continue;
            }
            $etape = $manager->getRepository(Etape::class)->findOneBy(['campagne' => $campagne, 'numero' => $row[1]]);
            if (! $etape instanceof Etape) {
                continue;
            }
            $crystal = $manager->getRepository(Crystal::class)->findOneBy(['nom' => $row[2]]);
            if (! $crystal instanceOf Crystal) {
                continue;
            }
            $entity = $manager->getRepository(EtapeCrystal::class)->findOneBy([
                'etape' => $etape,
            ]);
            if (! $entity instanceof EtapeCrystal) {
                $entity = (new EtapeCrystal())
                    ->setEtape($etape);
                $manager->persist($entity);
            }
            $entity
                ->setMinimum($row[3])
                ->setMaximum($row[4])
                ->setCrystal($crystal);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            EtapesFixtures::class,
            CrystalFixtures::class,
        ];
    }
}
