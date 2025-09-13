<?php

namespace App\DataFixtures;

use App\Entity\{
    Campagne,
    Etape,
    EtapeFragment,
    Maiden
};
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FragmentFixtures extends CsvFileFixtures
{
    public function load(ObjectManager $manager): void
    {
        foreach($this->doLoad('Fragments.csv') as $row) {
            $campagne = $manager->getRepository(Campagne::class)->find($row[0]);
            if (! $campagne instanceof Campagne) {
                continue;
            }
            $etape = $manager->getRepository(Etape::class)->findOneBy(['campagne' => $campagne, 'numero' => $row[1]]);
            if (! $etape instanceof Etape) {
                continue;
            }
            $maiden = $manager->getRepository(Maiden::class)->findOneBy(['nom' => $row[2]]);
            if (! $maiden instanceOf Maiden) {
                continue;
            }
            $entity = $manager->getRepository(EtapeFragment::class)->findOneBy([
                'etape' => $etape,
            ]);
            if (! $entity instanceof EtapeFragment) {
                $entity = (new EtapeFragment())
                    ->setEtape($etape);
                $manager->persist($entity);
            }
            $entity
                ->setMinimum($row[3])
                ->setMaximum($row[4])
                ->setMaiden($maiden);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            MaidenFixtures::class,
            EtapesFixtures::class,
        ];
    }
}
