<?php

namespace App\DataFixtures;

use App\Entity\{Campagne, Etape};

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EtapesFixtures extends CsvFileFixtures
{
    public function load(ObjectManager $manager): void
    {
        foreach ($this->doLoad('Etapes.csv') as $line) {
            $campagneId = $line[0];
            $campagne = $manager->getRepository(Campagne::class)->find($campagneId);
            $entity = $manager->getRepository(Etape::class)->findOneBy(['campagne' => $campagne, 'numero' => $line[1]]);
            if (! $entity instanceof Etape) {
                $entity = (new Etape())
                    ->setNumero($line[1])
                    ->setCampagne($campagne);
                $manager->persist($entity);
            }
            $entity
                ->setBoss($line[2])
                ->setEnergie($line[3])
                ->setExperience($line[4])
                ->setExpMaiden($line[5])
                ->setCoins($line[6])
                ->setMinGachaOrbs($line[7] ? $line[7] : null)
                ->setMaxGachaOrbs($line[8] ? $line[8] : null)
            ;
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [CampaignFixtures::class];
    }
}
